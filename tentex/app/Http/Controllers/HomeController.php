<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Banner;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Faq;

class HomeController extends Controller
{
    public function home()
    {

        if (isset($request['product_name'])) {
            $search_name = $request['product_name'] ?? "";

            if ($search_name != "") {
                //where
                $product_search = Product::where('product_name', 'like', '%' . $search_name . '%')->get();
            } else {
                $product_search = [];
            }
        } else {
            $product_search = false;
        }

        $sub_all = SubCategory::all();
        $sub_dec = SubCategory::orderBy('created_at', 'desc')->get();
        $blogs = Blog::all();
        $banner_nav = Banner::all();
        $total_banner = Banner::all()->count();
        $all_product = Product::paginate(8);
        $cat_all = Category::all();
        return view('frontend.home', compact('cat_all', 'all_product', 'banner_nav', 'total_banner', 'blogs', 'sub_all', 'sub_dec', 'product_search'));
    }



    public function contact()
    {

        $cat_all = Category::all();
        return view('frontend.contact', compact('cat_all'));
    }

    public function subcategory($id)
    {

        $sub_all = SubCategory::where('cat_id', '=', $id)->get();
        $cat_all = Category::all();
        return view('frontend.subcategory', compact('cat_all', 'sub_all', 'id'));
    }

    public function product($id)
    {

        $prod_all = Product::where('sub_id', '=', $id)->get();
        $cat_all = Category::all();
        return view('frontend.product', compact('cat_all', 'prod_all', 'id'));
    }



    //view product details

    public function productView($id)
    {

        $all_product = Product::where('id', '=', $id)->get();
        $cat_all = Category::all();
        return view('frontend.productdetails', compact('cat_all', 'all_product'));
    }


    //admin->all user

    public function all_user()
    {

        $allUser = User::all();
        $admin_id = Session()->get('admin_id');
        if ($admin_id) {
            return view('admin.all_user', compact('allUser'));
        } else {
            return Redirect::to('/admins')->send();
        }
    }

    public function delete_user(User $users)
    {
        $delete = $users->delete();
        if ($delete) {
            return redirect()->back()->with('message', 'User deleted successfully');
        }
    }

    //admin->all user end

    //Faqs page

    public function faq()
    {
        $faqs = Faq::all();
        $cat_all = Category::all();
        return view('frontend.faqs', compact('cat_all', 'faqs'));
    }

    //Blog Page

    public function blog()
    {
        $blogs = Blog::all();
        $cat_all = Category::all();
        return view('frontend.blog', compact('cat_all', 'blogs'));
    }

    //product Search 

    public function lists(Request $request)
    {

        $cat_all = Category::all();
        $sub_all = SubCategory::all();
        $sub_dec = SubCategory::orderBy('created_at', 'desc')->get();
        $blogs = Blog::all();
        $banner_nav = Banner::all();
        $total_banner = Banner::all()->count();
        $all_product = Product::paginate(8);


        if (isset($request['product_name'])) {
            $search_name = $request['product_name'] ?? "";

            if ($search_name != "") {
                //where
                $product_search = Product::where('product_name', 'like', '%' . $search_name . '%')->get();
            } else {
                $product_search = [];
            }
            return view('frontend.home', compact('product_search', 'all_product', 'total_banner', 'banner_nav', 'blogs', 'sub_all', 'sub_dec', 'cat_all'));
        } else {
            $product_search = false;
            return view('frontend.home', compact('product_search', 'all_product', 'total_banner', 'banner_nav', 'blogs', 'sub_all', 'sub_dec', 'cat_all'));
        }
    }
}
