@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">🛍️ Keranjang Belanja</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($cart && count($cart))
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Produk</th>
                    <th width="150">Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $item)
                    @php
                        $subtotal = $item['quantity'] * $item['price'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>
                            {{ $item['name'] }}
                            <form action="{{ route('cart.remove', $id) }}" method="POST" class="d-inline ms-2" onsubmit="return confirm('Yakin hapus item ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="{{ $item['stock'] }}" class="form-control me-2">
                                <button type="submit" class="btn btn-sm btn-warning">Ubah</button>
                            </form>
                        </td>
                        <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr class="fw-bold">
                    <td colspan="3" class="text-end">Total</td>
                    <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('cart.checkout') }}" class="btn btn-success btn-lg">✔️ Checkout Sekarang</a>
    @else
        <div class="alert alert-warning text-center">
            Keranjang masih kosong. Yuk pilih produk dulu!
        </div>
    @endif
</div>
@endsection
