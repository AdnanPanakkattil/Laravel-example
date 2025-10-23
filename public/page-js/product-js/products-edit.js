$(document).ready(function () {

    // Setup CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#products_save_btn').click(function (e) {
        e.preventDefault();

        var productsId = $('#edit_products_id').val();
        let formData = $('#products_form').serialize();

        $('#products_save_btn').prop('disabled', true).text('Updating...');

        $.ajax({
            url: "/products/update/" + productsId, // ✅ correct endpoint
            type: 'PUT',
            data: formData,
            success: function (response) {
                $('#products_save_btn').prop('disabled', false).html('<i class="fa-solid fa-floppy-disk me-1"></i> Update');

                // ✅ SweetAlert success
                Swal.fire({
                    icon: 'success',
                    title: 'Updated!',
                    text: response.message || 'Product updated successfully.',
                    confirmButtonColor: '#198754',
                }).then(() => {
                    window.location.href = '/products';
                });
            },
            error: function (xhr) {
                $('#products_save_btn').prop('disabled', false).html('<i class="fa-solid fa-floppy-disk me-1"></i> Update');

                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');
                    $.each(errors, function (key, value) {
                        let input = $('[name="' + key + '"]');
                        input.addClass('is-invalid');
                        input.after('<div class="invalid-feedback">' + value[0] + '</div>');
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong, please try again.',
                    });
                }
            }
        });
    });
});
