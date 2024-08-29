<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgotPasswordController;
// sent email
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
// Admin
use App\Http\Controllers\admin\ProductAdminController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\UserAdminController;
// Middleware
use App\Http\Middleware\CheckAdmin;

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/product',[ProductController::class, 'products'])->name('products');
Route::get('/search',[ProductController::class, 'search'])->name('product.search');
Route::get('/product/{category_id}',[ProductController::class, 'products'])->name('productsByCategory');
Route::get('/productdetail/{id}',[ProductController::class, 'detail'])->name('productdetail');
Route::get('/cart',[CartController::class, 'cart'])->name('cart');
Route::post('/product/addCart',[CartController::class, 'addCart'])->name('addCart');
Route::get('/del/cart/{id}',[CartController::class, 'delCart'])->name('delCart');
Route::post('/updateCart',[CartController::class, 'updateCart'])->name('updateCart');
Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('showCheckout');
Route::post('/checkout',[CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/allcheckout',[CheckoutController::class, 'allCheckout'])->name('allCheckout');
Route::get('/confirmOrder/{token}',[CheckoutController::class, 'confirmOrder'])->name('confirm.order');
Route::get('/loginForm',[LoginController::class, 'loginForm'])->name('loginForm');
Route::post('/login',[LoginController::class, 'login'])->name('login');
Route::post('/comment/{product_id}',[CommentController::class, 'comment'])->name('comment');
Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/myaccount', [UserController::class, 'updateUser'])->name('updateUser');
Route::get('/myaccount', [MyAccountController::class, 'myAccount'])->name('myaccount');
Route::get('/history/detail/{id}', [MyAccountController::class, 'historyDetail'])->name('historyDetail');
// forgot password
Route::get('/forget-password', [ForgotPasswordController::class, 'forgetPasswordForm'])->name('forget.password.form');
Route::post('/forget-password', [ForgotPasswordController::class, 'forgetPassword'])->name('forget.password');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetPasswordForm'])->name('reset.password.form');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password');
// Admin
Route::middleware([CheckAdmin::class])->group(function(){
Route::get('/admin',[AdminController::class, 'index'])->name('admin');
// Product
Route::get('/productlist',[ProductAdminController::class, 'productlist'])->name('productlist');
Route::post('/product/add',[ProductAdminController::class, 'addProduct'])->name('product.add');
Route::get('/product/del/{id}',[ProductAdminController::class, 'delProduct'])->name('product.del');
Route::get('/product/update/{id}',[ProductAdminController::class, 'updateProductForm'])->name('product.updateForm');
Route::post('/product/update/{id}',[ProductAdminController::class, 'updateProduct'])->name('product.update');

// Categories
Route::get('/categories',[CategoriesController::class, 'categories'])->name('categories');
Route::post('/categories/add', [CategoriesController::class, 'addCategory'])->name('categories.add');
Route::get('/categories/del/{id}', [CategoriesController::class, 'delCategory'])->name('categories.del');
Route::get('/categories/edit/{id}', [CategoriesController::class, 'showEditForm'])->name('categories.edit');
Route::post('/categories/edit/{id}', [CategoriesController::class, 'editCategory'])->name('categories.update');

// Order
Route::get('/order',[OrderController::class, 'order'])->name('order');
Route::get('/order/detail/{id}',[OrderController::class, 'orderDetail'])->name('orderDetail');
Route::get('/add/order',[OrderController::class, 'addOrderForm'])->name('addOrderForm');
Route::post('/add/order',[OrderController::class, 'addOrder'])->name('addOrder');
Route::get('/order/del/{id}',[OrderController::class, 'orderDelete'])->name('order.del');
Route::post('/updateStatus/{id}',[OrderController::class, 'updateStatus'])->name('updateStatus');
// User
Route::get('/users',[UserAdminController::class, 'users'])->name('users');
Route::post('/users',[UserAdminController::class, 'addUser'])->name('add.user');
Route::get('/user/del/{id}',[UserAdminController::class, 'delUser'])->name('del.user');
Route::get('/user/update/{id}',[UserAdminController::class, 'updateUserForm'])->name('update.user');
Route::post('/user/update/{id}',[UserAdminController::class, 'updateUser'])->name('update.user');
});

// Thanh toán bằng tài khoản ngân hàng 
Route::post('/thanhtoan_vnpay',[CheckoutController::class, 'thanhtoan_vnpay'])->name('thanhtoan_vnpay');
Route::get('/thanhtoan_vnpay_success',[CheckoutController::class, 'thanhtoan_vnpay_success'])->name('thanhtoan_vnpay_success');
