<?php

use App\Models\Category;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

/**
 * Show Task Dashboard
 */
Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});

Route::get('/categories', function () {
    $categories = Category::orderBy('created_at', 'asc')->get();

    return view('categories', [
        'categories' => $categories
    ]);
});

/**
 * Add New Task
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

/**
 * Add New Category
 */
Route::post('/category', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $category = new Category;
    $category->name = $request->name;
    $category->save();

    return redirect('/categories');
});

/**
 * Delete Task
 */
Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/');
});

/**
 * Delete Category
 */
Route::delete('/category/{id}', function ($id) {
    Category::findOrFail($id)->delete();

    return redirect('/categories');
});
