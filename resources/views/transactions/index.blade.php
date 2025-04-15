@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Riwayat Transaksi</h2>

    @if($transactions->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Waktu</th>
                    <th>Total</th>
                    <th>Detail Item</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $trx)
                    <tr>
                        <td>{{ $trx->id }}</td>
                        <td>{{ $trx->created_at->format('d M Y - H:i') }}</td>
                        <td>Rp {{ number_format($trx->total, 0, ',', '.') }}</td>
                        <td>
                            <ul>
                                @foreach(json_decode($trx->items, true) as $item)
                                    <li>{{ $item['name'] }} x {{ $item['quantity'] }} (@ Rp{{ number_format($item['price'], 0, ',', '.') }})</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada transaksi.</p>
    @endif
</div>
@endsection
