<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index()
    {
        $currentTasks = Task::where('archive', false)->orderBy('due_date', 'ASC')->get();

        $categories = Categories::all();

        $now = Carbon::now()->format('Y-m-d H:i');

        return view('tasks.index', compact('currentTasks', 'categories', 'now'));
    }

    public function archived()
    {
        $archivedTasks = Task::where('archive', true)->get();

        $categories = Categories::all();

        return view('tasks.archived', compact('archivedTasks', 'categories'));
    }

    public function render()
    {
        $minDate = Carbon::today()->format('Y-m-d');

        $minTime = Carbon::now()->format('H:i');

        $categories = Categories::all();

        $task = null;

        return view('tasks.create', compact('minDate', 'minTime', 'categories', 'task'));
    }

    public function create(Request $request)
    {
        $task = (new Task());

        $task->title = $request->title;

        $task->description = $request->description;

        $task->category_id = $request->category;

        $task->due_date = $request->datefield;

        $task->save();

        return redirect()->route('current-tasks');
    }

    public function edit($taskId)
    {
        $task = Task::where('id', $taskId)->first();

        $minDate = Carbon::today()->format('Y-m-d');

        $minTime = Carbon::now()->format('H:i');

        $categories = Categories::all();

        return view('tasks.create', compact('task', 'minDate', 'minTime', 'categories'));
    }

    public function editSave($taskId)
    {
        $task = Task::where('id', $taskId)->first();

        $task->title = request()->title;

        $task->description = request()->description;

        $task->category_id = request()->category;

        $task->due_date = request()->datefield;

        $task->save();

        return redirect()->route('current-tasks');
    }

    public function updateCategory(Request $request, $taskId)
    {
        $task = Task::where('id', $taskId)->first();

        $task->category_id = $request->category;

        $task->save();

        return response('Update Successfull', '200');
    }

    public function archive($taskId)
    {
        $task = Task::where('id', $taskId)->first();

        if($task->archive == true) {
            $task->archive = false;
            $return = 'current-tasks';
        } else {
            $task->archive = true;
            $return = 'archived-tasks';
        }

        $task->save();

        return redirect()->route($return);
    }
}
