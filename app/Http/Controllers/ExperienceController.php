<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Experience::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        $experience = Experience::create($request->all());
        return response()->json($experience, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $experience = Experience::findOrFail($id);
            return response()->json($experience);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Experience not found'], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'job_title' => 'sometimes|string|max:255',
                'company' => 'sometimes|string|max:255',
                'start_date' => 'sometimes|date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
                'description' => 'nullable|string',
            ]);

            $experience = Experience::findOrFail($id);
            $experience->update($request->all());
            return response()->json($experience);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Experience not found'], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $experience = Experience::findOrFail($id);
            $experience->delete();
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Experience not found'], Response::HTTP_NOT_FOUND);
        }
    }
}
