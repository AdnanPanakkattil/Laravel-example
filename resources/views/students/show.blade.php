@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        Students Page
    </div>
    <div class="card-body">
        <div class="card-body">
            <p class="card-text"> First Name{{ $students->first_name }}</p>
            <p class="card-text"> Last Name{{ $students->last_name }}</p>
            <p class="card-text"> Age {{ $students->age }}</p>
            <p class="card-text">Address:{{ $students->address }}</p>
            <p class="card-text">Mobile :{{ $students->mobile }}</p>
            <p class="card-text">Guardian Name {{ $students->guardian_name }}</p>
            <p class="card-text">Mother Name {{ $students->mother_name }}</p>
        </div>
    </div>
</div>

@endsection