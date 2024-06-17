<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Auth\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('resto', function () {
//     return view('resto');
// });



// Route::get('/', [ProductController::class, 'index']);  

Route::get('', [ProductController::class, 'home'])->name('home');
Route::get('course_payment', [ProductController::class, 'course_payment'])->name('course_payment');
Route::get('courses/{id}', [ProductController::class, 'courses'])->name('courses');
Route::get('course_detail/{id}', [ProductController::class, 'course_detail'])->name('course_detail');

// Route::get('detail_kategori/{id}', [ProductController::class, 'detail_kategori'])->name('detail_kategori');
// Route::get('kolaborasi', [ProductController::class, 'kolaborasi'])->name('kolaborasi');
// Route::get('kategori', [ProductController::class, 'kategori'])->name('kategori');Route::get('detail_item/{id}', [ProductController::class, 'detail_item'])->name('detail_item');
Route::get('add_cart', [ProductController::class, 'add_cart'])->name('add_cart');
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('checkout', [ProductController::class, 'checkout'])->name('checkout');
Route::post('save_trans', [ProductController::class, 'saveTrans'])->name('save_trans');
Route::post('save_proposal', [ProductController::class, 'saveProposal'])->name('save_proposal');
Route::get('berhasil', [ProductController::class, 'berhasil'])->name('berhasil');
Route::post('del_bill', [ProductController::class, 'delBill'])->name('del_bill');
Route::post('edit_bill', [ProductController::class, 'editBill'])->name('edit_bill');
Route::get('about', [ProductController::class, 'about'])->name('about');
Route::get('get_tot_bill', [ProductController::class, 'get_tot_bill'])->name('get_tot_bill');

// Route::get('generate_pdf', [ProductController::class, 'generate_pdf'])->name('generate_pdf');
Route::post('generate_pdf', [ProductController::class, 'generate_pdf'])->name('generate_pdf');

Route::get('generate_pdf_new', 'PDFController@generate')->name('generate.pdf');

Route::get('download', [PDFController::class, 'download'])->name('download');
Route::get('cek', [PDFController::class, 'cek'])->name('cek');

// =======


Route::get('/pdf_new', 'App\Http\Controllers\ProductController@pdf_new');



Route::get('/generate-pdf', 'App\Http\Controllers\ProductController@generate_pdf');
Route::get('/generate-table', 'App\Http\Controllers\ProductController@generatePDFWithTable');
Route::get('/viewpdf', 'App\Http\Controllers\ProductController@viewPdf');
Route::get('/cart_test', 'App\Http\Controllers\ProductController@cart_test');
Route::get('/cetak_pdf', 'App\Http\Controllers\ProductController@cetak_pdf');


Route::get('forest', [ProductController::class, 'forest'])->name('forest');
Route::get('cafe', [ProductController::class, 'cafe'])->name('cafe');
Route::get('shortlink', [ProductController::class, 'shortlink'])->name('shortlink');
Route::get('list_menu', [ProductController::class, 'list_menu'])->name('list_menu');
Route::get('detail_blog/{id}', [ProductController::class, 'detail_blog'])->name('detail_blog');

// Route::get('admin', [AdminController::class, 'index']);

// Route::get('menu_resto', [ProductController::class, 'menu_resto'])->name('menu_resto');

Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');




// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


// Route::get('/admin', function () {
//     // return redirect()->route('login');
//     // return redirect('/login');
// //     return view('welcome');

// });

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'App\Http\Controllers\PegawaiController@index');
// Route::get('/admin/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::post('/admin/logout', [LoginController::class, 'logout'])->middleware('auth');


    // Route::get('/pegawai/adminlte', 'App\Http\Controllers\PegawaiController@adminlte');


    //item
    Route::get('/admin', 'App\Http\Controllers\PegawaiController@index');
    Route::get('/admin/tambah', 'App\Http\Controllers\PegawaiController@tambah');
    Route::post('/admin/store', 'App\Http\Controllers\PegawaiController@store');
    Route::put('/admin/update/{id}', 'App\Http\Controllers\PegawaiController@update');
    Route::get('/admin/list_item', 'App\Http\Controllers\PegawaiController@list_item');
    Route::get('/admin/edit/{id}', 'App\Http\Controllers\PegawaiController@edit');
    Route::get('/admin/hapus/{id}', 'App\Http\Controllers\PegawaiController@delete');


    //kategori
    // Route::get('/admin', 'App\Http\Controllers\KategoriController@index');
    Route::get('/admin/kat/tambah', 'App\Http\Controllers\KategoriController@tambah');
    Route::post('/admin/kat/store', 'App\Http\Controllers\KategoriController@store');
    Route::put('/admin/kat/update/{id}', 'App\Http\Controllers\KategoriController@update');
    Route::get('/admin/kat/list_kategori', 'App\Http\Controllers\KategoriController@list_kategori');
    Route::get('/admin/kat/edit/{id}', 'App\Http\Controllers\KategoriController@edit');
    Route::get('/admin/kat/hapus/{id}', 'App\Http\Controllers\KategoriController@delete');


    // proposal
    Route::post('/admin/proposal/store', 'App\Http\Controllers\ProposalController@store');
    Route::get('/admin/proposal/pdf/{id}', 'App\Http\Controllers\ProposalController@pdf');

    Route::post('/admin/proposal/edit/', 'App\Http\Controllers\ProposalController@edit');
    Route::post('/admin/proposal/hapus/', 'App\Http\Controllers\ProposalController@hapus');

    Route::put('/admin/proposal/update/{id}', 'App\Http\Controllers\ProposalController@update');
    

    Route::get('/admin/proposal/pdf/{id}', 'App\Http\Controllers\ProposalController@pdf');
    Route::get('/admin/proposal/pdfnew', 'App\Http\Controllers\ProposalController@pdfnew');
    
    Route::get('/admin/proposal/test_pdf', 'App\Http\Controllers\ProposalController@test_pdf');
    Route::get('/admin/proposal/file', 'App\Http\Controllers\ProposalController@file');

    Route::get('admin/pdfile/{id}', 'App\Http\Controllers\ProposalController@pdfile')->name('pdfile');


    Route::get('/admin/list_proposal', 'App\Http\Controllers\ProposalController@list_proposal');
    
Route::prefix('admin')->group(function () {



    
    // // Dashboard route
    // Route::get('/', 'AdminController@index')->name('admin.dashboard');

    // // Login routes
    // Route::get('/login', 'App\Http\Controllers\AdminLoginController@showLoginForm')->name('admin.login');
    // Route::post('/login', 'App\Http\Controllers\AdminLoginController@login')->name('admin.login.submit');

    // // Logout route
    // Route::post('/logout', 'App\Http\Controllers\AdminLoginController@logout')->name('admin.logout');

    // // Register routes
    // Route::get('/register', 'App\Http\Controllers\AdminRegisterController@showRegistrationForm')->name('admin.register');
    // Route::post('/register', 'App\Http\Controllers\AdminRegisterController@register')->name('admin.register.submit');

    // // Password reset routes
    // Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    // Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    // Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    // Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');



});
