$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#productForm').on('submit', function (e) {
        e.preventDefault(); // Stop the form from reloading the page

        $.ajax({
            url: '/products', // Laravel route for products.store
            method: 'POST',
            data: $(this).serialize(), // Serialize the whole form
            success: function (response) {
                alert(response.message || 'Product saved successfully!');
                $('#productForm')[0].reset(); // Clear form
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
