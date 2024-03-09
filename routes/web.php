
<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HelloController;
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
Route::get('/',[HelloController::class, 'index']);

Route::get('/about',[HelloController::class, 'showAbout']);

Route::get('/contact',[HelloController::class, 'showContact']);


Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Normal Users Routes List
Route::middleware(['auth' , 'user-access:user'])->group(function () {
    Route::get('/home' , [HomeController::class, 'index'])->name('home');
});

//Admin routes list
Route::middleware(['auth' , 'user-access:admin'])->group(function () {
    Route::get('/admin/home' , [HomeController::class, 'adminHome'])->name('adminHome');
});

//Admin routes list
Route::middleware(['auth' , 'user-access:manager'])->group(function () {
    Route::get('/manager/home' , [HomeController::class, 'managerHome'])->name('managerHome');
});