<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;


class CartController extends Controller
{
    //  Tampilkan isi cart
    public function index() {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // ➕ Tambah produk ke keranjang
    public function add(Request $request, $id) {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] + 1 > $product->stock) {
                return back()->with('error', 'Stok tidak mencukupi!');
            }
            $cart[$id]['quantity']++;
        } else {
            if ($product->stock < 1) {
                return back()->with('error', 'Stok kosong!');
            }
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "stock" => $product->stock,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    // 🔢 Update jumlah item di cart
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $qty = intval($request->quantity);

            if ($qty > $product->stock) {
                return back()->with('error', 'Jumlah melebihi stok yang tersedia!');
            }

            $cart[$id]['quantity'] = $qty;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    //  Checkout dan tampilkan summary
    public function checkout()
{
    $cart = session()->get('cart', []);
    $total = array_reduce($cart, function ($sum, $item) {
        return $sum + ($item['price'] * $item['quantity']);
    }, 0);

    //  Simpan ke tabel transactions
    Transaction::create([
        'items' => json_encode($cart),
        'total' => $total,
    ]);

    session()->forget('cart');

    return view('cart.checkout', compact('cart', 'total'));
}


    public function destroy($id)
{
    $cart = session()->get('cart');

    if (isset($cart[$id])) {
        unset($cart[$id]); // hapus item
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Item berhasil dihapus!');
    }

    return redirect()->route('cart.index')->with('error', 'Item tidak ditemukan!');
}

}
