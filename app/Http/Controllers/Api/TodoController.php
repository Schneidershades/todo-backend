<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
    	return Todo::orderBy('complete')->get();
    }

    public function store(Request $request)
    {
    	$todo = new Todo;
    	$todo->todo = $request->todo;
    	$todo->save();
    }

    public function update(Request $request, $id)
    {
    	$todo = Todo::findOrFail($id);
    	$todo->complete = true;
    	$todo->save();
    }

    public function destroy($id)
    {
    	$todo = Todo::findOrFail($id);
    	$todo->delete();
    }
}
