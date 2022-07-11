<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class NastavnikController extends Controller
{
    public function index(){
        $user = Auth::user();
        $data = Task::all()->where('nastavnik_id','=',$user->id);
        foreach($data as $task){
            if($task->assignee!=null){
                $student = User::find($task->assignee);
                $task->assignee = $student->email;
            }
            else{
                $task->assignee = "/";
            }
        }
        return view('nastavnik', ['data'=>$data]);
    }

    public function saveTask(Request $request){
        $request->validate([
            'naziv_rada' => 'required|max:255',
            'naziv_rada_en' => 'required',
            'zadatak_rada' => 'required'
        ]);

        $task = new Task();
        $task->naziv_rada = $request->input('naziv_rada');
        $task->naziv_rada_en = $request->input('naziv_rada_en');
        $task->zadatak_rada = $request->input('zadatak_rada');
        $task->tip_studija = $request->input('tip_studija');
        $task->nastavnik_id = Auth::user()->id;
        $task->save();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Rad je uspješno dodan');
        return redirect()->route('nastavnik');
    }

    public function showStudents($id){

    }
}
