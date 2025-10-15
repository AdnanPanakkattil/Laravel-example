@extends('layout')
@section('content')


<div class="card">
    <div class="card-header">
        <div class="card-body">
            <form action="{{ url('students') }}"method="post">
                {!! csrf_field() !!}
                
                <label for="">First Name</label><br>
                <input type="text" name="first_name" id="first_name" class="form-control"><br>

                <label for="">Last Name</label><br>
                <input type="text" name="last_name" id="last_name" class="form-control"><br>

                <label for="">Age</label><br>
                <input type="text" name="age" id="age" class="form-control"><br>

                <label for="">Address</label><br>
                <input type="text" name="address" id="address" class="form-control" ><br>

                <label for="">Mobile</label><br>
                <input type="text" name="mobile" id="mobile" class="form-control"><br>

                <label for="">Guardian Name</label><br>
                <input type="text" name="guardian_name" id="guardian_name" class="form-control"><br>

                <label for="">Mother Name</label><br>
                <input type="text" name="mother_name" id="mother_name" class="form-control"><br>

                <input type="submit" value="save" class="btn btn-success"><br>
            </form>
        </div>
    </div>
</div>

@endsection
