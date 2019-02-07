<?php

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
    return view('welcome');
});


Route::get('/test_create', function () {
    $entity = new \App\Test();
    $entity->name = md5(time());
    $entity->save();
    return response()->json(['status' => 'created', 'entity' => $entity]);
});

Route::get('/test_update', function (\Illuminate\Http\Request $request) {
    $entity = \App\Test::find($request->input('id', '5c5c1c16b01f3a00683dd1b6'));
    if (!$entity) {
        die("404 not found");
    }
    $entity->name = "Updated " . date("H:i:s");
    $entity->save();
    return response()->json(['status' => 'updated', 'entity' => $entity]);
});

Route::get('/test_get', function (\Illuminate\Http\Request $request) {
    $entity = \App\Test::find($request->input('id', '5c5c1c16b01f3a00683dd1b6'));

    if (!$entity) {
        die("404 not found");
    }
    return response()->json(['status' => 'result', 'entity' => $entity]);
});


Route::get('/test_all', function (\Illuminate\Http\Request $request) {
    $entities = \App\Test::all();

    return response()->json(['status' => 'result', 'entity' => $entities]);
});
