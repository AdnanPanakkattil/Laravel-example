@extends('layout')
    @section('content')
        <div class="card">
            <div class="card-header">
                <h2>Student Application</h2>
            </div>
            <div class="card-body">
                <a href="{{ url(path: '/students/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add New 
                </a>
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table"   id="studentsTable">
                        <thead >
                            <tr>
                                <th> id </th>
                                <th> First Name </th>
                                <th> Last Name </th>
                                <th> Age </th>
                                <th> Address </th>
                                <th> Mobile</th>
                                <th> Guardian Name  </th>
                                <th> Mother Name </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
@endsection

@section(section: 'scripts')
<script src="{{ asset('page-js/students-create/student-index.js') }}"></script>
@endsection





