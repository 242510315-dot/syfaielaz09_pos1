<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{

    public function index(SearchRequest $request)
{
    $user = Auth::user();
    $keyword = $request->search;

    $sales = Penjualan::query()

        ->with('itemPenjualan.produk')

        ->when($user->role->name === 'kasir', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })

        ->when($keyword, function ($query) use ($keyword) {
            $query->whereHas('user', function ($q) use ($keyword) {
                $q->where('name', 'like', "%$keyword%");
            });
        })

        ->latest()
        ->paginate(10)
        ->withQueryString();


    return view('penjualan.index', compact('sales'));
}



    public function create()
    {
        $sale = Penjualan::firstOrCreate(

            [
                'user_id' => Auth::id(),
                'status' => 'OPEN'
            ],

            [
                'total_pembayaran' => 0,
                'metode_pembayaran' => 'CASH'
            ]

        );


        $products = Produk::orderBy('nama')->get();

        $mode = 'create';


        return view(
            'penjualan.pos',
            compact(
                'sale',
                'products',
                'mode'
            )
        );
    }




    public function edit(Penjualan $penjualan)
    {
        $sale = $penjualan;

        $products = Produk::orderBy('nama')->get();

        $mode = 'edit';

        return view(
            'penjualan.pos',
            compact(
                'sale',
                'products',
                'mode'
            )
        );
    }




    public function store(Request $request)
    {
        $request->validate([

            'product_id' => 'required|exists:produk,id',

            'quantity' => 'required|integer|min:1'

        ]);



        $sale = Penjualan::where('user_id', Auth::id())

            ->where('status','OPEN')

            ->firstOrFail();



        $produk = Produk::findOrFail($request->product_id);



        DB::transaction(function () use ($sale,$produk,$request){


            $item = $sale->itemPenjualan()

                ->where('produk_id',$produk->id)

                ->first();



            if($item){


                $item->kuantitas += $request->quantity;


            }else{


                $item = $sale->itemPenjualan()->create([

                    'produk_id'=>$produk->id,

                    'kuantitas'=>$request->quantity,

                    'harga_satuan'=>$produk->harga_jual,

                    'subtotal'=>$request->quantity * $produk->harga_jual

                ]);

            }



            $item->subtotal =
                $item->kuantitas * $item->harga_satuan;


            $item->save();



            $sale->load('itemPenjualan');


            $sale->update([

                'total_pembayaran'
                    =>
                $sale->itemPenjualan->sum('subtotal')

            ]);

        });



        return back();

    }





    public function update(Request $request, Penjualan $penjualan)
    {

        $request->validate([

            'payment_method'=>'required'

        ]);



        $penjualan->update([

            'status'=>'COMPLETED',

            'metode_pembayaran'=>$request->payment_method

        ]);



        return redirect()

            ->route('penjualan.index')

            ->with(
                'success',
                'Transaksi berhasil checkout'
            );

    }

public function struk(Penjualan $penjualan)
{
    $penjualan->load([
        'user',
        'itemPenjualan.produk'
    ]);

    return view('penjualan.struk', compact('penjualan'));
}



    public function destroy(Penjualan $penjualan)
    {


        if($penjualan->status !== 'OPEN'){


            return redirect()

                ->route('penjualan.index')

                ->with(
                    'errors',
                    'Transaksi sudah selesai'
                );

        }




        DB::transaction(function() use ($penjualan){



            foreach($penjualan->itemPenjualan as $item){


                $item->produk

                    ->increment(
                        'stok',
                        $item->kuantitas
                    );


            }



            $penjualan->itemPenjualan()->delete();



            $penjualan->delete();


        });



        return redirect()

            ->route('penjualan.index')

            ->with(
                'success',
                'Transaksi berhasil dibatalkan'
            );

    }


}