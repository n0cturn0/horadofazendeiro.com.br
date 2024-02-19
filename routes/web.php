<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


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

Route::get('/', function () {
    return view('doc');
});

//Perfil
Route::get('/perfil/', [App\Http\Controllers\PerfilController::class, 'index'])
->name('perfil');
Route::get('/perfil/verify', [App\Http\Controllers\PerfilController::class, 'verify'])
    ->name('perfil-verify');



//Anucio
Route::get('/anuncio/', [App\Http\Controllers\AnuncioController::class, 'index'])
->name('anuncio');
Route::get('/anuncio/store', [App\Http\Controllers\AnuncioController::class, 'store'])
->name('anuncio-novo');
Route::post('/anuncio/salva', [App\Http\Controllers\AnuncioController::class, 'salva'])
->name('anuncio-salva');
Route::get('/anuncio/create', [App\Http\Controllers\AnuncioController::class, 'verify'])
->name('anuncio-create');
Route::post('/anuncio/add/', [App\Http\Controllers\AnuncioController::class, 'create'])
->name('anuncio-add');
Route::get('/anuncio/show/{id}', [App\Http\Controllers\AnuncioController::class, 'show'])
->name('anuncio-show');
Route::get('/anuncio/foto/{id}', [App\Http\Controllers\AnuncioController::class, 'addfoto'])
->name('foto');
Route::post('/anuncio/fotostore/', [App\Http\Controllers\AnuncioController::class, 'fotostore'])
->name('foto-store');
Route::get('/anuncio/meusanuncios/', [App\Http\Controllers\AnuncioController::class, 'meusanuncios'])
->name('meus-anuncios');
Route::get('/anuncio/teste/', [App\Http\Controllers\AnuncioController::class, 'checkanuncio'])
->name('anuncio-teste');
Route::get('/anuncio/principal/', [App\Http\Controllers\AnuncioController::class, 'generatemain'])
->name('anuncio-principal');
//Pacote
Route::get('/pacote/', [App\Http\Controllers\PacoteController::class, 'index'])
->name('pacote');
Route::get('/pacote/add/{id}', [App\Http\Controllers\PacoteController::class, 'create'])
->name('pacote-add');

Route::get('/pacote/show', [App\Http\Controllers\PacoteController::class, 'show'])
->name('pacote-show');

Route::get('/pacote/{id}', [App\Http\Controllers\PacoteController::class, 'pacote'])
->name('pacote');
Route::post('/pacote/pagamento', [App\Http\Controllers\PacoteController::class, 'payment'])
->name('pacote-pagamento');

Route::middleware('auth')->group(function () {
//Template
Route::get('/template', [App\Http\Controllers\TemplateController::class, 'index'])
->name('template');
Route::get('logintemp', [App\Http\Controllers\TemplateController::class, 'logintemp'])
->name('logintemp');
Route::get('formulario', [App\Http\Controllers\TemplateController::class, 'formulario'])
->name('formulario');
Route::get('profiletemp', [App\Http\Controllers\TemplateController::class, 'profiletemp'])
->name('profiletemp');
});


