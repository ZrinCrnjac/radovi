<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\User;

class StudentController extends Controller
{
    public function showTasks(){
        $user = Auth::user();
        $tasks = Task::all()->where('assignee',"=",null);
        foreach($tasks as $task){
            $nastavnik = User::find($task->nastavnik_id);
            $task->nastavnik = $nastavnik->email;
            if($task->students->contains($user->id))
                $task->disabled = true;
            else
                $task->disabled= false;
        }
        return view('home', ['data'=>$tasks]);
    }
}
