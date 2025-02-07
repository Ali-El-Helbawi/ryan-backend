<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(PersonalInfo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'profile_picture_url' => 'nullable|url',
            'mobile_number' => 'required|string|max:20',
        ]);

        $personalInfo = PersonalInfo::create($request->all());
        return response()->json($personalInfo, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $personalInfo = PersonalInfo::findOrFail($id);
            return response()->json($personalInfo);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Personal info not found'], Response::HTTP_NOT_FOUND);
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
                'title' => 'sometimes|string|max:255',
                'bio' => 'sometimes|string',
                'profile_picture_url' => 'nullable|url',
                'mobile_number' => 'sometimes|string|max:20',
            ]);

            $personalInfo = PersonalInfo::findOrFail($id);
            $personalInfo->update($request->all());
            return response()->json($personalInfo);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Personal info not found'], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $personalInfo = PersonalInfo::findOrFail($id);
            $personalInfo->delete();
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Personal info not found'], Response::HTTP_NOT_FOUND);
        }
    }
}
