<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    protected $rules=[
        "title"=>"required|string|min:2|max:100|unique:projects,title",
        "date"=>"required|date_format:Y-m-d",
        "preview"=>"required|url|max:250"   
    ];
    protected $errorsMessage=[
        "title.required"=>"Title è un campo obbligatorio",
        "title.min"=>"Title deve contenere almeno 2 caratteri",
        "title.max"=>"Title non può avere più di 100 caratteri",
        "title.unique"=>"Title esiste già",

        "date.required"=>"Date è un campo obbligatorio",
        "date.date_format"=>"formato della data deve essere YYYY/mm/dd",
        
        "preview.required"=>"Preview è un campo obbligatorio",
        "preview.url"=>"Preview deve essere un URL valido",
        "preview.max"=>"Preview non può avere più di 250 caratteri"
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::all();
        return view("admin.project.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.project.create", ["project"=>new Project()]);
    }

    /**
     * Store a newly< created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules= $this->rules;
        $errorsMessage= $this->errorsMessage;
        $data= $request->validate($rules, $errorsMessage);
        $data["author"]= Auth::user()->name;
        $data["slug"]= Str::slug($data["title"]);

        $newProject= new Project();
        $newProject->fill($data);
        $newProject->save();

        return redirect()->route("admin.project.show", $newProject->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view("admin.project.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view("admin.project.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $rules= $this->rules;
        $errorsMessage= $this->errorsMessage;
        $rules["title"]= ["required", "string", "min:2", "max:100", Rule::unique("projects")->ignore($project->id) ];
        $data= $request->validate($rules, $errorsMessage);

        $project->update($data);

        return redirect()->route("admin.project.show", compact("project"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route("admin.project.index");
    }
}
