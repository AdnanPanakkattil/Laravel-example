
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#productsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/products",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'detail', name: 'detail' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
    

    $(document).on('submit', 'form.deleteForm', function (e) {
        e.preventDefault();
        let form = this;

        Swal.fire({
            title: "Are you sure?",
            text: "This products record will be permanently deleted!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: $(form).attr('action'),
                    method: 'POST',
                    data: $(form).serialize(),
                    success: function (response) {
                        $('#productsTable').DataTable().ajax.reload(null, false);
                        Swal.fire("Deleted!", "products has been deleted.", "success");
                    },
                    error: function (xhr) {
                        Swal.fire("Error!", "Something went wrong while deleting.", "error");
                    }
                });
            }
        });
    });

});

