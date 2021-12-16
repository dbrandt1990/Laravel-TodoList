<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// Route::get('/', [TodosController::class, 'index'])->name('index');
// Route::post('/', [TodosController::class, 'store'])->name('store');
// Route::delete('/todo:id', [TodosController::class, 'destroy'])->name('destroy');

Route::get('/', function () {
    $todolist = Todo::orderBy('created_at', 'asc')->get();

    return view('home', [
        'todolist' => $todolist
    ]);
});

Route::post('/todo', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'content' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $todo = new Todo;
    $todo->content = $request->content;
    $todo->save();

    return redirect('/');
});

Route::delete('/todo/{todo}', function (Todo $todo) {
    $todo->delete();
    return redirect('/');
});