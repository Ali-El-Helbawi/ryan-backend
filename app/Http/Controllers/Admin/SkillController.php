<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'level' => 'required|integer|between:0,100',
        ]);

        Skill::create($request->only('name', 'level'));

        return redirect()->route('skills.index')
            ->with('success', 'Skill created successfully!');
    }

    public function show(Skill $skill)
    {
        // Not always used in an admin panel, but included by default
        return view('admin.skills.show', compact('skill'));
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string',
            'level' => 'required|integer|between:0,100',
        ]);

        $skill->update($request->only('name', 'level'));

        return redirect()->route('skills.index')
            ->with('success', 'Skill updated successfully!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')
            ->with('success', 'Skill deleted successfully!');
    }
}
