<?php

namespace App\Http\Controllers;

use App\Models\ItemPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemPenjualanController extends Controller
{
    /**
     * Tambah produk ke keranjang
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:produk,id',
            'quantity'   => 'required|integer|min:1'
        ]);


        try {

            DB::transaction(function () use ($request) {

                $sale = Penjualan::where('user_id', Auth::id())
                    ->where('status', 'OPEN')
                    ->firstOrFail();


                $product = Produk::lockForUpdate()
                    ->findOrFail($request->product_id);


                // cek stok
                if ($product->stok < $request->quantity) {
                    throw new \Exception('Produk stok tidak mencukupi');
                }


                // kurangi stok
                $product->decrement('stok', $request->quantity);


                // cek item sudah ada
                $item = ItemPenjualan::where('penjualan_id', $sale->id)
                    ->where('produk_id', $product->id)
                    ->lockForUpdate()
                    ->first();


                if ($item) {

                    $item->kuantitas += $request->quantity;

                } else {

                    $item = new ItemPenjualan([
                        'penjualan_id' => $sale->id,
                        'produk_id'    => $product->id,
                        'kuantitas'    => $request->quantity,
                        'harga_satuan' => $product->harga_jual,
                    ]);

                }


                // hitung subtotal
                $item->subtotal =
                    $item->kuantitas * $item->harga_satuan;

                $item->save();


                // update total penjualan
                $sale->load('itemPenjualan');

                $sale->update([
                    'total_pembayaran' =>
                        $sale->itemPenjualan->sum('subtotal')
                ]);

            });


        } catch (\Exception $e) {

            return redirect()
                ->route('penjualan.create')
                ->with('errors', $e->getMessage());

        }


        return back();
    }



    /**
     * Update jumlah item
     */
    public function update(Request $request, ItemPenjualan $itempenjualan)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);


        try {

            DB::transaction(function () use ($request, $itempenjualan) {


                $produk = $itempenjualan->produk()
                    ->lockForUpdate()
                    ->first();


                $selisih =
                    $request->quantity - $itempenjualan->kuantitas;



                // tambah jumlah beli
                if ($selisih > 0) {

                    if ($produk->stok < $selisih) {
                        throw new \Exception('Stok tidak mencukupi');
                    }


                    $produk->decrement('stok', $selisih);

                }



                // kurangi jumlah beli
                if ($selisih < 0) {

                    $produk->increment(
                        'stok',
                        abs($selisih)
                    );

                }



                // update item
                $itempenjualan->update([

                    'kuantitas' => $request->quantity,

                    'subtotal' =>
                        $request->quantity *
                        $itempenjualan->harga_satuan

                ]);



                // update total
                $sale = $itempenjualan->penjualan;

                $sale->load('itemPenjualan');

                $sale->update([

                    'total_pembayaran' =>
                        $sale->itemPenjualan->sum('subtotal')

                ]);

            });


        } catch (\Exception $e) {

            return redirect()
                ->route('penjualan.create')
                ->with('errors', $e->getMessage());

        }


        return back();
    }



    /**
     * Hapus item
     */
    public function destroy(ItemPenjualan $itempenjualan)
    {
        $this->authorize('delete', $itempenjualan);


        DB::transaction(function () use ($itempenjualan) {


            $produk = $itempenjualan->produk;

            $sale = $itempenjualan->penjualan;



            // kembalikan stok
            $produk->increment(
                'stok',
                $itempenjualan->kuantitas
            );



            // hapus item
            $itempenjualan->delete();



            // update total
            $sale->load('itemPenjualan');


            $sale->update([

                'total_pembayaran' =>
                    $sale->itemPenjualan->sum('subtotal')

            ]);

        });


        return back();
    }
}