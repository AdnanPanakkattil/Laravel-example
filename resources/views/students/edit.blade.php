@extends('layout')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Student</h4>
                </div>

                <div class="card-body">

                    <div class="mb-3 text-end">
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('students.index') }}">
                            <i class="fa fa-arrow-left me-1"></i> Back
                        </a>
                    </div>

                    <input type="text" id="edit_student_id" value="{{ @$studentId }}">

                    <form id="student_form" method="POST" novalidate>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" name="first_name" id="first_name"
                                       value="{{ old('first_name', $student->first_name) }}"
                                       class="form-control @error('first_name') is-invalid @enderror">
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="last_name"
                                       value="{{ old('last_name', $student->last_name) }}"
                                       class="form-control @error('last_name') is-invalid @enderror">
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" name="age" id="age"
                                       value="{{ old('age', $student->age) }}"
                                       class="form-control @error('age') is-invalid @enderror">
                                @error('age')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-8">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" name="mobile" id="mobile"
                                       value="{{ old('mobile', $student->mobile) }}"
                                       class="form-control @error('mobile') is-invalid @enderror">
                                @error('mobile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" id="address"
                                       value="{{ old('address', $student->address) }}"
                                       class="form-control @error('address') is-invalid @enderror">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="guardian_name" class="form-label">Guardian Name</label>
                                <input type="text" name="guardian_name" id="guardian_name"
                                       value="{{ old('guardian_name', $student->guardian_name) }}"
                                       class="form-control @error('guardian_name') is-invalid @enderror">
                                @error('guardian_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="mother_name" class="form-label">Mother Name</label>
                                <input type="text" name="mother_name" id="mother_name"
                                       value="{{ old('mother_name', $student->mother_name) }}"
                                       class="form-control @error('mother_name') is-invalid @enderror">
                                @error('mother_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="button" class="btn btn-success" id="student_save_btn">
                                <i class="fa-solid fa-floppy-disk me-1"></i> Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

    <!-- AJAX script -->
@section('scripts')

    <script src="{{ asset('page-js/students-create/students-edit.js') }}"></script>

@endsection