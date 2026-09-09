<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use Illuminate\Http\Request;

class JenisProdukController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->search;

        $jenisProduks = JenisProduk::query()

            ->when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', "%$keyword%");
            })

            ->orderBy('nama')
            ->paginate(10)
            ->withQueryString();


        return view('jenis-produk.index', compact('jenisProduks'));
    }



    public function create()
    {
        return view('jenis-produk.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:jenis_produks,nama',
        ]);

        JenisProduk::create($request->only('nama'));

        return redirect()
            ->route('jenis-produk.index')
            ->with('success', 'Jenis produk berhasil ditambahkan');
    }



    public function edit(JenisProduk $jenisProduk)
    {
        return view('jenis-produk.edit', compact('jenisProduk'));
    }



    public function update(Request $request, JenisProduk $jenisProduk)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:jenis_produks,nama,' . $jenisProduk->id,
        ]);

        $jenisProduk->update($request->only('nama'));

        return redirect()
            ->route('jenis-produk.index')
            ->with('success', 'Jenis produk berhasil diperbarui');
    }

public function destroy(JenisProduk $jenisProduk)
{
    // Lepaskan hubungan produk dengan jenis produk
    $jenisProduk->produk()->update([
        'jenis_produk_id' => null
    ]);

    // Hapus jenis produk
    $jenisProduk->delete();

    return redirect()
        ->route('jenis-produk.index')
        ->with('success', 'Jenis produk berhasil dihapus');
}
}