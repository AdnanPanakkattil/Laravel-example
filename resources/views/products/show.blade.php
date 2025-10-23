@extends('layout')

    @section('content')
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                Product Details
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $product->name }}</p>
                <p><strong>Detail:</strong> {{ $product->detail }}</p>
                <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back</a>
            </div>
        </div>
    @endsection
