<?php

namespace App\Http\Controllers;


use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class TaskController extends Controller
{

    /*public function home()
    {
    return View::make('home');
    }*/
    public function home()
    {

        $tasks = Task::all();
        //return View::make('home', compact('tasks'));
        //dd($tasks);
        return view('home')->with('tasks', $tasks);
        //return View::make('home')->with(array('tasks'=>$tasks));
    }

    public function create()
    {
        return view('create');
    }
    /*public function edit()
    {
    return View('edit');
    }
    public function delete()
    {
    return View('delete');
    }*/


    public function saveCreate(Request $request)
    {

         //dd($request->files);

        //Input::file('name')->getRealPath();
        //Input::file('name')->getClientOriginalName();
        
    	$uploadedsermonFile = $request->file('sermon');
        $uploadedFile = $request->file('image');
        $uploadedsermonFile->move(public_path().'/sermons/', $uploadedFile->getClientOriginalName());
        $uploadedFile->move(public_path().'/uploads/', $uploadedFile->getClientOriginalName());
        $input = Input::all();
        $task = new Task;
        $task->title = $input['title'];
        $task->body = $input['body'];
        $task->user_id = 1;
        $task->done = 0;
        $task->image = $uploadedFile->getClientOriginalName();
        $task->sermon = $uploadedsermonFile->getClientOriginalName();
        $task->save();

        return Redirect::action('TaskController@home');

    }

    public function edit(Request $request, $id)
    {
        //return View::make('edit', compact('task'));
        $task = Task::findOrFail($id);
        return view('edit')->with('task', $task);
    }

    /**
     * @return mixed
     */
    public function doEdit()
    {
        //dd($request);
        $task = Task::findOrFail(Input::get('id'));
        $task->title = Input::get('title');
        $task->body = Input::get('body');
        $task->image = Input::get('image');
        $task->sermon = Input::get('sermon');
        $task->done = Input::get('done');
        $task->save();
        return Redirect::action('TaskController@home');
    }


    public function delete(Task $task)
    {
        //return View::make('delete', compact('task'));
        //$task = Task::findOrFail($id);
        return View('delete')->with('task', $task);
    }
    public function doDelete()
    {
       $task = Task::findOrFail(Input::get('id'));
       //$task = Task::findOrFail($id);
       /* $task = Task::findOrFail(Input::get($id));*/
        $task->delete();
        return Redirect::action('TaskController@home');

    }

   public function destroy($id)
    {
    $task = Task::findOrFail($id);
    $task->delete();

    return Redirect::route('tasks.home');
    }

    public function show($id)
    {
        $task = Task::find($id);

        //return $task;
        //return View::make('task', compact('task'));
        return View('task')->with('task', $task);

    }

}
