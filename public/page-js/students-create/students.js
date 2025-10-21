$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#studentsForm').on('submit', function (e) {
        e.preventDefault(); // Stop page reload

        $.ajax({
            url: '/students', // Must match route
            method: 'POST',
            data: $(this).serialize(), // Send all form fields
            success: function (response) {
                Swal.fire({
                    title: "Create New Student",
                    text: response.message,
                    icon: "success",
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                }).then((result) => {
                    window.location.href = "/students";
                });
                $('#studentsForm')[0].reset(); // Clear form
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let message = '';
                    for (let field in errors) {
                        message += errors[field][0] + '\n';
                    }
                    alert(message);
                } else {
                    alert('Something went wrong: ' + xhr.statusText);
                }
            }
        });
    });
});
