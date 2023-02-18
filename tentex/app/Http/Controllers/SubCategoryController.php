<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index()
    {   
        
        $subcategories = SubCategory::all();
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.subcategory.index', compact('subcategories'));
        } else {
            return Redirect::to('/admins')->send();
        }
    }


    public function create()
    {   
        $category_all=Category::all();
        $subcategories = SubCategory::all();
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.subcategory.create', compact('subcategories','category_all'));
        } else {
            return Redirect::to('/admins')->send();
        }
    }

    public function store(Request $request)
    {
        $subcategory = new SubCategory;
        $subcategory->id = $request->subcategory;
        $subcategory->sub_name = $request->sub_name;
        $subcategory->sub_type = $request->sub_type;
        $subcategory->sub_desc = $request->sub_desc;
        $subcategory->cat_id = $request->cat_id;
        $subcategory->image = $request->image->store('subcategory');
        $subcategory->save();
        return redirect()->back()->with('message', 'New Sub-Category Successfully Added');
    }



    public function edit_subcategory(SubCategory $subcategory)
    {   

        $category_all=Category::all();
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.subcategory.index', compact('subcategory','category_all'));
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
    public function update(Request $request, SubCategory $subcategory)
    {
        $update = $subcategory->update([
            'sub_name' => $request->sub_name,
            'sub_type' => $request->sub_type,
            'sub_desc' => $request->sub_desc,
            'cat_id' => $request->cat_id,
            'image' => $request->file('image')->store('subcategory')
        ]);
        if ($update) {
            return redirect('/subcategories')->with('message', 'Sub-category has been updated successfully');
        }
    }

   

    public function change_status(SubCategory $subcategory)
    {
        if ($subcategory->status == 1) {
            $subcategory->update(['status' => 0]);
        } else {
            $subcategory->update(['status' => 1]);
        }
        return redirect()->back()->with('message', 'Status changed successfully');
    }

    public function delete(SubCategory $subcategory)
    {

        $prod = DB::select('select * from products where sub_id = ?', [$subcategory->id]);
        DB::delete('delete from products where sub_id = ?', [$subcategory->id]);

        foreach ($prod as $val) {
            unlink(storage_path('app/public/' . $val->image));
        }



        unlink(storage_path('app/public/' . $subcategory->image));
        $delete = $subcategory->delete();
        if ($delete) {
            return redirect()->back()->with('message', ' This Sub-category has been deleted successfully');
        }
    }
}
