<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    //


    public function index(){
        //return all tasks
       //$tasks = Task::all();
       $tasks = DB::table('tasks')->get();
       $completedTasks = DB::table('tasks')->where('status','complete')->get()->count();
       $inProgressTasks = DB::table('tasks')->where('status','In progress')->get()->count();
       $totalTasks = $tasks->count();
        return view('index',['tasks'=>$tasks, 'totalTasks'=>$totalTasks,
                             'completedTasks'=>$completedTasks, 'inProgressTasks'=>$inProgressTasks]);
      

    }

    public function createTaskForm(){
        return view('createTaskForm');
    }


    public function createNewTask(Request $request){

         $title = $request->input('title');
         $description = $request->input('description');
         $status = $request->input('status');
         $progress =  $request->input('progress');

         DB::table('tasks')->insert([
            'title'=>$title, 'description'=>$description, 'status'=>$status, 'progress'=>$progress
         ]);

         return \redirect('/');

        
    }

    public function editTaskForm(Request $request, $id){

        $task = DB::table('tasks')->where('id',$id)->get();
        return view('editTaskForm',['task'=>$task]);

    }


    public function editTask(Request $request){

        $id = $request->input('id');
        $title = $request->input('title');
        $description = $request->input('description');
        $status = $request->input('status');
        $progress =  $request->input('progress');

        DB::table('tasks')->where('id',$id)->update([
           'title'=>$title, 'description'=>$description, 'status'=>$status, 'progress'=>$progress
        ]);

        return \redirect('/');


    }


    public function editAllTasks(){

        $tasks = DB::table('tasks')->get();
        return view('editAllTasks',['tasks'=>$tasks]);

    }


    public function deleteTask(Request $request, $id){

        DB::table('tasks')->where('id',$id)->delete();
        return \redirect('/');
    }


    public function inprogressTasks(){

        $tasks = DB::table('tasks')->where('status','In progress')->get();
        return \view('specificTasks',['tasks'=>$tasks]);

    }

    public function completedTasks(){
        $tasks = DB::table('tasks')->where('status','complete')->get();
        return \view('specificTasks',['tasks'=>$tasks]);

    }

}
