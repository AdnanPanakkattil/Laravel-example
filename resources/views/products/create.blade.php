@extends('layout')
    @section('content')

        <div class="container py-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add New Products</h4>
                </div>
                <div class="card-body">

                    <div class="d-flex justify-content-end mb-3">
                        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>

                    <form id="productsForm">
                        @csrf

                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="detail" class="form-label">Detail</label>
                                <input type="text" name="detail" value="{{ old('detail') }}" id="detail" class="form-control">
                            </div>
                    
                        <div class="d-grid mt-4">
                            <button type="submit" id="saveBtn" class="btn btn-success btn-lg">Save products</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection

    @section(section: 'scripts')
        <script src="{{ asset('page-js/products-js/products.js') }}"></script>
    @endsection
