@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

@include('layouts.navbar')

<div class="container">

    <h1 class="fw-bold mb-3">
        <i class="bi bi-cash-stack"></i> Halaman Penjualan
    </h1>

    <div class="d-flex gap-2 mb-4">

        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <x-btn-tambah :href="route('penjualan.create')" label="Penjualan" />

    </div>

    <div class="card mb-4">
        <div class="card-body">

            <form action="{{ route('penjualan.index') }}" method="GET">

                <div class="input-group">

                    <input type="text"
                        name="search"
                        value="{{ request()->search }}"
                        class="form-control"
                        placeholder="Search penjualan...">

                    <button class="btn btn-outline-primary" type="submit">
                        <i class="bi bi-search"></i> Search
                    </button>

                </div>

            </form>

        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Tanggal Transaksi</th>
                        <th>Kasir</th>
                        <th>Produk</th>
                        <th>Total Pembayaran</th>
                        <th>Metode Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($sales as $sale)

                <tr>

                    <td>
                        {{ $sales->firstItem() + $loop->index }}
                    </td>

                    <td class="text-nowrap">
                        {{ $sale->created_at?->translatedFormat('d-m-Y H:i:s') ?? '-' }}
                    </td>

                    <td>
                        {{ optional($sale->user)->name ?? '-' }}
                    </td>

                    <td>

                        <div class="d-flex flex-column gap-1">

                            @forelse($sale->itemPenjualan as $item)

                                <div class="d-flex align-items-center gap-2">

                                    @if($item->produk && $item->produk->foto)

                                        <img
                                            src="{{ asset('storage/' . $item->produk->foto) }}"
                                            alt="{{ $item->produk->nama }}"
                                            style="
                                                width:32px;
                                                height:32px;
                                                object-fit:cover;
                                                border-radius:6px;
                                            "
                                        >

                                    @else

                                        <div
                                            class="bg-light d-flex align-items-center justify-content-center"
                                            style="
                                                width:32px;
                                                height:32px;
                                                border-radius:6px;
                                            "
                                        >
                                            <i
                                                class="bi bi-box-seam text-muted"
                                                style="font-size:14px;"
                                            ></i>
                                        </div>

                                    @endif

                                    <span class="small">

                                        {{ $item->produk->nama ?? 'Produk dihapus' }}

                                        <span class="text-muted">
                                            ×{{ $item->kuantitas }}
                                        </span>

                                    </span>

                                </div>

                            @empty

                                <span class="text-muted small">
                                    -
                                </span>

                            @endforelse

                        </div>

                    </td>

                    <td class="fw-semibold">
                        Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}
                    </td>

                    <td>

                        <span class="badge bg-secondary">
                            {{ strtoupper($sale->metode_pembayaran) }}
                        </span>

                    </td>

                    <td>

                        @php

                            $statusColor = match(strtoupper($sale->status)) {

                                'COMPLETED' => 'bg-success',

                                'PENDING' => 'bg-warning text-dark',

                                'CANCELLED',
                                'FAILED' => 'bg-danger',

                                default => 'bg-secondary',

                            };

                        @endphp

                        <span class="badge {{ $statusColor }}">
                            {{ strtoupper($sale->status) }}
                        </span>

                    </td>

                    <td>

                        <div class="d-flex gap-1">

                            {{-- JIKA TRANSAKSI SUDAH SELESAI --}}

                            @if($sale->status == 'COMPLETED')

                                <a
                                    href="{{ route('penjualan.struk', $sale) }}"
                                    class="btn btn-success btn-sm"
                                >
                                    <i class="bi bi-eye"></i>
                                    Detail
                                </a>

                            {{-- JIKA TRANSAKSI BELUM SELESAI --}}

                            @else

                                <a
                                    href="{{ route('penjualan.edit', $sale) }}"
                                    class="btn btn-info btn-sm"
                                >
                                    <i class="bi bi-arrow-right-circle"></i>
                                    Lanjutkan
                                </a>

                            @endif

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="8"
                        class="text-center py-4 text-muted"
                    >
                        <i class="bi bi-inbox"></i>
                        Data Tidak Ditemukan
                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>
    </div>

    <div class="mt-3">

        {{ $sales->links() }}

    </div>

</div>

@endsection