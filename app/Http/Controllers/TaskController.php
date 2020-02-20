<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;

class TaskController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth')->except('index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        
        $request->validate([

            'name' => 'required',
        ]);


       
 
        $task = new Task;
    

        $task->name  = $request->name;
        $task->user_id  = Auth::id();
        $task->project_id  = $request->projectId;

        $task->save();

        $request->session()->flash('status', 'New Task created!');

         return redirect('projects/'.$request->projectId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $post)
    {  

    
        
        return view('task.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {   

        return view('task.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {    

        $request->validate([

            'name' => 'required',
        ]);


         $task = Task::findOrFail($task->id);

         $task->name  = $request->name;

        $task->save();

        $request->session()->flash('status', 'Task Updated!');

         return redirect('projects/'.$request->projectId);

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Task $task)
    {
        $task->delete();
        $request->session()->flash('status', 'Task deleted');

         return back();


    }
}
