$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#studentsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/students",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'first_name', name: 'first_name' },
            { data: 'last_name', name: 'last_name' },
            { data: 'age', name: 'age' },
            { data: 'address', name: 'address' },
            { data: 'mobile', name: 'mobile' },
            { data: 'guardian_name', name: 'guardian_name' },
            { data: 'mother_name', name: 'mother_name' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });

    $(document).on('submit', 'form.deleteForm', function (e) {
        e.preventDefault();
        let form = this;

        Swal.fire({
            title: "Are you sure?",
            text: "This student record will be permanently deleted!",
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
                        $('#studentsTable').DataTable().ajax.reload(null, false);
                        Swal.fire("Deleted!", "Student has been deleted.", "success");
                    },
                    error: function (xhr) {
                        Swal.fire("Error!", "Something went wrong while deleting.", "error");
                    }
                });
            }
        });
    });

});

