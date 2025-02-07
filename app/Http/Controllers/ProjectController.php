<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Project::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|url',
            'link' => 'nullable|url',
            'tech_stack' => 'nullable|string',
        ]);

        $project = Project::create($request->all());
        return response()->json($project, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $project = Project::findOrFail($id);
            return response()->json($project);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Project not found'], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'sometimes|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|url',
                'link' => 'nullable|url',
                'tech_stack' => 'nullable|string',
            ]);

            $project = Project::findOrFail($id);
            $project->update($request->all());
            return response()->json($project);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Project not found'], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $project = Project::findOrFail($id);
            $project->delete();
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Project not found'], Response::HTTP_NOT_FOUND);
        }
    }
}
