@extends('layouts.app')

@section('title','Struk Penjualan')

@section('content')

<div class="container">

    <div class="card p-4">

        <h3 class="text-center">
            TOKO SYIFA
        </h3>

        <hr>

        <p>
            No Transaksi :
            {{ $penjualan->id }}
        </p>

        <p>
            Kasir :
            {{ $penjualan->user->name ?? '-' }}
        </p>

        <p>
            Tanggal :
            {{ $penjualan->created_at->format('d-m-Y H:i') }}
        </p>

        <hr>


        <table class="table">

            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>


            <tbody>

            @foreach($penjualan->itemPenjualan as $item)

                <tr>

                    <td>
                        {{ $item->produk->nama }}
                    </td>

                    <td>
                        {{ $item->kuantitas }}
                    </td>

                    <td>
                        Rp {{ number_format($item->harga_satuan,0,',','.') }}
                    </td>

                    <td>
                        Rp {{ number_format($item->subtotal,0,',','.') }}
                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>


        <hr>


        <h5>
            Total :
            Rp {{ number_format($penjualan->total_pembayaran,0,',','.') }}
        </h5>


        <p>
            Pembayaran :
            {{ $penjualan->metode_pembayaran }}
        </p>


        <hr>


        <h5 class="text-center">
            Terima kasih
        </h5>


        <button onclick="window.print()"
                class="btn btn-primary">
            Cetak Struk
        </button>


    </div>

</div>


@endsection