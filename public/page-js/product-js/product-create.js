$(function() {
    var table = $('#products-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/products/get-products',

        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'detail', name: 'detail' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });

    // Delete product
    $('#products-table').on('click', '.deleteProduct', function() {
        var productId = $(this).data('id');
        if(confirm("Are you sure you want to delete this product?")) {
            $.ajax({
                url: '/products/' + productId,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    alert(response.success);
                    table.ajax.reload();
                }
            });
        }
    });
});