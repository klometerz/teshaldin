@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">{{ $product->name }}</h2>

    @if($product->image)
        <img src="{{ asset($product->image) }}" width="400" class="img-fluid mb-3 rounded shadow-sm">
    @endif

    <p class="lead">{{ $product->description }}</p>
    <p><strong class="text-success">Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
    <p><strong>Stok:</strong> {{ $product->stock }}</p>

    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-success btn-lg" {{ $product->stock < 1 ? 'disabled' : '' }}>
            ➕ Tambah ke Keranjang
        </button>
    </form>
</div>
@endsection
