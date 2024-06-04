<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;

class PageController extends Controller
{
    public function index(){
        // $projects = Project::with('technology')->get();
        $projects = Project::all();


        return response()->json($projects);
    }

    public function getTechnologies(){
        // $projects = Project::with('technology')->get();
        $techno = Technology::all();


        return response()->json($techno);
    }

    public function getTypes(){
        // $projects = Project::with('technology')->get();
        $type = Type::all();


        return response()->json($type);
    }

    public function getProjectSlug($slug){
        // $projects = Project::with('technology')->get();
        $project = Project::where('slug', $slug)->with('technology', 'type', 'user')->first();

        if ($project) {
            $success = true;
            if ($project->image) {
                $project->image = asset('storage/' . $project->image);
            }else{
                $project->image = asset('storage/uploads/imagenotfound.jpg');
                $project->image_original_name = 'no image';
            }
        }else{
            $success = false;
        }

        return response()->json(compact('success', 'project'));
    }
}
