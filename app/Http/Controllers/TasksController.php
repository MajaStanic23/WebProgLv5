<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Auth;
use App;

class TasksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:nastavnik', ['only' => ['new', 'create', 'list', 'specific', 'approve']]);
    }

    public function new($locale = 'hr')
    {
        App::setLocale($locale);

        return view('tasks.form', ['locale' => $locale]);
    }


    public function create(Request $request)
    {
        
        $task = Task::create($request->all());

        return redirect()->route('home');
    }

    public function list()
    {
        $tasks = Auth::user()->tasks;

        return view('tasks.list', ['tasks' => $tasks]);
    }

    public function specific($id)
    {
        // Dohvatimo task pod tim id
        $task = Task::where('id', $id)->first();

        // Ako takav ne postoji vratimo se nazad
        if(!$task)
            return redirect()->back();

        return view('tasks.specific', ['task' => $task]);
    }

    public function approve(Request $request)
    {
        $task = Task::where('id', $request->input('task_id'))->first();

        $task->student_id = $request->input('id');
        $task->save(); 

        return redirect()->route('task.specific', ['id' => $task->id]);
    }

    // Student part

    public function student()
    {
        $tasks = Task::all();

        $on_tasks = Auth::user()->on_tasks;

        return view('student.list', ['tasks' => $tasks, 'on_tasks' => $on_tasks]);
    }

    public function enroll(Request $request)
    {
        Auth::user()->on_tasks()->attach($request->input('task_id'), ['priority' => $request->input('priority')]);

        return redirect()->route('student.list');
    }

    public function studentPreiew($id)
    {
        // Dohvatimo task pod tim id (usput s drugim uvjetom provjerimo je li taj task od tog nastavnika)
        $task = Task::where('id', $id)->first();

        // Ako takav ne postoji vratimo se nazad
        if(!$task)
            return redirect()->back();

        return view('tasks.specific', ['task' => $task, 'student' => true]);
    }
}
