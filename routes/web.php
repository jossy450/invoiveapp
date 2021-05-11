<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Client;
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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function (){
    Route::resource('profile', 'Admin\ProfileController');
    Route::resource('clients', 'Admin\ClientController');
    Route::resource('payments', 'Admin\PaymentController');
    Route::resource('products', 'Admin\ProductController');
    Route::get('invoice/{id}/generate-pdf','Admin\InvoiceController@generatePDF')->name('invoices.generate-pdf');
    Route::get('/invoice/preview/{profile}', 'Admin\ProfileController@previewInvoice')->name('profile.preview');

    Route::resource('/invoices', 'Admin\InvoiceController');
    Route::get('/invoice/mobile/preview/{id}', 'Admin\InvoiceController@mobilePreview')->name('invoice.preview');

});
//Route::get('/admin/invoice/mobile/preview/{id}', 'Admin\InvoiceController@mobilePreview');

