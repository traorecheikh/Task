<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function ajouter(Request $request)
    {
        if($request->isMethod('post'))
        {
            $task = new Task();
            $task->titre = $request->titre;
            $task->contenu = $request->contenu;
            $task->user_id = Auth::user()->id;
            $task->save();
            return redirect('/dashboard');
        }
        return view('ajouter');
    }

    public function modifier(Request $request,Task $task)
    {
        if($request->isMethod('put'))
        {
            $task->titre = $request->titre;
            $task->contenu = $request->contenu;
            $task->save();
            return redirect('/dashboard');
        }

        return view('modifier',compact('task'));
    }

    public function supprimer(Task $task)
    {
        $task->delete();
        return redirect('/dashboard');
    }

}
