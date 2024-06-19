<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Costume;
use App\Models\Order;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function admin() {
        $renter = User::where('role', 'renter')->get()->count();
        $owner = User::where('role', 'owner')->get()->count();
        $order = Order::all()->count();
        $selesai = Order::where('status', 'selesai')->get()->count();
        return view('admin.index', compact('renter', 'owner', 'order', 'selesai'));
    }
    public function owner() {
        return view('owner.index');
    }

    public function home() {
        $costume = Costume::all();
        // $costume = Costume::all();
        if(Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = ' ';
        }
        return view('home.index', compact('costume', 'count'));
    }

    public function login_home() {
        $costume = Costume::all();
        if(Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = ' ';
        }
        return view('home.index', compact('costume', 'count'));
    }

    public function costume_details($id) {
        $costume = Costume::find($id);

        // kostum di toko ini
        $related_costumes = Costume::where('shop_id', $costume->shop_id)
                                ->where('id', '!=', $costume->id) // Kecualikan kostum saat ini
                                ->get();

        // kostum terkait
        $related_category = Costume::where('category', $costume->category)
                            ->where('id', '!=', $costume->id)
                            ->get();
                            
        if(Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = ' ';
        }
        return view('home.costume_details', compact('costume', 'count', 'related_costumes', 'related_category'));
    }

    public function shop_details($id) {
        $shop = Shop::find($id);

        // kostum di toko ini
        $costume = Costume::where('shop_id', $shop->id)->get();
                            
        if(Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = ' ';
        }
        return view('home.shop_details', compact('shop', 'count', 'costume'));
    }

    public function search(Request $request)
    {
        $query = Costume::query();

        // Pencarian berdasarkan nama kostum
        if ($request->has('query') && $request->input('query') != '') {
            $query->where('name', 'like', '%' . $request->input('query') . '%');
        }

        $costumes = $query->get();

        return view('home.search', compact('costumes'));
    }

    public function add_cart($id, Request $request) {
        $costume_id = $id;
        // Mengambil shop_id dari Costume yang terkait dengan costume_id
        $costume = Costume::find($costume_id);
        $shop_id = $costume->shop_id;
        
        $user = Auth::user();
        $user_id = $user->id;
        
        $data = new Cart;

        $data->user_id = $user_id;
        $data->costume_id = $costume_id;
        $data->shop_id = $shop_id;
        $data->date_start = $request->date_start;
        $data->date_end = $request->date_end;

        $data->save();

        toastr()->closeButton()->addSuccess('Kostum Berhasil Masuk dalam Keranjang!');

        return redirect()->back();
    }

    public function mycart() {
        if(Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();

            $cart = Cart::where('user_id', $userid)->get();
            $cart2 = Cart::where('user_id', $userid)->get();
        } else {
            $count = ' ';
        }

        return view('home.mycart', compact('count', 'cart', 'cart2'));
    }

    public function delete_cart($id) {
        $data = Cart::find($id);
        $data->delete();

        toastr()->closeButton()->addSuccess('Kostum Berhasil Dihapus dari Keranjang!');

        return redirect()->back();
    }

    public function checkout() {
        if(Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();

            $cart = Cart::where('user_id', $userid)->get();
        } else {
            $count = ' ';
        }

        return view('home.checkout', compact('count', 'cart'));
    }

    public function confirm_order(Request $request) {

        $desa = $request->desa;
        $kelurahan = $request->kelurahan;
        $kecamatan = $request->kecamatan;
        $kabkot = $request->kabkota;
        $address = $request->address;
        $payment_method = $request->payment_method;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id', $userid)->get();

        foreach ($cart as $carts) {
            $order = new Order;
            $order->desa = $desa;
            $order->kelurahan = $kelurahan;
            $order->kecamatan = $kecamatan;
            $order->kabkot = $kabkot;
            $order->address = $address;
            $order->payment_method = $payment_method;
            $order->user_id = $userid;
            $order->shop_id = $carts->shop_id;
            $order->costume_id = $carts->costume_id;
            $order->save();

            
        }

        $cart_remove = Cart::where('user_id', $userid)->get();
        foreach ($cart_remove as $remove) {
            $data = Cart::find($remove->id);
            $data->delete();
        } 
        
        toastr()->closeButton()->addSuccess('Checkout Keranjang Berhasil, Silahkan Cek Halaman Order!');

        return redirect('/');

    }

    public function myorder() {
        if(Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $order = Order::where('user_id', $userid)->get();
        } else {
            $count = ' ';
        }

        return view('home.myorder', compact('count', 'order'));
    }
    public function diterima($id) {
        $data = Order::find($id);
        $data->status = 'diterima';
        $data->save();

        toastr()->closeButton()->addSuccess('Status Order Berhasil Diubah menjadi Diterima!');

        return redirect()->back();
    }
    public function dikembalikan($id) {
        $data = Order::find($id);
        $data->status = 'dikembalikan';
        $data->save();

        toastr()->closeButton()->addSuccess('Status Order Berhasil Diubah menjadi Dikembalikan!');

        return redirect()->back();
    }
}
