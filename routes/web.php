<?php

use App\Http\Controllers\ControllerAdmin;
use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\ConfiguracaoController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\SumarioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projetos/{projeto}', [ProjetoController::class, 'show'])->name('projetos.show');
Route::get('/blog', [ArtigoController::class, 'index'])->name('blog.index');
Route::get('/blog/{artigo:slug}', [ArtigoController::class, 'show'])->name('blog.show');

Route::get('/login', [ControllerAdmin::class, 'login_admin'])->name('login');
Route::post('adm/login', [UserController::class, 'login'])->name('login.post');
Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::get('/midia/fotos/{foto}', [MediaController::class, 'foto'])->name('media.fotos.show');
Route::get('/midia/fotos/{foto}/download', [MediaController::class, 'downloadFoto'])->name('media.fotos.download');
Route::get('/midia/artigos/{artigo}/capa', [MediaController::class, 'artigoCapa'])->name('media.artigos.cover');
Route::get('/midia/projetos/{projeto}/capa', [MediaController::class, 'projetoCapa'])->name('media.projetos.cover');

Route::middleware('auth')->prefix('administrativo')->group(function () {
    Route::get('/', [ControllerAdmin::class, 'index'])->name('admin.index');
    Route::put('/configuracoes', [ConfiguracaoController::class, 'update'])->name('admin.configuracoes.update');
    Route::post('/projetos', [ProjetoController::class, 'store'])->name('admin.projetos.store');
    Route::put('/projetos/{projeto}', [ProjetoController::class, 'update'])->name('admin.projetos.update');
    Route::delete('/projetos/{projeto}', [ProjetoController::class, 'destroy'])->name('admin.projetos.destroy');
    Route::post('/fotos', [FotoController::class, 'store'])->name('admin.fotos.store');
    Route::put('/fotos/{foto}', [FotoController::class, 'update'])->name('admin.fotos.update');
    Route::delete('/fotos/{foto}', [FotoController::class, 'destroy'])->name('admin.fotos.destroy');
    Route::post('/artigos', [ArtigoController::class, 'store'])->name('admin.artigos.store');
    Route::put('/artigos/{artigo}', [ArtigoController::class, 'update'])->name('admin.artigos.update');
    Route::delete('/artigos/{artigo}', [ArtigoController::class, 'destroy'])->name('admin.artigos.destroy');
    Route::post('/sumarios', [SumarioController::class, 'store'])->name('admin.sumarios.store');
    Route::put('/sumarios/{sumario}', [SumarioController::class, 'update'])->name('admin.sumarios.update');
    Route::delete('/sumarios/{sumario}', [SumarioController::class, 'destroy'])->name('admin.sumarios.destroy');
    Route::post('/usuarios', [UserController::class, 'store'])->name('admin.usuarios.store');
    Route::put('/usuarios/{usuario}', [UserController::class, 'update'])->name('admin.usuarios.update');
    Route::delete('/usuarios/{usuario}', [UserController::class, 'destroy'])->name('admin.usuarios.destroy');
});
