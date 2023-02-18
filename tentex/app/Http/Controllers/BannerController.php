<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Redirect;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.banner.index', compact('banners'));
        } else {
            return Redirect::to('/admins')->send();
        }
    }


    public function create()
    {
        $banners = Banner::all();
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.banner.create', compact('banners'));
        } else {
            return Redirect::to('/admins')->send();
        }
    }

    public function store(Request $request)
    {
        $banner = new Banner;
        $banner->id = $request->banner;
        $banner->title = $request->title;
        $banner->desc = $request->desc; 
        $banner->image = $request->image->store('banner');
        $banner->save();
        return redirect()->back()->with('message', 'New Banner Successfully Added');
    }



    public function edit_banner(Banner $banner)
    {   
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.banner.index', compact('banner'));
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
    public function update(Request $request, Banner $banner)
    {
        $update = $banner->update([
            'title' => $request->title,
            'desc' => $request->desc, 
            'image' => $request->file('image')->store('banner')
        ]);
        if ($update) {
            return redirect('/banners')->with('message', 'Banner has been updated successfully');
        }
    }

    

    public function delete(Banner $banner)
    {   
        unlink(storage_path('app/public/' . $banner->image));
        $delete = $banner->delete();
        if ($delete) {
            return redirect()->back()->with('message', ' This Category has been deleted successfully');
        }
    }
}
