<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\Projets;
use App\Http\Controllers\Sub;
use App\Http\Controllers\MainController;


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

Route::get('/old', [MainController::class, 'index']);

Route::get('/index', [MainController::class, 'after']);
Route::get('/', [MainController::class, 'after']);

Route::get('/login', [Users::class, 'login']);
Route::post('/loginT', [Users::class, 'loginT']);

Route::get('/register',[Users::class, 'register']);
Route::post('/registerT', [Users::class, 'registerT']);

Route::get('/logout',[Users::class, 'logout']);

Route::get('/publish',[Projets::class, 'publish']);
Route::post('/publishT',[Projets::class, 'publishT']);

Route::get('createur/{i}',[Projets::class,'afficherCreations']);

Route::get('checkqrcode/{token}',[Users::class,'checkqrcode']);
Route::get('genqrcode',[Users::class,"genqrcode"]);
Route::get('afficherqrcode',[Users::class,"afficherqrcode"]);
Route::get('dlbillet',[Users::class,"pdfqrcode"]);
Route::get('billet',[Users::class,"afficherpdfqrcode"]);

Route::get('mauvaisuser',[MainController::class,'mauvaisuser']);

Route::get('modifyacc',[Users::class,'modifyacc']);
Route::post('modifyaccT',[Users::class,'modifyaccT']);

Route::get('/mentions', [MainController::class, 'mentions']);

Route::get('/recap', [MainController::class, 'recap']);