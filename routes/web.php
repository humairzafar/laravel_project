<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\MyResourceController;
use App\Http\Controllers\RegisteController;
use App\Http\Controllers\ContactController;

use App\Models\Customertable;
Use App\Http\Controllers\Customers;

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

// Route::get('/{name?}', function ($name = null) {
//     $demo = "<h2>testing services</h2>";
//     $data = compact('name', 'demo');
//     return view('home')->with($data);
// });

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/', [DemoController::class, 'index']);
// Route::get('/about', [DemoController::class, 'about']);
// Route::get('/about', SingleActionController::class);
// Route::resource('/MyResource', MyResourceController::class);
Route::get('/', function()
{
    return view('index');
});
Route::get('/upload', function()
{
    return view('upload');
});
Route::post('/hello', [ContactController::class, 'hello']);
Route::get('/humair', [Customers::class, 'index']); 
Route::post('/humair', [Customers::class, 'store']);
Route::Group(['prefix' => '/maidy'],function()
{
Route::get('view', [Customers::class, 'view']);
Route::get('/rash', [Customers::class, 'trash']);
Route::get('delete/{id}', [Customers::class, 'delete']);
Route::get('forceDetele/{id}', [Customers::class, 'forceDelete']);
Route::get('edit/{id}', [Customers::class, 'edit'])->name('humair.edit');
Route::get('restore/{id}', [Customers::class, 'restore'])->name('humair.restore');
Route::post('update/{id}', [Customers::class, 'update'])->name('humair.update');
});
Route::get('get-all-session',function()
{
    $session= session()->all();
    p($session);

});
Route::get('set-session',function(Request $request)
{
    $request->session()->put('user_name','humair');
    $request->session()->put('email','umairadd@gmail.com');
    return redirect('get-all-session');


});

Route::get('destroy-session',function()
{
    session()->forget('user_name');
    session()->forget('email');
    return redirect('get-all-session');
});

// Route::get('/customer', function () {
//     $customers = Customertable::all();
//     echo "<pre>";
//     print_r($customers->toArray());
// });
