<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ConsultaController;

// Rutas públicas del sitio
Route::get('/', function () { return view('inicio'); });
Route::get('/quienes-somos', function () { return view('quienes-somos'); });
Route::get('/comercializacion', function () { return view('comercializacion'); });
Route::get('/contacto', function () { return view('contacto'); });
Route::get('/terminos', function () { return view('terminos'); });
Route::get('/catalogo', [ProductController::class, 'index']);
Route::get('/catalogo/{id}', [ProductController::class, 'show']);
Route::get('/consultas', [ConsultaController::class, 'index']);
Route::post('/consultas', [ConsultaController::class, 'store']);

// Rutas de autenticación (públicas)
Route::get('/registro', [AuthController::class, 'formularioRegistro']);
Route::post('/registrar', [AuthController::class, 'registrar']);
Route::get('/login', [AuthController::class, 'formularioLogin']);
Route::post('/autenticar', [AuthController::class, 'autenticar']);
Route::post('/logout', [AuthController::class, 'logout']);

// Rutas protegidas - solo admin
Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
     // CRUD productos
    Route::get('/admin/productos', [AdminController::class, 'productos']);
    Route::get('/admin/productos/crear', [AdminController::class, 'crearProducto']);
    Route::post('/admin/productos', [AdminController::class, 'guardarProducto']);
    Route::get('/admin/productos/{id}/editar', [AdminController::class, 'editarProducto']);
    Route::put('/admin/productos/{id}', [AdminController::class, 'actualizarProducto']);
    Route::delete('/admin/productos/{id}', [AdminController::class, 'eliminarProducto']);
    Route::put('/admin/productos/{id}/activar', [AdminController::class, 'activarProducto']);
    Route::get('/admin/consultas', [AdminController::class, 'consultas']);
    Route::put('/admin/consultas/{id}/leer', [AdminController::class, 'marcarLeida']);
});

 //Rutas protegidas - solo cliente
Route::middleware(['auth', 'rol:cliente'])->group(function () {
    Route::get('/cliente', [ClienteController::class, 'index']);
    Route::get('/carrito', [CartController::class, 'index']);
    Route::post('/carrito/agregar/{productId}', [CartController::class, 'agregar']);
    Route::delete('/carrito/eliminar/{id}', [CartController::class, 'eliminar']);
    Route::post('/carrito/vaciar', [CartController::class, 'vaciar']);
});