@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Add New Student</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('students') }}" method="post">
            {!! csrf_field() !!}

            <label for="first_name">First Name</label><br>
            <input type="text" name="first_name" value="{{ old('first_name') }}" id="first_name" class="form-control"><br>

            <label for="last_name">Last Name</label><br>
            <input type="text" name="last_name" value="{{ old('last_name') }}" id="last_name" class="form-control"><br>

            <label for="age">Age</label><br>
            <input type="number" name="age" value="{{ old('age') }}" id="age" class="form-control"><br>

            <label for="address">Address</label><br>
            <input type="text" name="address" value="{{ old('address') }}" id="address" class="form-control"><br>

            <label for="mobile">Mobile</label><br>
            <input type="text" name="mobile" value="{{ old('mobile') }}" id="mobile" class="form-control"><br>

            <label for="guardian_name">Guardian Name</label><br>
            <input type="text" name="guardian_name" value="{{ old('guardian_name') }}" id="guardian_name" class="form-control"><br>

            <label for="mother_name">Mother Name</label><br>
            <input type="text" name="mother_name" value="{{ old('mother_name') }}" id="mother_name" class="form-control"><br>

            <input type="submit" value="Save" class="btn btn-success">
        </form>
    </div>
</div>

@endsection
