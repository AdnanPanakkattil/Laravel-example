@extends('layout')
    @section('content').

        <div class="container py-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add New Student</h4>
                </div>
                <div class="card-body">

                    <div class="d-flex justify-content-end mb-3">
                        <a class="btn btn-primary btn-sm" href="{{ route('students.index') }}">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>

                    <form id="studentsForm">
                        @csrf

                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}" id="first_name" class="form-control">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" id="last_name" class="form-control">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" name="age" value="{{ old('age') }}" id="age" class="form-control">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" name="mobile" value="{{ old('mobile') }}" id="mobile" class="form-control">
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" value="{{ old('address') }}" id="address" class="form-control">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="guardian_name" class="form-label">Guardian Name</label>
                                <input type="text" name="guardian_name" value="{{ old('guardian_name') }}" id="guardian_name" class="form-control">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="mother_name" class="form-label">Mother Name</label>
                                <input type="text" name="mother_name" value="{{ old('mother_name') }}" id="mother_name" class="form-control">
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" id="saveBtn" class="btn btn-success btn-lg">Save Student</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    @endsection

    @section(section: 'scripts')
        <script src="{{ asset('page-js/students-create/students.js') }}"></script>
    @endsection
