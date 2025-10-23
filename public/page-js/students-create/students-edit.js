
$(document).ready(function() {

    // CSRF token setup for all AJAX calls
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#student_save_btn').click(function(e) {
        e.preventDefault();
        var studentId = $('#edit_student_id').val();

        // Get form data
        let formData = $('#student_form').serialize();

        // Disable button while saving
        $('#student_save_btn').prop('disabled', true).text('Updating...');

        $.ajax({
            url: "/students/update/"+studentId,  // Laravel route
            type: 'PUT', // Use POST with _method=PUT
            data: formData,
            success: function(response) {
                $('#student_save_btn').prop('disabled', false).html('<i class="fa-solid fa-floppy-disk me-1"></i> Update');

                // Success alert
                Swal.fire({
                    icon: 'success',
                    title: 'Updated!',
                    text: response.message || 'Student updated successfully.',
                    confirmButtonColor: '#198754',
                }).then(() => {
                   window.location.href = '/students';

                });
            },
            error: function(xhr) {
                $('#student_save_btn').prop('disabled', false).html('<i class="fa-solid fa-floppy-disk me-1"></i> Update');

                if (xhr.status === 422) {
                    // Validation errors
                    let errors = xhr.responseJSON.errors;
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');
                    $.each(errors, function(key, value) {
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