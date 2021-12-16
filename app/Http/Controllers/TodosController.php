<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(){
        $todolist = Todos::all();
        return view('home',compact('todolist'))
    }

    public function create(Request $input){
        $data = $input -> validate([
            'content' => 'required'
        ]);
        Todos::create($data);
        return back();
    }

    public function destroy(Request $todo){
      $todo -> delete();
      return back();
    }
}