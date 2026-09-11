@extends('layouts.app')

@section('title', 'Struk Penjualan')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm p-4">

        {{-- HEADER --}}
        <div class="text-center mb-3">
            <h3 class="fw-bold mb-1">
                VeggieGo
            </h3>

            <small class="text-muted">
                Struk Pembayaran
            </small>
        </div>

        <hr>

        {{-- INFORMASI TRANSAKSI --}}
        <div class="mb-3">

            <div class="d-flex justify-content-between mb-2">
                <span>No Transaksi</span>
                <strong>#{{ $penjualan->id }}</strong>
            </div>

            <div class="d-flex justify-content-between mb-2">
                <span>Kasir</span>
                <strong>
                    {{ optional($penjualan->user)->name ?? '-' }}
                </strong>
            </div>

            <div class="d-flex justify-content-between">
                <span>Tanggal</span>
                <strong>
                    {{ $penjualan->created_at?->format('d-m-Y H:i') ?? '-' }}
                </strong>
            </div>

        </div>

        <hr>

        {{-- DAFTAR PRODUK --}}
        <div class="table-responsive">

            <table class="table align-middle">

                <thead>
                    <tr>
                        <th>Produk</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Harga</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($penjualan->itemPenjualan as $item)

                    <tr>

                        <td>
                            {{ optional($item->produk)->nama ?? 'Produk dihapus' }}
                        </td>

                        <td class="text-center">
                            {{ $item->kuantitas }}
                        </td>

                        <td class="text-end">
                            Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}
                        </td>

                        <td class="text-end fw-semibold">
                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Tidak ada produk
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <hr>

        {{-- PERHITUNGAN PEMBAYARAN --}}
        @php
            $total = (int) $penjualan->total_pembayaran;

            $uangDibayar = (int) ($penjualan->uang_dibayar ?? 0);

            $kembalian = max(0, $uangDibayar - $total);
        @endphp

        <div class="mt-3">

            {{-- TOTAL --}}
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="fs-5 fw-semibold">
                    Total
                </span>

                <strong class="fs-5">
                    Rp {{ number_format($total, 0, ',', '.') }}
                </strong>
            </div>

            {{-- METODE --}}
            <div class="d-flex justify-content-between mb-2">

                <span>
                    Metode Pembayaran
                </span>

                <strong>
                    {{ strtoupper($penjualan->metode_pembayaran ?? '-') }}
                </strong>

            </div>


            {{-- KHUSUS TUNAI --}}
            @if(strtoupper($penjualan->metode_pembayaran ?? '') === 'TUNAI')

                <div class="d-flex justify-content-between mb-2">

                    <span>
                        Uang Dibayar
                    </span>

                    <strong>
                        Rp {{ number_format($uangDibayar, 0, ',', '.') }}
                    </strong>

                </div>

                <div class="d-flex justify-content-between mb-2">

                    <span>
                        Kembalian
                    </span>

                    <strong>
                        Rp {{ number_format($kembalian, 0, ',', '.') }}
                    </strong>

                </div>

            @endif

        </div>

        <hr>

        {{-- UCAPAN --}}
        <h5 class="text-center fw-bold mb-3">
            Terima kasih telah berbelanja di VeggieGo 💚
        </h5>

        {{-- CETAK --}}
        <button
            onclick="window.print()"
            class="btn btn-success w-100"
        >
            <i class="bi bi-printer-fill"></i>
            Cetak Struk
        </button>

    </div>

</div>


{{-- STYLE CETAK --}}
<style>

@media print {

    body {
        background: white !important;
    }

    .navbar,
    nav,
    header,
    footer {
        display: none !important;
    }

    .container {
        width: 100% !important;
        max-width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .card {
        border: none !important;
        box-shadow: none !important;
    }

    button {
        display: none !important;
    }

}

</style>

@endsection