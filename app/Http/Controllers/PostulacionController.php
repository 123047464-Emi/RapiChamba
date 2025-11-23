<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostulacionController extends Controller
{
    //
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }
}
