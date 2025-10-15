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
                    <table class="table">
                        <thead>
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
                        <tbody>
                            @foreach ($students as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->first_name }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    <td>{{ $item->age }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td>{{ $item->guardian_name }}</td>
                                    <td>{{ $item->mother_name }}</td>
                                    <td>
                                        <a href="{{ url('/students/' . $item->id) }}" title="View Student">
                                            <button class="btn btn-primary btn-sm">
                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                            </button>
                                        </a>

                                        <a href="{{ route('students.edit', $item->id) }}" title="Edit Student">
                                            <button class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                            </button>
                                        </a>
                                        <form method="POST" action="{{ url('/students/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('Are you sure?')">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection







