@extends('layout')
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">Edit Students management </h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('students.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
<form action="{{ route('students.update', $students->id) }}" method="POST">
    @csrf
    @method('PUT')
    
        <div class="mb-3">
            <label for="first_name" class="form-label"><strong>First Name</strong></label>
            <input 
                type="text" 
                name="first_name" 
                value="{{ $students->first_name }}"
                class="form-control @error('first_name') is-invalid @enderror" 
                id="first_name" 
                placeholder="first name">
            @error('first_name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="last_name" class="form-label"><strong>Last Name</strong></label>
            <input 
                type="text" 
                name="last_name" 
                value="{{ $students->last_name }}"
                class="form-control @error('last_name') is-invalid @enderror" 
                id="last_name" 
                placeholder="Name">
            @error('last_name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="age" class="form-label"><strong>Age</strong></label>
            <input 
                type="text" 
                name="age" 
                value="{{ $students->age }}"
                class="form-control @error('age') is-invalid @enderror" 
                id="age" 
                placeholder="age">
            @error('age')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Address</strong></label>
            <input 
                type="text" 
                name="address" 
                value="{{ $students->address }}"
                class="form-control @error('address') is-invalid @enderror" 
                id="inputaddress" 
                placeholder="address">
            @error('address')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputmobile" class="form-label"><strong>Mobile</strong></label>
            <input 
                type="text" 
                name="mobile" 
                value="{{ $students->mobile }}"
                class="form-control @error('name') is-invalid @enderror" 
                id="inputmobile" 
                placeholder="mobile">
            @error('mobile')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
            
        <div class="mb-3">
            <label for="first_name" class="form-label"><strong>First Name</strong></label>
            <input 
                type="text" 
                name="first_name" 
                value="{{ $students->first_name }}"
                class="form-control @error('first_name') is-invalid @enderror" 
                id="first_name" 
                placeholder="first name">
            @error('first_name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
            
        <div class="mb-3">
            <label for="first_name" class="form-label"><strong>First Name</strong></label>
            <input 
                type="text" 
                name="first_name" 
                value="{{ $students->first_name }}"
                class="form-control @error('first_name') is-invalid @enderror" 
                id="first_name" 
                placeholder="first name">
            @error('first_name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>
  </div>
</div>

@endsection