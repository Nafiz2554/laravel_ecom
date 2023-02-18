<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.category.index', compact('categories'));
        } else {
            return Redirect::to('/admins')->send();
        }
    }


    public function create()
    {
        $categories = Category::all();
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.category.create', compact('categories'));
        } else {
            return Redirect::to('/admins')->send();
        }
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->id = $request->category;
        $category->name = $request->name;
        $category->type = $request->type;
        $category->image = $request->image->store('category');
        $category->save();
        return redirect()->back()->with('message', 'New Category Successfully Added');
    }



    public function edit_category(Category $category)
    {
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.category.index', compact('category'));
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
    public function update(Request $request, Category $category)
    {
        $update = $category->update([
            'name' => $request->name,
            'type' => $request->type,
            'image' => $request->file('image')->store('category')
        ]);
        if ($update) {
            return redirect('/categories')->with('message', 'Category has been updated successfully');
        }
    }

    // public function update(Request $request){ 
    //     $update = DB::update('update categories set name=?, type=? where id=?',
    //     [$request->name,$request->type, $request->id]);

    //     if($update){
    //         return redirect('/categories')->with('message', 'Successfully Updated!');
    //     }
    //     else{
    //         return redirect('/categories')->with('message', 'Failed to Updated!');
    //     }
    // }

    public function change_status(Category $category)
    {
        if ($category->status == 1) {
            $category->update(['status' => 0]);
        } else {
            $category->update(['status' => 1]);
        }
        return redirect()->back()->with('message', 'Status changed successfully');
    }

    public function delete(Category $category)
    {
        $sub = DB::select('select * from sub_categories where cat_id = ?', [$category->id]);
        foreach ($sub as $val) {
            $prod = DB::select('select * from products where sub_id = ?', [$val->id]);
            DB::delete('delete from products where sub_id = ?', [$val->id]);
            foreach ($prod as $val) {
                unlink(storage_path('app/public/' . $val->image));
            }
        }


        DB::delete('delete from sub_categories where cat_id = ?', [$category->id]);

        foreach ($sub as $val) {
            unlink(storage_path('app/public/' . $val->image));
        }


        unlink(storage_path('app/public/' . $category->image));
        $delete = $category->delete();
        if ($delete) {
            return redirect()->back()->with('message', ' This Category has been deleted successfully');
        }
    }
}
