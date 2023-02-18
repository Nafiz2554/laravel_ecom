<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\SubCategory;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.product.index', compact('products'));
        } else {
            return Redirect::to('/admins')->send();
        }
    }


    public function create()
    {
        $subcategory_all = SubCategory::all();
        $products = Product::all();
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.product.create', compact('products', 'subcategory_all'));
        } else {
            return Redirect::to('/admins')->send();
        }
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->id = $request->product;
        $product->product_name = $request->product_name;
        $product->product_type = $request->product_type;
        $product->product_desc = $request->product_desc;
        $product->product_price = $request->product_price;
        $product->discount = $request->discount;
        $product->product_size = $request->product_size;
        $product->product_quantity = $request->product_quantity;
        $product->tag = $request->tag;
        $product->stock = $request->stock;
        $product->review = $request->review;
        $product->sub_id = $request->sub_id;
        //$product->image = $request->image->store('product');
        if ($request->hasFile('image')) {
            $product->image = $request->image->store('product');
        }
        $product->save();
        return redirect()->back()->with('message', 'New product Successfully Added');
    }



    public function edit_product(Product $product)
    {
        $subcategory_all = SubCategory::all();
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.product.index', compact('product', 'subcategory_all'));
        } else {
            return Redirect::to('/admins')->send();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $update = $product->update([
            'product_name' => $request->product_name,
            'product_type' => $request->product_type,
            'product_desc' => $request->product_desc,
            'product_price' => $request->product_price,
            'discount' => $request->discount,
            'product_size' => $request->product_size,
            'product_quantity' => $request->product_quantity,
            'tag' => $request->tag,
            'stock' => $request->stock,
            'review' => $request->review,
            'sub_id' => $request->sub_id,
            'image' => $request->file('image')->store('product')
        ]);
        if ($update) {
            return redirect('/products')->with('message', 'Product has been updated successfully');
        }
    }



    public function change_status(Product $product)
    {
        if ($product->status == 1) {
            $product->update(['status' => 0]);
        } else {
            $product->update(['status' => 1]);
        }
        return redirect()->back()->with('message', 'Status changed successfully');
    }

    public function delete(Product $product)
    {
        unlink(storage_path('app/public/' . $product->image));
        $delete = $product->delete();
        if ($delete) {
            return redirect()->back()->with('message', ' This product has been deleted successfully');
        }
    }
}
