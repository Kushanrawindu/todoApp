<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $task = new Task;
        $this->validate($request,[
            'task'=>'required|max:100|min:5',
        ]);

        $task->task = $request->task;
        $task->save();

        $data = Task::all();
        return view('tasks.tasks')->with('tasks' ,$data);
    }

    public function markascompleted($id)
    {
        $task = Task::find($id);
        $task->iscompleted=1;
        $task->save();

        return redirect()->back();
    }

    public function markasnotcompleted($id)
    {
        
        $task = Task::find($id);
        $task->iscompleted=0;
        $task->save();

        return redirect()->back();
    }

    public function deletetask($id)
    {

        $task = Task::find($id);
        
        $task->delete();

        return redirect()->back();
    }
}
