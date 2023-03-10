<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', [
            "projects"=>$projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {   //validated usa le validazioni/regole che ho indicato nello StoreProjectRequest
        $data = $request->validated();

        // $data= $request->validate([
        //     "title"=> "required|string|min:3",
        //     "description"=> "required|string|min:10",
        //     "cover_img"=> "nullable|image",
        //     "github_link"=> "nullable|string|url"
        // ]);


        $data= $request->all();

        //all'interno di public, dentro astorage creo una cartella "projectimgs", e prendo la variabile cover_img che sitrova nell'array $data
        // e lo metto dentro alla cartella appena creaata
        $path = Storage::put("projectimgs", $data["cover_img"]);

        //Nella tabella mi creo una nuova riga con i dati che sono appena rrivati dal creat/form
        $project= Project::create($data);
        //uso il path per salvare la cover_img a db
        $project->cover_img = $path;
        $project->save();

        return redirect()->route("admin.projects.show", $project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project= Project::findOrFail($id);

        return view("admin.projects.show", [
            "project"=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project= Project::findOrFail($id);

        return view("admin.projects.edit", [
            "project"=>$project]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, $id)
    {   
        //validatedusa le validazioni/regole che ho indicato nello StoreProjectRequest
        $data = $request->validated();


        // $data= $request->validate([
        //     "title"=> "required|string|min:3",
        //     "description"=> "required|string|min:10",
        //     "cover_img"=> "nullable|image",
        //     "github_link"=> "nullable|string|url"

        // ]);
        
        //Scrivo quali sono i dati che voglio ricevere tramite l update
        $data = $request->all();

        $project= Project::findOrFail($id);

        $project->update($data);

        
        // carico il file solo se ne ricevo uno
        if (key_exists("cover_img", $data)) {
            // salvo in una variabile temporanea il percorso del nuovo file
            $path = Storage::put("projectimgs", $data["cover_img"]);
            // Dopo aver caricato la nuova immagine, prima di aggiornare il db,
            // cancelliamo dallo storage il vecchio file.
            Storage::delete($project->cover_img);

            $project->cover_img = $path;
        }

        $project->save();

        

        return redirect()->route("admin.projects.show",$project->id);


    }

    /**
     * Remove the specified resource from storage.projectimgs
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route("admin.projects.index");
    }
}
