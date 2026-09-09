@extends('layouts.app')

@section('title', 'Edit Jenis Produk')

@section('content')

@include('layouts.navbar')

<div class="container">

    <h1 class="fw-bold mb-4">
        🏷️ Edit Jenis Produk
    </h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('jenis-produk.update', $jenisProduk) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Jenis</label>

                    <input type="text"
                           name="nama"
                           value="{{ old('nama', $jenisProduk->nama) }}"
                           class="form-control @error('nama') is-invalid @enderror">

                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-primary">
                        Update
                    </button>

                    <a href="{{ route('jenis-produk.index') }}"
                       class="btn btn-secondary">
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection