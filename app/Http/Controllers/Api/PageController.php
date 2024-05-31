<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class PageController extends Controller
{
    public function index(){
        // $projects = Project::with('technology')->get();
        $projects = Project::all();


        return response()->json($projects);
    }
}
