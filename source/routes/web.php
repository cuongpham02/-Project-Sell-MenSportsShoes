<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
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

//use App\Http\Controllers\Frontend\ProductController;
Route::get('/',[DashboardController::class,'check']);
Route::group(['prefix' => 'Admin'], base_path('routes/web_backend/index.php'));
//-Trang Admin
Route::group(['prefix' => 'Admin'], function() {
//   //Login và đăng kí
//
//
//   //Middelware khi login mới dc vào
//   Route::group(['middleware'=>'admin_login'], function() {
//
//      //Admin/Controller-------------------------------------------------
//      Route::namespace('Admin')->group(function() {
//
//         Route::get('/','DashboardController@index')->name('dashboard.index'); // => Admin
//         Route::get('dashboard', 'DashboardController@index')->name('dashboard.dashboard');
//         // =>Admin/dashboard
//         Route::group(['middleware'=>'check_per:customer'],function(){
//            Route::get('all-customer','UsersController@index_customer')->name('Admin.all-customer');
//            Route::get('delete-customer/{id}','UsersController@delete_customer')->name('Admin.delete-customer');
//         });
//
//
//      // Route::group(['middleware'=>'Admin.roles'],function(){
//
//         // Route::post('assign-roles','UsersController@assign_roles')->name('Admin.assign');
//         // Route::get('delete-user-roles/{id}','UsersController@delete_user_roles');
//         // Route::get('add-users','UsersController@add_users');
//         // Route::post('store-users','UsersController@store_users')->name('save-add-users');
//         // Route::get('edit-user/{id}','UsersController@edit_users')->name('Admin.edit-users');
//         // Route::post('update-user/{id}','UsersController@update_user')->name('Admin.update-users');
//         // Route::get('all-users','UsersController@index_users');
//         Route::group(['middleware'=>'check_per:roles'],function(){
//            //Roles
//
//         });
//         //users-role-permission
//
//            //comment
//            Route::get('list-comments','CommentsController@show_list_comment')->name('Admin.show-list-comments');
//            Route::post('allow-comments','CommentsController@duyet_comment')->name('Admin.allow-comments');
//            Route::post('reply-comment','CommentsController@reply_comment')->name('Admin.reply-comments');
//            Route::get('delete-comments/{id}','CommentsController@delete_comment')->name('Admin.delete-comments');
//
//         Route::group(['prefix' => 'category','middleware'=>'check_per:category'], function() {
//            Route::get('/show-all-category', 'CategoryController@index')->name('Admin.show-category'); // =>Admin/category
//            Route::get('create-category', 'CategoryController@create')->name('Admin.create-category');
//            Route::post('save-category', 'CategoryController@store')->name('save-new-category-product');
//            Route::get('/edit-category/{id}', 'CategoryController@edit');
//            Route::post('/update-category/{id}', 'CategoryController@update')->name('update-category');
//            Route::get('/delete-category/{id}', 'CategoryController@destroy')->name('delete-category');
//         }); //End Category
//
//            Route::group(['prefix' => 'brand','middleware'=>'check_per:brand'], function() {
//               Route::get('/show-all-brand', 'BrandController@index')->name('Admin.show-brand'); // =>Admin/brand
//               Route::get('create-brand', 'BrandController@create'); // =>Admin/brand/create
//               Route::post('save-brand', 'BrandController@store')->name('save-new-brand-product');
//               Route::get('/edit-brand/{id}', 'BrandController@edit');
//               Route::post('/update-brand/{id}', 'BrandController@update')->name('update-brand');
//               Route::get('/delete-brand/{id}', 'BrandController@destroy')->name('delete-brand');
//            }); //End Brand
//
//            Route::group(['prefix' => 'product','middleware'=>'check_per:product'], function() {
//               Route::get('/show-all-product', 'ProductController@index')->name('Admin.show-product'); // =>Admin/product
//               Route::get('/add-product','ProductController@create')->name('Admin.add-product');
//               Route::post('/save-product','ProductController@store')->name('Admin.save-new-product');
//               Route::get('/edit-product/{id}','ProductController@edit_product')->name('Admin.edit-product');
//               Route::post('/update-product/{id}','ProductController@update')->name('Admin.update-product');
//               Route::get('/active-product/{id}','ProductController@active_product')->name('Admin.active-product');
//               Route::get('/unactive-product/{id}','ProductController@unactive_product')->name('Admin.unactive-product');
//               Route::get('/delete-product/{id}','ProductController@destroy')->name('Admin.delete-product');
//               Route::get('/size/{id}','ProductController@size')->name('Admin.size-product');
//               Route::get('/add-size','ProductController@add_size')->name('Admin.add-size');
//               Route::post('/create-new-size','ProductController@create_new_size')->name('Admin.create-new-size');
//               Route::post('update-size/{id}','ProductController@update_size_quantily')->name('Admin.update-size');
//               Route::get('/test-size','ProductController@add_qly_size');
//               //thư viên ảnh Gallery
//               Route::get('/gallery-product/{id}','GalleryController@gallery_product')->name('Admin.gallery-product');
//               Route::post('/load-gallery-product','GalleryController@load_gallery')->name('Admin.load-gallery-product');
//               Route::post('/insert-gallery-product/{id}','GalleryController@insert_gallery')->name('Admin.insert-gallery');
//               Route::post('/update-name-gallery','GalleryController@update_gallery_name')->name('Admin.update-name-gallery');
//               Route::post('/delete-gallery','GalleryController@delete_gallery')->name('Admin.delete-gallery');
//               Route::post('/update-image-gallery','GalleryController@update_gallery')->name('Admin.update-image-gallery');
//               //end
//
//            }); //End Product
//
//            Route::group(['prefix' => 'order','middleware'=>'check_per:order'], function() {
//               Route::get('/show-all-order', 'OrderController@index')->name('Admin.show-order');
//               Route::get('/order-detail/{order}', 'OrderController@edit')->name('Admin.order-detail'); // =>Admin/product
//               Route::get('/update/{id}', 'OrderController@update')->name('Admin.update-order');
//
//               Route::get('/active-order/{id}','ProductController@active_order')->name('Admin.active-order');
//               Route::get('/unactive-order/{id}','ProductController@unactive_order')->name('Admin.unactive-order');
//               Route::get('/delete-order/{id}','ProductController@destroy')->name('Admin.delete-order');
//
//            }); //End Order
//
//         }); //End Admin/Controller------------------------------------------
//      //-1 }); //End Middelware Admin và sub_admin
//
//   }); //End Login mới vào trang Dashboard
//});//-End Trang Admin
//
//
////Trang Fronend
//Route::namespace('Frontend')->group(function() {
//   Route::get('/', 'HomeController@index')->name('frontend.home');
//   // Route::group(['prefix' => 'home'], function() {
//      Route::get('/product-detail/{id}', 'HomeController@product_detail')->name('home.product-detail');
//      Route::get('/show-product-category/{id}', 'ProductController@show_product_category')->name('home.show-product-category');
//      Route::get('/show-product-brand/{id}', 'ProductController@show_product_brand')->name('home.show-product-brand');
//      //search trang frontend
//      Route::post('/search-ajax', 'ProductController@timkiem_ajax')->name('home.search-ajax');
//      Route::post('/search', 'ProductController@search_pc')->name('home.search-pc');
//   //login người dùng
//      Route::get('/login-register_customer', 'HomeController@login_register_customer')->name('home.login-register-customer');
//      Route::get('/logout-customer', 'HomeController@logout')->name('home.logout-customer');
//      Route::post('/add-customer', 'HomeController@add_customer')->name('home.add-customer');
//      Route::post('/login-customer', 'HomeController@login_customer')->name('home.login-customer');
//
//
//
//
//      //cart
//      Route::post('/add-to-cart', 'ProductController@addToCart')->name('home.add-to-cart');
//      Route::get('/delete-cart-item/{id}', 'ProductController@delete_cart_item')->name('home.delete_cart_item');
//      Route::get('/cart', 'ProductController@show_cart')->name('home.show-cart');
//      //order
//      Route::get('/orders', 'OrderController@create')->name('orders.create');
//      Route::post('/orders', 'OrderController@store')->name('orders.store');
//      Route::get('/show-order/{id}', 'OrderController@show_order')->name('orders.show-order');
//   // });
});
////comment trang frontend
//      Route::post('/load-comment', 'CommentsController@load_comment')->name('home.load-comment');
//      Route::post('/send-comment', 'CommentsController@send_comment')->name('home.send-comment');
//
//
//Route::get('/products', [ProductController::class, 'search']);
//
//Route::get('test', function() {
//   $cart = session('cart');
//   dd($cart->cartItems()->get()->toArray());
//   // dd($cart->toArray());
//});
//
//Route::get('test1', function() {
//   // $cart = session('cart')
//   session()->forget('cart');
//   // dd(session('cart')->id);
//});
//
