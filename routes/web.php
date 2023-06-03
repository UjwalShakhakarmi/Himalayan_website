<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/About', [HomeController::class, 'About'])->name('About');
Route::get('/ContactUs', [HomeController::class, 'ContactUs'])->name('ContactUs');
Route::get('/Products', [HomeController::class, 'Products'])->name('Products');
Route::get('/loginPage', [HomeController::class, 'loginPage'])->name('loginPage');
Route::get('/signUp', [HomeController::class, 'signUp'])->name('signUp');
Route::get('/admindashboard',[HomeController::class, 'AdminPage'])->name('Admin_Dashboard');
Route::get('/Adult_Table',[HomeController::class, 'Adult_Table'])->name('Adult_Table');
Route::get('/Child_Table',[HomeController::class, 'Child_Table'])->name('Child_Table');
Route::get('/Admin-Form',[HomeController::class, 'AdminTable_Form'])->name('AdminTable_Form');
Route::get('/product_detail/{id}',[HomeController::class, 'product_detail'])->name('product_detail');


Route::post('/signUp',[ClientController::class, 'RegisterClient'])->name('SignUpClient');
Route::post('/loginPage',[ClientController::class, 'login'])->name('login');
Route::get('/logout',[ClientController::class, 'logout'])->name('logout');

Route::post('/AddProduct',[ProductController::class, 'addProduct'])->name('AddProduct');
Route::get('/delete/{id}',[ProductController::class, 'DeleteProduct']);
Route::get('/edit/{id}',[ProductController::class, 'editProduct']);
Route::post('/EditProduct',[ProductController::class, 'ProductUpdate'])->name('Edit_Product');


