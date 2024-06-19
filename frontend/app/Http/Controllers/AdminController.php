<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function order_list() {
        $data = Order::all();
        return view('admin.order_list', compact('data'));
    }

    public function view_category() {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request) {
        $category = new Category;

        $category->name = $request->category;

        $category->save();

        toastr()->closeButton()->addSuccess('Kategori Berhasil Ditambahkan!');

        return redirect()->back();
    }

    public function edit_category($id) {
        $data = Category::find($id);

        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id) {
        $data = Category::find($id);

        $data->name = $request->category;

        $data->save();

        toastr()->closeButton()->addSuccess('Kategori Berhasil Diperbarui!');

        return redirect('/admin/view_category');
    }

    public function delete_category($id) {
        $data = Category::find($id);

        $data->delete();

        toastr()->closeButton()->addSuccess('Kategori Berhasil Dihapus!');

        return redirect()->back();
    }
}
