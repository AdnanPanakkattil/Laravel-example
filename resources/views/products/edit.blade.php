@extends('layout')

    @section('content')

        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Edit Product</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('products.update', $product->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name"
                                               value="{{ old('name', $product->name) }}"
                                               class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-8">
                                        <label for="detail" class="form-label">Detail</label>
                                        <input type="text" name="detail" id="detail"
                                               value="{{ old('detail', $product->detail) }}"
                                               class="form-control @error('detail') is-invalid @enderror">
                                        @error('detail')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
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

        <script src="{{ asset('page-js/products-js/products-edit.js') }}"></script>

    @endsection