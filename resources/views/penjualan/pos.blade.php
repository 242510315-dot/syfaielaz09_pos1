@extends('layouts.app')

@section('title', 'POS')

@section('content')

@if(session('errors'))
    <div class="alert alert-danger">
        <i class="bi bi-exclamation-triangle-fill"></i>
        {{ session('errors') }}
    </div>
@endif

<h4 class="mb-3">
    {{ $mode === 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan' }}
</h4>

<div class="row">

    {{-- ================= PRODUK ================= --}}
    <div class="col-md-6">

        <div class="card">

            <div
                class="card-body"
                style="max-height:70vh; overflow:auto"
            >

                {{-- PENCARIAN PRODUK --}}
                <form
                    method="GET"
                    action="{{ route('penjualan.create') }}"
                >

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control mb-3"
                        placeholder="Cari produk..."
                        onkeyup="this.form.submit()"
                    >

                </form>


                {{-- DAFTAR PRODUK --}}
                @foreach($products as $product)

                    <form
                        action="{{ route('itempenjualan.store') }}"
                        method="POST"
                        class="mb-2"
                    >

                        @csrf

                        <input
                            type="hidden"
                            name="product_id"
                            value="{{ $product->id }}"
                        >

                        <div class="row align-items-center">

                            {{-- PRODUK --}}
                            <div class="col-7">

                                <button
                                    type="submit"
                                    class="btn btn-outline-primary w-100 text-start p-2
                                    {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}"
                                    {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                                >

                                    <div class="d-flex align-items-center gap-2">

                                        @if($product->foto)

                                            <img
                                                src="{{ asset('storage/' . $product->foto) }}"
                                                alt="{{ $product->nama }}"
                                                class="rounded-circle"
                                                style="
                                                    width:70px;
                                                    height:70px;
                                                    object-fit:cover;
                                                    image-rendering:auto;
                                                "
                                            >

                                        @else

                                            <div
                                                class="bg-light d-flex align-items-center justify-content-center rounded-circle"
                                                style="
                                                    width:70px;
                                                    height:70px;
                                                "
                                            >
                                                <i class="bi bi-box-seam text-muted fs-4"></i>
                                            </div>

                                        @endif


                                        <div>

                                            <div class="fw-semibold">
                                                {{ $product->nama }}
                                            </div>

                                            <small class="text-muted">
                                                Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                                            </small>

                                        </div>

                                    </div>

                                </button>

                            </div>


                            {{-- JUMLAH --}}
                            <div class="col-3">

                                <input
                                    type="number"
                                    name="quantity"
                                    value="1"
                                    min="1"
                                    class="form-control"
                                    {{ $sale->status === 'COMPLETED' ? 'readonly' : '' }}
                                >

                            </div>


                            {{-- TAMBAH --}}
                            <div class="col-2">

                                <button
                                    type="submit"
                                    class="btn btn-primary w-100"
                                    {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                                >
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

                        {{-- PRODUK --}}
                        <td>
                            {{ $item->produk->nama }}
                        </td>


                        {{-- HARGA --}}
                        <td>
                            Rp {{ number_format($item->produk->harga_jual, 0, ',', '.') }}
                        </td>


                        {{-- QTY --}}
                        <td>

                            <form
                                method="POST"
                                action="{{ route('itempenjualan.update', $item->id) }}"
                            >

                                @csrf
                                @method('PUT')

                                <input
                                    type="number"
                                    name="quantity"
                                    value="{{ $item->kuantitas }}"
                                    min="1"
                                    class="form-control form-control-sm"
                                    onchange="this.form.submit()"
                                >

                            </form>

                        </td>


                        {{-- SUBTOTAL --}}
                        <td>
                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                        </td>


                        {{-- HAPUS --}}
                        <td>

                            <form
                                method="POST"
                                action="{{ route('itempenjualan.destroy', $item->id) }}"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                >
                                    <i class="bi bi-trash-fill"></i>
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            class="text-center text-muted"
                        >
                            Keranjang kosong
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>


            {{-- ================= PEMBAYARAN ================= --}}
            <div class="card-footer">

                @php
                    $total = (int) ($sale->total_pembayaran ?? 0);
                @endphp


                {{-- TOTAL --}}
                <h5 class="fw-bold mb-3">

                    Total:

                    <span id="totalHarga">
                        Rp {{ number_format($total, 0, ',', '.') }}
                    </span>

                </h5>


                {{-- FORM CHECKOUT --}}
                <form
                    method="POST"
                    action="{{ route('penjualan.update', $sale->id) }}"
                    id="checkoutForm"
                >

                    @csrf
                    @method('PUT')


                    {{-- METODE PEMBAYARAN --}}
                    <label
                        for="paymentMethod"
                        class="form-label fw-semibold"
                    >
                        Metode Pembayaran
                    </label>

                    <select
                        name="payment_method"
                        id="paymentMethod"
                        class="form-select mb-3"
                        required
                    >

                        <option value="">
                            Pilih Pembayaran
                        </option>

                        <option value="TUNAI">
                             TUNAI
                        </option>

                        <option value="QRIS">
                             QRIS
                        </option>

                    </select>


                    {{-- ================= TUNAI ================= --}}
                    <div
                        id="tunaiBox"
                        style="display:none;"
                    >

                        <label
                            for="uangDibayar"
                            class="form-label fw-semibold"
                        >
                            Uang Dibayar
                        </label>


                        <input
                            type="number"
                            name="uang_dibayar"
                            id="uangDibayar"
                            class="form-control mb-2"
                            min="{{ $total }}"
                            placeholder="Masukkan uang customer"
                        >


                        {{-- NOMINAL CEPAT --}}
                        <div class="d-flex gap-2 flex-wrap mb-3">

                            <button
                                type="button"
                                class="btn btn-outline-secondary btn-sm nominal-btn"
                                data-value="{{ $total }}"
                            >
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </button>

                            <button
                                type="button"
                                class="btn btn-outline-secondary btn-sm nominal-btn"
                                data-value="10000"
                            >
                                Rp 10.000
                            </button>

                            <button
                                type="button"
                                class="btn btn-outline-secondary btn-sm nominal-btn"
                                data-value="20000"
                            >
                                Rp 20.000
                            </button>

                            <button
                                type="button"
                                class="btn btn-outline-secondary btn-sm nominal-btn"
                                data-value="50000"
                            >
                                Rp 50.000
                            </button>

                            <button
                                type="button"
                                class="btn btn-outline-secondary btn-sm nominal-btn"
                                data-value="100000"
                            >
                                Rp 100.000
                            </button>

                        </div>


                        {{-- KEMBALIAN --}}
                        <div
                            id="kembalianBox"
                            class="alert alert-success d-flex justify-content-between align-items-center"
                        >

                            <span class="fw-semibold">
                                Kembalian
                            </span>

                            <strong id="kembalian">
                                Rp 0
                            </strong>

                        </div>


                        {{-- UANG KURANG --}}
                        <div
                            id="uangKurang"
                            class="alert alert-danger"
                            style="display:none;"
                        >
                            Uang pembayaran masih kurang.
                        </div>

                    </div>


                    {{-- ================= QRIS ================= --}}
                    <div
                        id="qrisBox"
                        style="display:none;"
                        class="mb-3"
                    >

                        <div class="card border-primary">

                            <div class="card-body text-center">

                                <h6 class="fw-bold text-primary mb-3">

                                    <i class="bi bi-qr-code"></i>

                                    Pembayaran QRIS

                                </h6>


                                <div class="d-flex justify-content-center mb-3">

                                    <div
                                        class="p-3 bg-white border rounded"
                                        style="
                                            width:220px;
                                            height:220px;
                                        "
                                    >

                                        <img
                                            src="{{ asset('images/qris.png') }}"
                                            alt="QRIS"
                                            style="
                                                width:100%;
                                                height:100%;
                                                object-fit:contain;
                                            "
                                        >

                                    </div>

                                </div>


                                <div class="fw-semibold">
                                    Silakan scan QR Code di atas
                                </div>

                                <small class="text-muted">
                                    Pastikan pembayaran customer berhasil
                                    sebelum melakukan checkout.
                                </small>

                            </div>

                        </div>

                    </div>


                    {{-- CHECKOUT --}}
                    <button
                        type="submit"
                        id="checkoutButton"
                        class="btn btn-success w-100"
                        {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                    >

                        <i class="bi bi-check-circle-fill"></i>

                        Checkout

                    </button>

                </form>


                {{-- ================= BATAL TRANSAKSI ================= --}}
                <form
                    action="{{ route('penjualan.destroy', $sale->id) }}"
                    method="POST"
                    class="mt-2"
                    onsubmit="return confirm('Batalkan transaksi?')"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-outline-danger w-100"
                        {{ $sale->status === 'COMPLETED' ? 'disabled' : '' }}
                    >

                        <i class="bi bi-x-circle-fill"></i>

                        Batal Transaksi

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>


{{-- ================= JAVASCRIPT ================= --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const paymentMethod = document.getElementById('paymentMethod');

    const tunaiBox = document.getElementById('tunaiBox');

    const qrisBox = document.getElementById('qrisBox');

    const uangDibayar = document.getElementById('uangDibayar');

    const kembalian = document.getElementById('kembalian');

    const kembalianBox = document.getElementById('kembalianBox');

    const uangKurang = document.getElementById('uangKurang');

    const checkoutButton = document.getElementById('checkoutButton');

    const total = {{ $total }};


    // ================= GANTI METODE PEMBAYARAN =================

    paymentMethod.addEventListener('change', function () {

        // Sembunyikan semua
        tunaiBox.style.display = 'none';

        qrisBox.style.display = 'none';


        // Reset
        uangDibayar.value = '';

        kembalian.innerText = 'Rp 0';

        uangKurang.style.display = 'none';

        kembalianBox.classList.remove(
            'alert-danger'
        );

        kembalianBox.classList.add(
            'alert-success'
        );


        // QRIS
        if (this.value === 'QRIS') {

            qrisBox.style.display = 'block';

            checkoutButton.disabled = false;

        }


        // TUNAI
        if (this.value === 'TUNAI') {

            tunaiBox.style.display = 'block';

            checkoutButton.disabled = true;

            setTimeout(function () {

                uangDibayar.focus();

            }, 100);

        }

    });


    // ================= HITUNG KEMBALIAN =================

    uangDibayar.addEventListener('input', function () {

        const dibayar = parseInt(this.value) || 0;

        const hasil = dibayar - total;


        // Belum memasukkan uang
        if (dibayar === 0) {

            kembalian.innerText = 'Rp 0';

            kembalianBox.classList.remove(
                'alert-danger'
            );

            kembalianBox.classList.add(
                'alert-success'
            );

            uangKurang.style.display = 'none';

            checkoutButton.disabled = true;

            return;

        }


        // Uang kurang
        if (hasil < 0) {

            kembalianBox.classList.remove(
                'alert-success'
            );

            kembalianBox.classList.add(
                'alert-danger'
            );

            kembalian.innerText =
                'Kurang Rp ' +
                Math.abs(hasil).toLocaleString('id-ID');

            uangKurang.style.display = 'block';

            checkoutButton.disabled = true;

            return;

        }


        // Uang cukup
        kembalianBox.classList.remove(
            'alert-danger'
        );

        kembalianBox.classList.add(
            'alert-success'
        );

        kembalian.innerText =
            'Rp ' +
            hasil.toLocaleString('id-ID');

        uangKurang.style.display = 'none';

        checkoutButton.disabled = false;

    });


    // ================= NOMINAL CEPAT =================

    document.querySelectorAll('.nominal-btn').forEach(function (button) {

        button.addEventListener('click', function () {

            const nominal = parseInt(
                this.dataset.value
            );

            uangDibayar.value = nominal;

            uangDibayar.dispatchEvent(
                new Event('input')
            );

        });

    });


    // ================= VALIDASI CHECKOUT =================

    document.getElementById('checkoutForm')
        .addEventListener('submit', function (event) {

            const metode = paymentMethod.value;


            // Belum pilih pembayaran
            if (!metode) {

                event.preventDefault();

                alert(
                    'Silakan pilih metode pembayaran.'
                );

                return;

            }


            // TUNAI
            if (metode === 'TUNAI') {

                const uang =
                    parseInt(uangDibayar.value) || 0;


                if (uang < total) {

                    event.preventDefault();

                    alert(
                        'Uang pembayaran customer masih kurang.'
                    );

                    uangDibayar.focus();

                    return;

                }

            }


            // QRIS
            if (metode === 'QRIS') {

                const yakin = confirm(
                    'Pastikan pembayaran QRIS sudah berhasil. Lanjutkan checkout?'
                );


                if (!yakin) {

                    event.preventDefault();

                    return;

                }

            }

        });

});

</script>

@endsection