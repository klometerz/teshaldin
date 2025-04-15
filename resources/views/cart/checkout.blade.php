@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">🎉 Checkout Berhasil</h2>
    <p class="text-center text-muted">Terima kasih telah berbelanja. Berikut ringkasan pesanan Anda:</p>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr class="fw-bold">
                <td colspan="3">Total</td>
                <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
