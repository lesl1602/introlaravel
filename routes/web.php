<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// RUSTAS GET Y POST

//Ruta GET
Route::get('/saludo', function () {
    return "¡Hola Mundo desde una ruta básica!";
})->name('saludo.basico');

//Ruta POST
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

//RUTAS DE REDIRECCIÓN Y VISTAS

// Redirige de '/antigua-ruta' a '/nueva-ruta' con un código de estado 301 (permanente)
Route::redirect('/antigua-ruta', '/saludo', 301)->name('redireccion.permanente');
Route::view('/informacion', 'pagina_info', ['nombre' => 'Invitado'])->name('pagina.informacion');

//RUTAS DE TIPO RECURSO

//Llamamos controlador
use App\Http\Controllers\PhotoController;
Route::resource('photos', PhotoController::class);
