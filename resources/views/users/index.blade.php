@extends('layouts.app')

@section('title', 'Users')

@section('content')

@include('layouts.navbar')

<div class="container">

    <h1 class="fw-bold mb-3">
        <i class="bi bi-people-fill"></i> Halaman Users
    </h1>

    <div class="d-flex gap-2 mb-4">

        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <x-btn-tambah :href="route('admin.users.create')" label="User" />

    </div>


    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <form action="{{ route('admin.users.index') }}" method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="Search username or email"
                    >

                    <button class="btn btn-outline-primary" type="submit">
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
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse ($users as $user)

                    <tr>

                        <td>
                            {{ $users->firstItem() + $loop->index }}
                        </td>


                        <td class="fw-semibold">
                            {{ $user->name }}
                        </td>


                        <td>
                            {{ $user->email }}
                        </td>


                        <td>
                            {{ $user->role?->name ?? 'Belum ada role' }}
                        </td>


                        <td>


                            <a href="{{ route('admin.users.edit', $user) }}"
                               class="btn btn-sm btn-warning">

                                Edit akun

                            </a>



                            <form action="{{ route('admin.users.destroy', $user) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')


                                <button
                                    type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin hapus user ini?')">

                                    Hapus

                                </button>


                            </form>


                        </td>


                    </tr>

                    @empty

                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Belum ada data user
                        </td>
                    </tr>

                    @endforelse


                </tbody>


            </table>

            {{ $users->links() }}

        </div>

    </div>

</div>

@endsection