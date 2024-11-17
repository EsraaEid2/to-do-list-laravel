<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TasksController extends Controller
{
    public function index()
    {
        // Retrieve all of the tasks when we visit the home page
        $tasks = Task::orderBy('completed_at')
            ->orderBy('id', 'DESC')
            ->get();
    
        // Pass the data to our index view
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }
    

    public function create (){
        return view('tasks.create');
    }

    public function store(){
        request()->validate([
            'description' => 'required|max:255',
        ]);
    
        Task::create([
            'description' => request('description')
        ]);
    
        return redirect('/');
    }
    




// Return to the homepage when a task is created

// Replace home page 
// Handle the tasks submission data
// Create a task
// Display a list of tasks
// Mark a task as completed

public function update($id){
    $task = Task::where('id',$id)->first();

    $task->completed_at = now();
    $task->save();
    return redirect('/');
}
// Divide the tasks into completed and uncompleted section


// Delete a task
public function delete($id)
{
   
    $task = Task::where('id', $id)->first();
    
    // Check if task exists before attempting to delete
    if ($task) {
        $task->delete();
    }

    // Redirect to the home page after deletion
    return redirect('/');
}


}