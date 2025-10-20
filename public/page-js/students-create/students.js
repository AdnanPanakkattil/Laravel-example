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
                alert(response.message || 'Student saved successfully!');
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
