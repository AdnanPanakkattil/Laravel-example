@extends('layout')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm m-4 py-3"> {{-- adds margin & padding --}}
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2 py-3">
            <h2 class="mb-0 text-center text-md-start">Student Application</h2>
            <a href="{{ url('/students/create') }}" class="btn btn-success btn-sm">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
            </a>
        </div>

        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle" id="studentsTable" style="width:100%">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th>Guardian Name</th>
                            <th>Mother Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- DataTables will auto-populate this --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('page-js/students-create/student-index.js') }}"></script>
@endsection
