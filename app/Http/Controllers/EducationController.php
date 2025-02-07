<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Education::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        $education = Education::create($request->all());
        return response()->json($education, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $education = Education::findOrFail($id);
            return response()->json($education);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Education not found'], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'institution' => 'sometimes|string|max:255',
                'degree' => 'sometimes|string|max:255',
                'start_date' => 'sometimes|date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
                'description' => 'nullable|string',
            ]);

            $education = Education::findOrFail($id);
            $education->update($request->all());
            return response()->json($education);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Education not found'], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $education = Education::findOrFail($id);
            $education->delete();
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Education not found'], Response::HTTP_NOT_FOUND);
        }
    }
}
