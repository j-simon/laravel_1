<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = DB::select("SELECT * FROM projects_ue12;");
        // $projects = [];
        dump($projects);

        return view("projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // validate()
        // speichern
        DB::insert(
            "INSERT INTO projects_ue12 (name,description,start_date,end_date) VALUES (?,?,?,?)",
            [
                $request->input("name"),
                $request->input("description"),
                $request->input("start_date"),
                $request->input("end_date")
            ]
        );

        return response()->redirectTo('/projects');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = DB::select('SELECT * FROM projects_ue12 WHERE id = ?', [$id]);
        // array blade ['id']
        $project = DB::selectOne('SELECT * FROM projects_ue12 WHERE id = ?', [$id]);
        // stdClass Object blade ->id
        var_dump($project);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::update(
            'UPDATE projects_ue12 SET name = ?, description = ?, start_date = ?, end_date = ?, status = ?, updated_at = NOW() WHERE id = ?',
            [
                $request->input('name'),
                $request->input('description'),
                $request->input('start_date'),
                $request->input('end_date'),
                $request->input('status'),
                $id
            ]
        );

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::delete("DELETE FROM projects_ue12 WHERE id = ?", [$id]);
        return response()->redirectTo('/projects');
    }
}
