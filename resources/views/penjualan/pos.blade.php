@extends('layouts.app')

@section('title', 'POS')

@section('content')

@if(session('errors'))
<div class="alert alert-danger">
    <i class="bi bi-exclamation-triangle-fill"></i> {{ session('errors') }}
</div>
@endif

<h4 class="mb-3">
    {{ $mode === 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan' }}
</h4>


<div class="row">

    {{-- ================= PRODUK ================= --}}
    <div class="col-md-6">

        <div class="card">

            <div class="card-body" style="max-height:70vh; overflow:auto">

                <form method="GET" action="{{ route('penjualan.create') }}">
                    <input type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control mb-3"
                        placeholder="Cari produk..."
                        onkeyup="this.form.submit()">
                </form>


                @foreach($products as $product)

                <form action="{{ route('itempenjualan.store') }}" method="POST" class="mb-2">

                    @csrf

                    <input type="hidden"
                        name="product_id"
                        value="{{ $product->id }}">

                    <div class="row align-items-center">

                        <div class="col-7">

                            <button type="submit"
                                class="btn btn-outline-primary w-100 text-start p-2 
                                {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}">

                                <div class="d-flex align-items-center gap-2">

                                    <img src="{{ asset('storage/'.$product->foto) }}"
                                        class="rounded-circle"
                                        style="width:70px;height:70px;object-fit:cover;image-rendering:auto;">


                                    <div>

                                        <div class="fw-semibold">
                                            {{ $product->nama }}
                                        </div>


                                        <small class="text-muted">
                                            Rp {{ number_format($product->harga_jual) }}
                                        </small>

                                    </div>

                                </div>

                            </button>

                        </div>


                        <div class="col-3">

                            <input type="number"
                                name="quantity"
                                value="1"
                                min="1"
                                class="form-control"
                                {{ $sale->status === 'COMPLETED' ? 'readonly' : '' }}>

                        </div>


                        <div class="col-2">

                            <button class="btn btn-primary w-100"
                                {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}>
                                <i class="bi bi-plus-lg"></i>
                            </button>

                        </div>

                    </div>

                </form>

                @endforeach

            </div>

        </div>

    </div>




    {{-- ================= KERANJANG ================= --}}

    <div class="col-md-6">

        <div class="card">

            <table class="table table-bordered mb-0">

                <thead>

                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                @forelse($sale->itemPenjualan as $item)

                    <tr>

                        <td>
                            {{ $item->produk->nama }}
                        </td>


                        <td>
                            Rp {{ number_format($item->produk->harga_jual) }}
                        </td>


                        <td>

                            <form method="POST"
                                action="{{ route('itempenjualan.update',$item->id) }}">

                                @csrf
                                @method('PUT')


                                <input type="number"
                                    name="quantity"
                                    value="{{ $item->kuantitas }}"
                                    class="form-control form-control-sm"
                                    onchange="this.form.submit()">

                            </form>

                        </td>


                        <td>
                            Rp {{ number_format($item->subtotal) }}
                        </td>


                        <td>

                            <form method="POST"
                                action="{{ route('itempenjualan.destroy',$item->id) }}">

                                @csrf
                                @method('DELETE')


                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash-fill"></i> Hapus
                                </button>


                            </form>

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center text-muted">

                            Keranjang kosong

                        </td>

                    </tr>

                @endforelse


                </tbody>

            </table>




            <div class="card-footer">


                <h5>
                    Total:
                    Rp {{ number_format($sale->total_pembayaran) }}
                </h5>



                <form method="POST"
                    action="{{ route('penjualan.update',$sale->id) }}"
                    onsubmit="return confirm('Yakin checkout?')">


                    @csrf
                    @method('PUT')


                    <select name="payment_method"
                        class="form-select mb-2">


                        <option value="">
                            Pilih Pembayaran
                        </option>


                        <option value="CASH">
                            Cash
                        </option>


                        <option value="QRIS">
                            QRIS
                        </option>


                    </select>



                    <button class="btn btn-success w-100"
                        {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}>

                        <i class="bi bi-check-circle-fill"></i> Checkout

                    </button>


                </form>



                <form action="{{ route('penjualan.destroy',$sale->id) }}"
                    method="POST"
                    class="mt-2"
                    onsubmit="return confirm('Batalkan transaksi?')">


                    @csrf
                    @method('DELETE')


                    <button class="btn btn-outline-danger w-100"
                        {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}>

                        <i class="bi bi-x-circle-fill"></i> Batal Transaksi

                    </button>


                </form>


            </div>

        </div>

    </div>


</div>


@endsection