<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Banner;
use App\Models\Faq;
use App\Models\Blog;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {
            return back()->with('success', 'You have successfully registered');
        } else {
            return back()->with('fail', 'Something Wrong');
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'The password does not match');
            }
        } else {
            return back()->with('fail', 'The Email is not Valid/Registered');
        }
    }

    public function dashboard()
    {

        if (isset($request['product_name'])) {
            $search_name = $request['product_name'] ?? "";

            if ($search_name != "") {
                //where
                $product_search = Product::where('product_name', 'like', '%' . $search_name . '%')->get();
            } else {
                $product_search = [];
            }
            //return view('auth.dashboard', compact('product_search', 'all_product', 'total_banner', 'banner_nav', 'blogs', 'sub_all', 'sub_dec', 'cat_all'));
        } else {
            $product_search=false;
            //return view('auth.dashboard', compact( 'product_search','all_product', 'total_banner', 'banner_nav', 'blogs', 'sub_all', 'sub_dec', 'cat_all'));
        }

        $sub_all = SubCategory::all();
        $sub_dec = SubCategory::orderBy('created_at', 'desc')->get();
        $blogs = Blog::all();
        $banner_nav = Banner::all();
        $total_banner = Banner::all()->count();
        $all_product = Product::paginate(8);
        $cat_all = Category::all();
        return view('auth.dashboard', compact('cat_all', 'all_product', 'banner_nav', 'total_banner', 'blogs', 'sub_all', 'sub_dec', 'product_search'));
    }

    public function logOut()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }

    public function subcategory($id)
    {

        $sub_all = SubCategory::where('cat_id', '=', $id)->get();
        $cat_all = Category::all();
        return view('auth.subcategory', compact('cat_all', 'sub_all', 'id'));
    }

    public function product($id)
    {

        $prod_all = Product::where('sub_id', '=', $id)->get();
        $cat_all = Category::all();
        return view('auth.product', compact('cat_all', 'prod_all', 'id'));
    }

    public function contact()
    {

        $cat_all = Category::all();
        return view('auth.contact', compact('cat_all'));
    }

    //view product details

    public function productView($id)
    {

        $all_product = Product::where('id', '=', $id)->get();
        $cat_all = Category::all();
        return view('auth.productdetails', compact('cat_all', 'all_product'));
    }

    //Faqs page

    public function faq()
    {
        $faqs = Faq::all();
        $cat_all = Category::all();
        return view('auth.faqs', compact('cat_all', 'faqs'));
    }

    //Blog Page

    public function blog()
    {
        $blogs = Blog::all();
        $cat_all = Category::all();
        return view('auth.blog', compact('cat_all', 'blogs'));
    }

    //product Search 

    public function list(Request $request)
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
            return view('auth.dashboard', compact('product_search', 'all_product', 'total_banner', 'banner_nav', 'blogs', 'sub_all', 'sub_dec', 'cat_all'));
        } else {
            $product_search=false;
            return view('auth.dashboard', compact( 'product_search','all_product', 'total_banner', 'banner_nav', 'blogs', 'sub_all', 'sub_dec', 'cat_all'));
        }
    }
}
