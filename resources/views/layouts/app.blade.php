<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Student Management')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 text-gray-900 antialiased">

    <header class="border-b border-gray-200 bg-white">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4 sm:px-6">
            <a href="{{ route('students.index') }}" class="text-lg font-semibold tracking-tight">
                Student Management
            </a>

            <nav class="flex items-center gap-5 text-sm">
                <a href="{{ route('students.index') }}" class="text-gray-600 hover:text-blue-600">
                    Students
                </a>

                <a href="{{ route('students.create') }}" class="font-medium text-blue-600 hover:text-blue-700">
                    Add Student
                </a>
            </nav>
        </div>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6">

        @if (session('success'))
            <div class="mb-5 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>

</html>