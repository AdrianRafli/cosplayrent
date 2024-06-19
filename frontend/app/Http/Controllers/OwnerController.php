<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Costume;
use App\Models\Order;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function view_costume() {
        $costume = Costume::all();

        return view('owner.view_costume', compact('costume'));
    }

    public function add_costume() {
        $category = Category::all();

        return view('owner.add_costume', compact('category'));
    }

    public function upload_costume(Request $request) {
        $shop_id = Shop::where('user_id', Auth::id())->value('id');
        $data = new Costume();

        $data->shop_id = $shop_id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->day = $request->day;
        $data->category = $request->category;
        $data->size = $request->size;
        $data->available = $request->available;

        $image = $request->image;
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('costumes',$imagename);
            $data->image = $imagename;
        }

    
        $data->save();

        toastr()->closeButton()->addSuccess('Kostum Berhasil Dibuat!');

        return redirect()->back();
    }

    public function edit_costume($id) {
        $data = Costume::find($id);
        $category = Category::all();

        return view('owner.edit_costume', compact('data', 'category'));
    }

    public function update_costume(Request $request, $id) {
        $data = Costume::find($id);

        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->day = $request->day;
        $data->category = $request->category;
        $data->size = $request->size;
        $data->available = $request->available;

        $image = $request->image;
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('costumes',$imagename);
            $data->image = $imagename;
        }


        $data->save();

        toastr()->closeButton()->addSuccess('Kostume Berhasil Diperbarui!');

        return redirect('/owner/view_costume');
    }

    public function delete_costume($id) {
        $data = Costume::find($id);

        $image_path = public_path('costumes/'.$data->image);

        // hapus gambar dari public
        if(file_exists($image_path)) {
            unlink($image_path);
        }

        $data->delete();

        toastr()->closeButton()->addSuccess('Kostum Berhasil Dihapus!');

        return redirect()->back();
    }

    public function order_list() {
        $user = Auth::user()->id;
        $shop = Shop::where('user_id', $user)->pluck('id');
        $data = Order::where('shop_id', $shop)->get();
        return view('owner.order_list', compact('data'));
    }

    public function dikirim($id) {
        $data = Order::find($id);
        $data->status = 'dikirim';
        $data->save();

        toastr()->closeButton()->addSuccess('Status Order Berhasil Diubah menjadi Dikirim!');

        return redirect('/owner/order_list');
    }
    public function selesai($id) {
        $data = Order::find($id);
        $data->status = 'selesai';
        $data->save();

        toastr()->closeButton()->addSuccess('Status Order Berhasil Diubah menjadi Selesai!');

        return redirect('/owner/order_list');
    }
}
