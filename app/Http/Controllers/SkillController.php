<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Skill::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:100',
        ]);

        $skill = Skill::create($request->all());
        return response()->json($skill, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $skill = Skill::findOrFail($id);
            return response()->json($skill);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Skill not found'], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'sometimes|string|max:255',
                'level' => 'sometimes|integer|min:0|max:100',
            ]);

            $skill = Skill::findOrFail($id);
            $skill->update($request->all());
            return response()->json($skill);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Skill not found'], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $skill = Skill::findOrFail($id);
            $skill->delete();
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Skill not found'], Response::HTTP_NOT_FOUND);
        }
    }
}
