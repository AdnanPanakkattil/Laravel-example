$(document).ready(function () {

    // Prepare CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();

        let $btn = $(this);
        $btn.prop('disabled', true).text('Saving...');

        let formData = $('#productsForm').serialize();

        $.ajax({
            url: '/products/store',
            type: 'POST',
            data: formData,
            success: function (response) {
                //sweet alert code start
                Swal.fire({
                    title: "Create New Student",
                    text: response.message,
                    icon: "success",
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                }).then((result) => {
                    window.location.href = "/products";
                });
                $('#studentsForm')[0].reset(); // Clear form
                //sweet alert code start
            },
            error: function (xhr) {
                console.error(xhr.responseText);

                // Handle validation errors
                let message = '❌ Failed to save product.';
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    message = '<ul>';
                    $.each(errors, function (key, value) {
                        message += `<li>${value}</li>`;
                    });
                    message += '</ul>';
                }

                // ❌ Show error alert
                $('#alertBox')
                    .removeClass('d-none alert-success')
                    .addClass('alert-danger')
                    .html(message);

                $btn.prop('disabled', false).text('Save products');
            }
        });
    });
});
