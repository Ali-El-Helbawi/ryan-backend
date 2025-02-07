<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Contact::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Option 1: Store in contacts table
        $contact = Contact::create($data);

        // Option 2: Send an email (optional)
        // \Mail::to('you@example.com')->send(new ContactMailable($data));

        return response()->json([
            'success' => true,
            'message' => 'Contact form submitted successfully!',
            'data' => $contact
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     try {
    //         $contact = Contact::findOrFail($id);
    //         return response()->json($contact);
    //     } catch (ModelNotFoundException $e) {
    //         return response()->json(['error' => 'Contact not found'], Response::HTTP_NOT_FOUND);
    //     }
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     try {
    //         $request->validate([
    //             'name' => 'required|string',
    //             'email' => 'required|email',
    //             'message' => 'required|string',
    //         ]);

    //         $contact = Contact::findOrFail($id);
    //         $contact->update($request->all());
    //         return response()->json($contact);
    //     } catch (ModelNotFoundException $e) {
    //         return response()->json(['error' => 'Contact not found'], Response::HTTP_NOT_FOUND);
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id)
    // {
    //     try {
    //         $contact = Contact::findOrFail($id);
    //         $contact->delete();
    //         return response()->json(null, Response::HTTP_NO_CONTENT);
    //     } catch (ModelNotFoundException $e) {
    //         return response()->json(['error' => 'Contact not found'], Response::HTTP_NOT_FOUND);
    //     }
    // }
}
