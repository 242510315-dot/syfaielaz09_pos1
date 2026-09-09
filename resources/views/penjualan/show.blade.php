@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')

<h4 class="mb-3">Detail Penjualan</h4>

<div class="card mb-3">

    <div class="card-body">

        <table class="table">

            <tr>
                <th width="200">Kasir</th>
                <td>{{ $penjualan->user->name }}</td>
            </

            <tr>
                <th>Status</th>
                <td>{{ $penjualan->status }}</td>
            </tr>

            <tr>
                <th>Metode Pembayaran</th>
                <td>{{ $penjualan->metode_pembayaran }}</td>
            </tr>

            <tr>
                <th>Total Pembayaran</th>
                <td>
                    Rp {{ number_format($penjualan->total_pembayaran) }}
                </td>
            </tr>

        </table>

    </div>

</div>

<div class="card">

    <div class="card-header">
        Item Produk
    </div>

    <div class="card-body p-0">

        <table class="table table-bordered mb-0">

            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($penjualan->itemPenjualan as $item)

                <tr>

                    <td>{{ $item->produk->nama }}</td>

                    <td>
                        Rp {{ number_format($item->harga_satuan) }}
                    </td>

                    <td>{{ $item->kuantitas }}</td>

                    <td>
                        Rp {{ number_format($item->subtotal) }}
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="4" class="text-center">
                        Tidak ada item
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection