<?php

use Illuminate\Http\Request;
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

// Get all tasks
// Route::get('/tasks', function (Request $request) {
    // return '<h1>tasks</h1>';
    // return [
    //     'method' => $request->method(),
    //     'url' => $request->url(),
    //     'fullUrl' => $request->fullUrl(),
    //     'path' => $request->path(),
    //     'is' => $request->is(),
    //     'isMethod' => $request->isMethod('get'),
    //     'isRoute' => $request->route(),
    //     'input' => $request->input(),
    //     'all' => $request->all(),
    //     'only' => $request->only(['name', 'email']),
    //     'except' => $request->except(['name', 'email']),
    //     'query' => $request->query(),
    //     // 'userAgent' => $request->userAgent(),
    //     // 'ip' => $request->ip(),
    //     // 'header' => $request->header(),
    // ];

//     return response()->json([
//         'message' => 'Hello, World!',
//     ])->setStatusCode(201);
// })->name('tasks');

// Get a single task
// Route::get('/tasks/{id}', function ($id) {
//     return '<h1>tasks get ' . $id . '</h1>';
// })->where('id', '[0-9]+');

// // Create a new task
// Route::post('/tasks', function () {
//     return '<h1>tasks post</h1>';
// });

// // Update a task
// Route::put('/tasks/{id}', function ($id) {
//     return '<h1>tasks put</h1>';
// });

// // Delete a task
// Route::delete('/tasks/{id}', function ($id) {
//     return '<h1>tasks delete</h1>';
// });

// // test route
// Route::get('/test', function () {
//     $url = route('tasks');
//     return '<h1>test</h1><a href="' . $url . '">tasks</a>';
// });

// // get user
// Route::get('/user', function () {
//     return [
//         [
//             'id' => 1,
//             'name' => 'John Doe',
//             'email' => 'john@doe.com',
//             'age' => 20,
//         ],
//         [
//             'id' => 2,
//             'name' => 'Jane Doe',
//             'email' => 'jane@doe.com',
//             'age' => 21,
//         ],
//     ];
// });
