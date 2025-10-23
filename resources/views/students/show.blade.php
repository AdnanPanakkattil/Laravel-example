@extends('layout')

    @section('content')
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                Student Details
            </div>
            <div class="card-body">
                <p><strong>First Name:</strong> {{ $student->first_name }}</p>
                <p><strong>Last Name:</strong> {{ $student->last_name }}</p>
                <p><strong>Age:</strong> {{ $student->age }}</p>
                <p><strong>Address:</strong> {{ $student->address }}</p>
                <p><strong>Mobile:</strong> {{ $student->mobile }}</p>
                <p><strong>Guardian Name:</strong> {{ $student->guardian_name }}</p>
                <p><strong>Mother Name:</strong> {{ $student->mother_name }}</p>
                <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back</a>
            </div>
        </div>
    @endsection
