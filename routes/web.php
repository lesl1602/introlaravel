<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas get y post
Route::get('/saludo', function () {
    return "¡Hola Mundo desde una ruta básica!";
})->name('saludo.basico');

Route::get('/formulario', function () {
    return '<form action="/contacto" method="POST">' . csrf_field() . '<button type="submit">Enviar Petición POST</button></form>';
})->name('formulario.mostrar');

Route::post('/contacto', function () {
    return "Petición POST recibida correctamente.";
})->name('contacto.enviar');

// PUT, PATCH Y DELETE

// Ruta para actualizar un recurso
Route::put('/recurso/actualizar', function () {
    return "Recurso actualizado con PUT.";
})->name('recurso.actualizar');

// Ruta para eliminar un recurso
Route::delete('/recurso/eliminar', function () {
    return "Recurso eliminado con DELETE.";
})->name('recurso.eliminar');

//RUTAS CON PARAMETROS 

// Parámetro obligatorio
Route::get('/usuario/{id}', function ($id) {
    return "Mostrando el perfil del usuario: {$id}";
})->name('usuario.perfil');

// Parámetro opcional
Route::get('/post/{slug?}', function ($slug = 'valor-por-defecto') {
    return "Mostrando el post: {$slug}";
})->name('post.mostrar');

//Parámetros expresiones regulares
Route::get('/categoria/{nombre}', function ($nombre) {
    return "Viendo artículos de la categoría: {$nombre}";
})->where('nombre', '[A-Za-z]+')->name('categoria.articulos');

Route::get('/producto/{id}', function ($id) {
    return "Detalles del producto con ID: {$id}";
})->where('id', '[0-9]+')->name('producto.detalles');