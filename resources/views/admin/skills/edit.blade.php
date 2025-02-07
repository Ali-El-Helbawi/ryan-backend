{{-- resources/views/admin/skills/edit.blade.php --}}
@extends('admin.layouts.admin')
@section('title', 'Edit Skill')

@section('content')
<h1 class="text-xl font-bold mb-4">Edit Skill</h1>

<form action="{{ route('skills.update', $skill->id) }}" method="POST"
    class="bg-white p-4 rounded shadow">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="name" class="block font-semibold mb-1">Skill Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $skill->name) }}"
            class="w-full border border-gray-300 px-3 py-2 rounded" required>
    </div>
    <div class="mb-4">
        <label for="level" class="block font-semibold mb-1">Level (%)</label>
        <input type="number" name="level" id="level" max="100" min="0"
            value="{{ old('level', $skill->level) }}"
            class="w-full border border-gray-300 px-3 py-2 rounded">
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
        Update
    </button>
</form>
@endsection