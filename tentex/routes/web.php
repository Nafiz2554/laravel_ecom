<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BlogController;
 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home']); 
Route::get('/contact-us', [HomeController::class, 'contact']); 


//Auth

Route::get('/login', [CustomAuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/registration', [CustomAuthController::class, 'registration'])->middleware('alreadyLoggedIn');
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [CustomAuthController::class, 'logOut']);


//subcategory page before login
Route::get('/sub-category/{id}', [HomeController::class, 'subcategory']);

//subcategory page after login
Route::get('/sub-category-log/{id}', [CustomAuthController::class, 'subcategory']);

//product page before login
Route::get('/view-product/{id}', [HomeController::class, 'product']);

//product page after login
Route::get('/view-product-log/{id}', [CustomAuthController::class, 'product']);

//contact after login

Route::get('/contact-us-log', [CustomAuthController::class, 'contact'])->middleware('isLoggedIn'); 

//Contact (Sending Message)

Route::resource('/messages/',MessageController::class);
Route::post('/message',[MessageController::class,'store_message']);
Route::get('/show-message',[MessageController::class,'show_message']);
Route::delete('/messagedelete/{messages}',[MessageController::class,'delete_message']);

//product details before login
Route::get('/productview/{id}', [HomeController::class, 'productView']);

//product details after login
Route::get('/productviewlog/{id}', [CustomAuthController::class, 'productView']);

//cart  
Route::get('cart', [CartController::class, 'cart'])->name('cart')->middleware('isLoggedIn');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

// Order part

Route::resource('/orders/',OrderController::class);
Route::post('/order',[OrderController::class,'store_order']);
Route::get('/show-order',[OrderController::class,'show_order']);
Route::get('/order-status{orders}',[OrderController::class,'change_status']);
Route::get('/orderdelete/{id}',[OrderController::class,'delete_order']);

//confirm order
Route::get('/confirm-order/{id}',[OrderController::class,'confirm_order']);

//faq part after login
Route::get('/all-faq', [CustomAuthController::class, 'faq'])->middleware('isLoggedIn');

//faq part before login
Route::get('/all-faqs', [HomeController::class, 'faq']);

//Blog page before login
Route::get('/all-blogs', [HomeController::class, 'blog']);

//Blog page after login
Route::get('/all-blog', [CustomAuthController::class, 'blog'])->middleware('isLoggedIn');

//Seacrh before login
Route::get('/product-searchs',[HomeController::class,'lists']);

//Seacrh after login
Route::get('/product-search',[CustomAuthController::class,'list']);


//backend part

//Admin login
Route::get('/admins', [AdminController::class, 'index']);
Route::post('/admin.dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/admin-dashboard', [SuperAdminController::class, 'dashboard']);
Route::get('/admin-logout', [SuperAdminController::class, 'logout']);

//Add category
Route::resource('/categories/',CategoryController::class); 
Route::get('/category-status{category}',[CategoryController::class,'change_status']);
Route::delete('/category-delete/{category}',[CategoryController::class,'delete']);
Route::get('/create-category',[CategoryController::class,'create']);

Route::get('/edit-category/{category}',[CategoryController::class,'edit_category']);
Route::post('/update-category/{category}',[CategoryController::class,'update']);


//Add Sub-category
Route::resource('/subcategories/',SubCategoryController::class); 
Route::get('/subcategory-status{subcategory}',[SubCategoryController::class,'change_status']);
Route::delete('/subcategory-delete/{subcategory}',[SubCategoryController::class,'delete']);
Route::get('/create-subcategory',[SubCategoryController::class,'create']);

Route::get('/edit-subcategory/{subcategory}',[SubCategoryController::class,'edit_subcategory']);
Route::post('/update-subcategory/{subcategory}',[SubCategoryController::class,'update']);


//Add product
Route::resource('/products/',ProductController::class); 
Route::get('/product-status{product}',[ProductController::class,'change_status']);
Route::delete('/product-delete/{product}',[ProductController::class,'delete']);
Route::get('/create-product',[ProductController::class,'create']);

Route::get('/edit-product/{product}',[ProductController::class,'edit_product']);
Route::post('/update-product/{product}',[ProductController::class,'update']);


//Deleting User From Admin

Route::resource('/users/',HomeController::class);
Route::get('/all-user',[HomeController::class,'all_user']);
Route::delete('/user-delete/{users}',[HomeController::class,'delete_user']);

//Add banner
Route::resource('/banners/',BannerController::class);  
Route::delete('/banner-delete/{banner}',[BannerController::class,'delete']);
Route::get('/create-banner',[BannerController::class,'create']);

Route::get('/edit-banner/{banner}',[BannerController::class,'edit_banner']);
Route::post('/update-banner/{banner}',[BannerController::class,'update']);

//Faqs part

Route::resource('/faqs/',FaqController::class);
Route::get('/faq-status{faq}',[FaqController::class,'change_status']); 
Route::delete('/faq-delete/{faq}',[FaqController::class,'delete']); 
Route::get('/faq-create',[FaqController::class,'create']); 

//Blog part


Route::resource('/blogs/',BlogController::class); 
Route::delete('/blog-delete/{blog}',[BlogController::class,'delete']); 
Route::get('/blog-create',[BlogController::class,'create']); 

//image link
 