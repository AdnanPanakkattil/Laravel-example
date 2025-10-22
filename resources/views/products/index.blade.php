@extends('layout')

@section('content')
<div class="container-fluid mt-4 mb-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap py-3">
            <h2 class="mb-0 text-center text-md-start">Products</h2>
            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm mt-2 mt-md-0">
                <i class="fa fa-plus"></i> Create New Product
            </a>
        </div>

        <div class="card-body py-3">
            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Responsive DataTable --}}
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle w-100" id="products-table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- DataTables will populate this --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('page-js/product-js/product-create.js') }}"></script>
@endsection
