<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'Student Management System')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen overflow-hidden bg-gray-50 text-gray-800">

    <div class="flex h-screen overflow-hidden">

        {{-- Fixed Sidebar --}}
        <aside class="fixed inset-y-0 left-0 z-40 flex w-64 flex-col border-r border-gray-200 bg-white">

            {{-- Logo --}}
            <div class="flex h-16 shrink-0 items-center border-b border-gray-200 px-6">
                <a href="{{ route('dashboard') }}" class="text-lg font-bold text-indigo-600">
                    Student Management
                </a>
            </div>

            {{-- Sidebar Navigation --}}
            <nav class="flex-1 space-y-1 overflow-y-auto p-4">

                <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-gray-400">
                    Main Menu
                </p>

                <a href="{{ route('dashboard') }}"
                    class="flex items-center rounded-md px-3 py-2.5 text-sm font-medium
                    {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-100' }}">
                    <span class="mr-3">▦</span>
                    Dashboard
                </a>

                <a href="{{ route('students.index') }}"
                    class="flex items-center rounded-md px-3 py-2.5 text-sm font-medium
                    {{ request()->routeIs('students.index') || request()->routeIs('students.edit') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-600 hover:bg-gray-100' }}">
                    <span class="mr-3">♙</span>
                    Students
                </a>

            </nav>

            {{-- Sidebar Footer --}}
            <div class="shrink-0 border-t border-gray-200 px-6 py-4">
                <p class="text-xs text-gray-400">
                    Student Management System
                </p>
                <p class="mt-1 text-xs text-gray-400">
                    Version 1.0
                </p>
            </div>

        </aside>

        {{-- Main Area --}}
        <div class="ml-64 flex min-w-0 flex-1 flex-col">

            {{-- Fixed Navbar --}}
            <header
                class="fixed left-64 right-0 top-0 z-30 flex h-16 items-center justify-between border-b border-gray-200 bg-white px-6">

                <div>
                    <p class="text-sm font-medium text-gray-700">
                        Admin Panel
                    </p>
                </div>

                <div class="text-sm text-gray-500">
                    Student Management
                </div>

            </header>

            {{-- Scrollable Page Content --}}
            <main class="mt-16 h-[calc(100vh-4rem)] overflow-y-auto p-4 sm:p-6 lg:p-8">

                <div class="mx-auto max-w-7xl">

                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="mb-5 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                            {{ session('success') }}
                        </div>
                    @endif

                    @yield('content')

                </div>

            </main>

        </div>

    </div>

</body>

</html>


</html>