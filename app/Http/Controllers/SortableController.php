<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class SortableController extends Controller
{
  

     public function sort(Request $request)
    {    

     $tasks = $request->all();

     foreach ($tasks["idArrays"] as $key=>$value ) {

     	 $task = Task::findorfail($value);

         $task->priority =  $key;

         $task->save();

     }


          return ('Task priority updated');


    }



}
