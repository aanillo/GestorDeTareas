<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index() {
        
        $tasks = Task::latest()->get();
        return view('tasksHome', compact('tasks'));

    }


    public function store(Request $request) {
        
        $validate = $request->validate([
            'title'  => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:1000'],
        ], [
            'title.required' => 'El título es obligatorio.',
            'title.max' => 'El título no puede superar los 100 caracteres.',
            'description.max' => 'La descripción no puede superar los 1000 caracteres.'
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = 'pending';
        $task->save();

        return redirect()->route('tasks.home')->with('success', 'Tarea creada correctamente');
    }

    
    public function toggleTask(Task $task) {

        $task->status = $task->status === 'pending' ? 'completed' : 'pending';
        $task->save();


    return redirect()->route('tasks.home')->with('success', 'Estado de la tarea actualizado correctamente');

    }
    
}
