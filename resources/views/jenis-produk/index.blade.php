@extends('layouts.app')

@section('title', 'Jenis Produk')

@section('content')

@include('layouts.navbar')

<div class="container">

    <h1 class="fw-bold mb-3">
        <i class="bi bi-tags-fill"></i> Jenis Produk
    </h1>

    <div class="d-flex gap-2 mb-4">

        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <x-btn-tambah :href="route('jenis-produk.create')" label="Jenis" />

    </div>


    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <form action="{{ route('jenis-produk.index') }}" method="GET">

                <div class="input-group">

                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="form-control"
                           placeholder="Cari jenis produk...">

                    <button class="btn btn-outline-primary">
                        <i class="bi bi-search"></i> Search
                    </button>

                </div>

            </form>

        </div>
    </div>


    <div class="card shadow-sm">

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Jenis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($jenisProduks as $jenis)

                    <tr>

                        <td>
                            {{ $jenisProduks->firstItem() + $loop->index }}
                        </td>

                        <td class="fw-semibold">
                            {{ $jenis->nama }}
                        </td>

                        <td>

                            <a href="{{ route('jenis-produk.edit', $jenis) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('jenis-produk.destroy', $jenis) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus jenis produk ini?')">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            Belum ada jenis produk
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

            {{ $jenisProduks->links() }}

        </div>

    </div>

</div>

@endsection