<?php

namespace App\Http\Controllers;

use App\Http\Requests\Produk\StoreRequest;
use App\Models\Produk;
use App\Models\JenisProduk;
use App\Models\ItemPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{

    public function index(Request $request)
    {
        $this->authorize('viewAny', Produk::class);

        $keyword = $request->search;

        $products = Produk::with('jenisProduk')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%');
            })
            ->orderBy('nama')
            ->paginate(10)
            ->withQueryString();

        return view('produk.index', compact('products'));
    }


    public function create()
{
    $jenisProduks = JenisProduk::orderBy('nama')->get();

    return view('produk.create', compact('jenisProduks'));
}



    public function store(StoreRequest $request)
{
    $this->authorize('create', Produk::class);

    $data = $request->validated();

    $produk = new Produk();

    $produk->user_id = Auth::id();
    $produk->jenis_produk_id = $data['jenis_produk_id'];
    $produk->nama = $data['name'];
    $produk->harga_beli = $data['purchase_price'];
    $produk->harga_jual = $data['selling_price'];
    $produk->stok = $data['stock'];

    if ($request->hasFile('foto')) {
        $produk->foto = $request
            ->file('foto')
            ->store('products', 'public');
    }

    $produk->save();

    return redirect()
        ->route('produk.index')
        ->with('success', 'Produk berhasil ditambahkan.');
}


    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }


    public function edit(Produk $produk)
    {
        $this->authorize('update', $produk);

        $jenisProduks = JenisProduk::all();

        return view('produk.edit', [
            'produk' => $produk,
            'jenisProduks' => $jenisProduks
        ]);
    }


    public function update(StoreRequest $request, Produk $produk)
    {
        $this->authorize('update', $produk);

        $data = $request->validated();

        $produkData = [
            'user_id' => Auth::id(),
            'jenis_produk_id' => $data['jenis_produk_id'],
            'nama' => $data['name'],
            'harga_beli' => $data['purchase_price'],
            'harga_jual' => $data['selling_price'],
            'stok' => $data['stock'],
        ];


        if ($request->hasFile('foto')) {

            if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
                Storage::disk('public')->delete($produk->foto);
            }


            $produkData['foto'] = $request
                ->file('foto')
                ->store('products', 'public');
        }


        $produk->update($produkData);


        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diupdate.');
    }


    public function destroy(Produk $produk)
{
    $sudahTerjual = ItemPenjualan::where('produk_id', $produk->id)->exists();

    if ($sudahTerjual) {
        return redirect()
            ->route('produk.index')
            ->with('error', 'Produk tidak dapat dihapus karena sudah memiliki riwayat penjualan.');
    }

    if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
        Storage::disk('public')->delete($produk->foto);
    }

    $produk->delete();

    return redirect()
        ->route('produk.index')
        ->with('success', 'Produk berhasil dihapus.');
}
}