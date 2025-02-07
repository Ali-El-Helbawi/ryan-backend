{{-- resources/views/admin/skills/index.blade.php --}}
@extends('admin.layouts.admin')
@section('title', 'Skills')

@section('content')
<h1 class="text-xl font-bold mb-4">Skills</h1>

<a href="{{ route('skills.create') }}"
    class="inline-block mb-4 bg-blue-500 text-white px-4 py-2 rounded">
    Create New Skill
</a>

<table class="min-w-full bg-white border rounded">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Level</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($skills as $skill)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $skill->id }}</td>
            <td class="px-4 py-2">{{ $skill->name }}</td>
            <td class="px-4 py-2">{{ $skill->level }}%</td>
            <td class="px-4 py-2">
                <a href="{{ route('skills.edit', $skill->id) }}" class="text-blue-600">Edit</a>
                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" class="inline-block ml-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600"
                        onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="px-4 py-2 text-center">No skills found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection