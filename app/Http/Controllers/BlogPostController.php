<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(BlogPost::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|url',
            'date' => 'required|date',
        ]);

        $blogPost = BlogPost::create($request->all());
        return response()->json($blogPost, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $blogPost = BlogPost::findOrFail($id);
            return response()->json($blogPost);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Blog post not found'], Response::HTTP_NOT_FOUND);
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
                'content' => 'sometimes|string',
                'image' => 'nullable|url',
                'date' => 'sometimes|date',
            ]);

            $blogPost = BlogPost::findOrFail($id);
            $blogPost->update($request->all());
            return response()->json($blogPost);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Blog post not found'], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $blogPost = BlogPost::findOrFail($id);
            $blogPost->delete();
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Blog post not found'], Response::HTTP_NOT_FOUND);
        }
    }
}
