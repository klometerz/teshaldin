@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">🛒 Daftar Produk</h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" class="card-img-top img-fluid" alt="{{ $product->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="text-success fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
