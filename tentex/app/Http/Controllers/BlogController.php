<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.blog.index', compact('blogs'));
        } else {
            return Redirect::to('/admins')->send();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.blog.create');
        } else {
            return Redirect::to('/admins')->send();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog;
        $blog->id = $request->blog;
        $blog->title = $request->title;
        $blog->desc = $request->desc;
        $blog->image = $request->image->store('blog');

        $blog->save();
        return redirect()->back()->with('message', 'Blog Successfully Created');
    }


    public function delete(Blog $blog)
    {

        unlink(storage_path('app/public/' . $blog->image));
        $delete = $blog->delete();
        if ($delete) {
            return redirect()->back()->with('message', 'Blog  has removed successfully');
        }
    }
}
