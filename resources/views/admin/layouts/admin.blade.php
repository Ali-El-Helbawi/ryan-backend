<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin Panel - @yield('title')</title>
    <!-- Include your CSS framework (Tailwind/Bootstrap) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <!-- Admin Navbar -->
    <nav class="bg-white border-b p-4">
        <a href="{{ route('admin.dashboard') }}" class="font-bold text-xl">
            Admin Panel
        </a>
        <!-- Example: Link to resources -->
        <a href="{{ route('skills.index') }}" class="ml-4">Skills</a>
        <a href="{{ route('projects.index') }}" class="ml-4">Projects</a>
        <!-- etc. -->
        <!-- Logout Link -->
        <form class="inline ml-4" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>

    <!-- Main Content -->
    <div class="p-4">
        @yield('content')
    </div>
</body>

</html>