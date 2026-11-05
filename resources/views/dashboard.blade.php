@extends('layouts.app')

@section('content')
    <div class="space-y-6">

        {{-- Page Heading --}}
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">
                Dashboard
            </h1>
            <p class="mt-1 text-sm text-gray-500">
                Welcome to your Student Management System.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

            {{-- Total Students --}}
            <div class="rounded-lg border border-gray-200 bg-white p-6">
                <p class="text-sm font-medium text-gray-500">
                    Total Students
                </p>

                <h2 class="mt-3 text-3xl font-semibold text-gray-900">
                    {{ $totalStudents }}
                </h2>

                <p class="mt-2 text-sm text-gray-500">
                    Currently registered students
                </p>
            </div>

            {{-- Monthly Students --}}
            <div class="rounded-lg border border-gray-200 bg-white p-6">
                <p class="text-sm font-medium text-gray-500">
                    Registered This Month
                </p>

                <h2 class="mt-3 text-3xl font-semibold text-gray-900">
                    {{ $thisMonthStudents }}
                </h2>

                <p class="mt-2 text-sm text-gray-500">
                    New registrations this month
                </p>
            </div>

            {{-- Weekly Students --}}
            <div class="rounded-lg border border-gray-200 bg-white p-6">
                <p class="text-sm font-medium text-gray-500">
                    New This Week
                </p>

                <h2 class="mt-3 text-3xl font-semibold text-gray-900">
                    {{ $recentStudentsCount }}
                </h2>

                <p class="mt-2 text-sm text-gray-500">
                    Registrations in the last 7 days
                </p>
            </div>

        </div>

        {{-- Recent Students --}}
        <div class="overflow-hidden rounded-lg border border-gray-200 bg-white">

            <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
                <div>
                    <h2 class="text-base font-semibold text-gray-900">
                        Recent Students
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">
                        Latest five registered students
                    </p>
                </div>

                <a href="{{ route('students.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">
                    View all
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                ID
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                Name
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                Email
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                Registered
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse ($latestStudents as $student)
                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $student->id }}
                                </td>

                                <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                    {{ $student->name }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $student->email }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $student->created_at->format('d M Y') }}
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-sm text-gray-500">
                                    No students registered yet.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection