  $(document).ready(function () {
        $('#registration-form').on('submit', function (e) {
            e.preventDefault();

            // Clear previous errors
            $('.error').text('');
            $('#success-message').hide().text('');

            $.ajax({
                url: "{{ route('users.create') }}",
                type: "POST",
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function (response) {
                    $('#success-message').text(response.message).fadeIn();

                    // Optionally, reset form
                    $('#registration-form')[0].reset();
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        // Display validation errors
                        if (errors.name) {
                            $('#error-name').text(errors.name[0]);
                        }
                        if (errors.email) {
                            $('#error-email').text(errors.email[0]);
                        }
                        if (errors.password) {
                            $('#error-password').text(errors.password[0]);
                        }
                    }
                }
            });
        });
    });