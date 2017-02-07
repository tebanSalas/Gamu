<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/personSeleccion', function () {
    return view('profesores/seleccion');
});

Route::get('/estudSeleccion', function () {
    return view('estudiantes/seleccion');
});
Route::get('/acercade', function () {
    return view('layouts/acerca');
});


//usuarios 
Route::resource('/usuarios', 'users');
//becas 
Route::resource('/becas', 'Becas');
//instrumentos 
Route::resource('/instrumentos', 'Instrumentos');
//ciclos
Route::resource('/ciclos', 'Ciclos');
//Cursos
Route::resource('/cursos', 'Cursos');
//Estudiantes
Route::resource('/estudiantes', 'Estudiantes');
//Profesores
Route::resource('/profesores', 'Profesors');

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('/pdf', function(){
	$pdf = \PDF::loadView('vista');
    return $pdf->stream('archivo.pdf');
});

//buscar 
Route::get('/buscarEstud', 'Estudiantes@buscarNombre');
Route::get('/buscarProf', 'Profesors@buscarNombre');
Route::get('/buscarCurso', 'Cursos@buscarNombre');
Route::get('/buscarBeca', 'Becas@buscarNombre');
Route::get('/buscarInstrumento', 'Instrumentos@buscarNombre');
//reporteslistados
Route::get('/ListaEstudiantesPDF', 'Estudiantes@listadoEstudiantes');
Route::get('/ListaProfesoresPDF', 'Profesors@listadoProfesores');
Route::get('/ListaCursosPDF', 'Cursos@listadoCursos');
Route::get('/ListaBecasPDF', 'Becas@listadoBecas');
//Asiganaciones
Route::get('/AsiganarBecas', 'Becas@asignar');
Route::get('/AsiganarInstrumentos', 'Instrumentos@asignar');
