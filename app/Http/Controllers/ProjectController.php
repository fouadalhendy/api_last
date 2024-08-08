<?php

namespace App\Http\Controllers;

use App\Models\Categore;
use App\Models\Educatione;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Project=Project::all();
        $categore=Categore::all();
        $educatione=Educatione::all();;
        return response()->json([
            $Project,
            $categore,
            $educatione
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // 'head',
    // 'description',
    // 'img_project'
    public function store(Request $request)
    {
        $this->authorize('create',Educatione::class);
        $data=$request->validate([
            'head'=>'string',
            'description'=>'required|string|max:20',
            'img_project'=>'required|image',
            'educationes_id'=>'required|array'
        ]);

        if ($request->hasfile("img_project")) {
            $img=$request->img_project;
            $nameimg= time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('contacteimg'),$nameimg);
        }
        $projects=new project;
        $projects->head=$data['head'];
        $projects->description=$data['description'];
        $projects->img_project= $nameimg;
        $projects->categore_id=$request->categore_id;
        $projects->save();

        $projects->educationes()->attach($request->educationes_id);
        return response()->json([
            "masseg"=>"insert projects"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {


        return response()->json([
            $project,
            $project->educationes()->where('project_id',$project['id'])->get(),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $this->authorize('update',Educatione::class);
        $data=$request->validate([
            'head'=>'string',
            'description'=>'required|string|max:20',
            'img_project'=>'image',
            'educationes_id'=>'required|array'
        ]);
        if ($request->hasfile("img_project")) {
            $img=$request->img_project;
            $nameimg= time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('projectimg'),$nameimg);
            $project->img_project= $nameimg;
        }

        $project->head=$data['head'];
        $project->description=$data['description'];
        $project->categore_id=$request->categore_id;
        $project->save();

        $project->educationes()->attach($request->educationes_id);
        return response()->json([
            "masseg"=>"ubdate projects"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete',Educatione::class);
        $project->delete();
        return response()->json([
            "masseg"=>"delete projects"
        ]);
    }
}
