$(document).on('submit', 'form', function(e) {
    e.preventDefault();

    $.ajax({
        url: $(this).attr('action'),
        method: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            alert('Product updated successfully!');
            window.location.href = '/products'; // ✅ redirect to index page
        },
        error: function(xhr) {
            console.error(xhr.responseText);
            alert('Something went wrong.');
        }
    });
});
