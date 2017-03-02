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
//HabilitarCursos
Route::resource('/habilitarCursos', 'HabilitarCursos');
//matriculas
Route::resource('/matriculas', 'Matriculas');
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
Route::get('/estuMatricu/{nombre}', 'Matriculas@buscarEstudiante');
//reporteslistados
Route::get('/ListaEstudiantesPDF', 'Estudiantes@listadoEstudiantes');
Route::get('/ListaProfesoresPDF', 'Profesors@listadoProfesores');
Route::get('/ListaCursosPDF', 'Cursos@listadoCursos');
Route::get('/ListaBecasPDF', 'Becas@listadoBecas');
Route::get('/seleccionReporte', 'Instrumentos@reportesIntrumentos');


//Asiganar Beca
Route::get('/AsiganarBecas', 'Becas@asignar'); 
Route::post('/AsignarBeca', 'Becas@asignarBeca');
Route::get('/buscaEstu/{nombre}', 'Estudiantes@buscar');

//Asiganar instrumento
Route::get('/buscaInstrumento/{nombre}', 'Instrumentos@buscar');
Route::get('/AsiganarInstrumentos', 'Instrumentos@asignar');
Route::post('/Prestamo', 'Instrumentos@prestamo');

//habilitar ciclo lectivo
Route::get('/buscaCurso/{nombre}', 'HabilitarCursos@buscarCurso');
Route::get('/buscaProfe/{nombre}', 'HabilitarCursos@buscarProfe');

//matricula
Route::POST('/validaRecibo', 'Matriculas@validarRecibo');
Route::GET('/getHorario/{id_curProf}', 'Matriculas@getHorario');