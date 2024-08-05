<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('personas.index');
});

Route::get('/personas', function (){
    $response = Http::get('localhost:8000/api/personas/list');
    $personas = $response->body();
    $personas = json_decode($personas);
    return view('personas.index', compact('personas'));
})->name('personas.index');

Route::get('/personas/create', function (){
    return view('personas.create');
})->name('personas.create');

Route::post('/personas', function (Request $request){
    $response = Http::post('localhost:8000/api/personas/create', 
        [
        'nombre' => $request->input('nombre'),
        'apellidos' => $request->input('apellidos')
        ]
    );
    return redirect()->route('personas.index')->with('info',"Persona agregada correctamente");
})->name('personas.registro');

Route::delete('/personas/{id}', function ($id){
    $response = Http::delete("localhost:8000/api/personas/delete/{$id}");
    return redirect()->route('personas.index')->with('info',"Persona eliminada correctamente");
})->name('personas.delete');

Route::get('/personas/{id}/edit', function ($id){
    $response = Http::get("localhost:8000/api/personas/listOne/{$id}");
    $response = $response->body();
    $response = json_decode($response);
    $persona = $response[0];
    return view('personas.edit', compact('persona'));
})->name('personas.edit');

Route::put('/personas/{id}', function (Request $request, $id){
    $response = Http::put("localhost:8000/api/personas/update/{$id}", 
        [
        'nombre' => $request->input('nombre'),
        'apellidos' => $request->input('apellidos')
        ]
    );
    return redirect()->route('personas.index')->with('info',"Persona actualizada correctamente");
})->name('personas.update');