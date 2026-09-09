@extends('layouts.app')

@section('title', 'Produk')

@push('styles')
<style>
    .modal-content {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 16px 48px rgba(214, 51, 108, 0.22);
    }

    .modal-header {
        background: #fff;
        border-bottom: 1px solid #ffe0ec;
        padding: 18px 22px;
    }

    .modal-header .modal-title {
        color: #d6336c;
        font-weight: 800;
        font-size: 1.1rem;
    }

    .modal-header .btn-close {
        opacity: 0.6;
    }

    .modal-body {
        padding: 0;
    }

    .detail-layout {
        display: flex;
        flex-wrap: wrap;
    }

    .detail-photo-col {
        flex: 0 0 42%;
        background: linear-gradient(165deg, #ffe0ec, #ff9ec2);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px 20px;
        min-height: 260px;
    }

    .detail-photo-col img {
        max-width: 100%;
        max-height: 200px;
        object-fit: contain;
        filter: drop-shadow(0 10px 18px rgba(107, 33, 64, 0.25));
    }

    .detail-info-col {
        flex: 1 1 55%;
        padding: 26px 24px;
    }

    .detail-jenis-tag {
        display: inline-block;
        background: #ffe0ec;
        color: #d6336c;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        padding: 4px 12px;
        border-radius: 20px;
        letter-spacing: 0.04em;
        margin-bottom: 8px;
    }

    .detail-name {
        font-weight: 800;
        font-size: 1.5rem;
        color: #4a1830;
        text-transform: capitalize;
        margin-bottom: 18px;
        line-height: 1.2;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 11px 0;
        border-bottom: 1px dashed #ffd6e7;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-row .row-label {
        color: #b06388;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .detail-row .row-value {
        font-weight: 700;
        color: #4a1830;
    }

    .detail-row.highlight .row-value {
        color: #d6336c;
        font-size: 1.15rem;
    }

    .detail-stock-ok {
        color: #1e7e34 !important;
    }

    .detail-stock-empty {
        color: #d6336c !important;
    }

    .modal-footer {
        border-top: 1px solid #ffe0ec;
        padding: 14px 22px;
    }

    .modal-footer .btn-secondary {
        background-color: #fff;
        border: 1.5px solid #ffb3cf;
        color: #d6336c;
        font-weight: 700;
        border-radius: 8px;
        padding: 6px 18px;
    }

    .modal-footer .btn-secondary:hover {
        background-color: #ffe0ec;
        border-color: #ffb3cf;
        color: #b0245c;
    }

    @media (max-width: 576px) {
        .detail-photo-col {
            flex: 1 1 100%;
        }
        .detail-info-col {
            flex: 1 1 100%;
        }
    }
</style>
@endpush

@section('content')

@include('layouts.navbar')

<div class="container">

    <h1 class="fw-bold mb-3">
        <i class="bi bi-box-seam-fill"></i> Halaman Produk
    </h1>

    <div class="d-flex gap-2 mb-4">

        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        @can('create', App\Models\Produk::class)
            <a href="{{ route('produk.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Produk
            </a>
        @endcan

    </div>


    {{-- SEARCH --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <form action="{{ route('produk.index') }}"
                  method="GET">

                <div class="input-group">

                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="form-control"
                           placeholder="Cari nama produk...">

                    <button class="btn btn-outline-primary">
                        <i class="bi bi-search"></i> Search
                    </button>

                </div>

            </form>

        </div>
    </div>



    {{-- TABLE --}}
    <div class="card shadow-sm">

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>


                @forelse($products as $product)

                    <tr>

                        <td>
                            {{ $products->firstItem() + $loop->index }}
                        </td>


                        <td>
                            {{ $product->user?->name ?? '-' }}
                        </td>


                        <td>

                            @if($product->foto)

                                <img src="{{ asset('storage/'.$product->foto) }}"
                                     width="70"
                                     class="rounded">

                            @else

                                <span class="text-muted">
                                    Tidak ada foto
                                </span>

                            @endif

                        </td>


                        <td class="fw-semibold">
                            {{ $product->nama }}
                        </td>


                        <td>
                            Rp {{ number_format($product->harga_beli,0,',','.') }}
                        </td>


                        <td>
                            Rp {{ number_format($product->harga_jual,0,',','.') }}
                        </td>


                        <td>

                            @if($product->stok > 0)

                                <span class="badge bg-success">
                                    {{ $product->stok }}
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Habis
                                </span>

                            @endif

                        </td>



                        <td>



                            @can('update',$product)

                                <a href="{{ route('produk.edit',$product) }}"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                            @endcan



                            @can('delete',$product)

                                <form action="{{ route('produk.destroy',$product) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')


                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus produk?')">

                                        Hapus

                                    </button>


                                </form>


                            @endcan


                        </td>


                    </tr>


                @empty


                    <tr>

                        <td colspan="8"
                            class="text-center">

                            Data produk belum tersedia

                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>


            {{ $products->links() }}


        </div>

    </div>


</div>


{{-- ============================================ --}}
{{-- SEMUA MODAL DETAIL DITARUH DI SINI, --}}
{{-- DI LUAR TABEL & DI LUAR DIV .container, --}}
{{-- SUPAYA HTML VALID DAN MODAL TAMPIL BENAR --}}
{{-- ============================================ --}}
@foreach($products as $product)

    <div class="modal fade"
         id="detail{{ $product->id }}">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">


                <div class="modal-header">

                    <h5 class="modal-title">
                        Detail Produk
                    </h5>


                    <button class="btn-close"
                            data-bs-dismiss="modal">
                    </button>

                </div>



                <div class="modal-body">

                    <div class="detail-layout">

                        <div class="detail-photo-col">

                            @if($product->foto)

                                <img src="{{ asset('storage/'.$product->foto) }}"
                                     alt="{{ $product->nama }}">

                            @else

                                <span class="text-white">
                                    Tidak ada foto
                                </span>

                            @endif

                        </div>


                        <div class="detail-info-col">

                            <span class="detail-jenis-tag">
                                {{ $product->jenisProduk?->nama ?? 'Tanpa Kategori' }}
                            </span>

                            <div class="detail-name">
                                {{ $product->nama }}
                            </div>


                            <div class="detail-row highlight">
                                <span class="row-label">Harga Jual</span>
                                <span class="row-value">
                                    Rp {{ number_format($product->harga_jual,0,',','.') }}
                                </span>
                            </div>

                            <div class="detail-row">
                                <span class="row-label">Harga Beli</span>
                                <span class="row-value">
                                    Rp {{ number_format($product->harga_beli,0,',','.') }}
                                </span>
                            </div>

                            <div class="detail-row">
                                <span class="row-label">Stok</span>
                                <span class="row-value {{ $product->stok > 0 ? 'detail-stock-ok' : 'detail-stock-empty' }}">
                                    {{ $product->stok > 0 ? $product->stok.' unit' : 'Habis' }}
                                </span>
                            </div>

                        </div>

                    </div>

                </div>



                <div class="modal-footer">


                    <button class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Tutup

                    </button>


                </div>


            </div>

        </div>


    </div>

@endforeach


@endsection