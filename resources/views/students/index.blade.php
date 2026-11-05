@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-7xl space-y-6">

        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">
                    Students
                </h1>
                <p class="mt-1 text-sm text-gray-600">
                    Manage registered students.
                </p>
            </div>

            <a href="{{ route('students.create') }}"
                class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                Add Student
            </a>
        </div>

        @if (session('success'))
            <div class="rounded-md border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('students.index') }}" method="GET"
            class="flex flex-col gap-3 rounded-lg border border-gray-200 bg-white p-4 sm:flex-row">

            <div class="flex-1">
                <label for="search" class="sr-only">Search students</label>
                <input id="search" name="search" type="search" value="{{ request('search') }}"
                    placeholder="Search name or email..."
                    class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
            </div>

            <div>
                <label for="gender" class="sr-only">Filter by gender</label>
                <select id="gender" name="gender"
                    class="w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm sm:w-40">
                    <option value="">All genders</option>
                    <option value="Male" {{ request('gender') === 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ request('gender') === 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ request('gender') === 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <button type="submit" class="rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                Search
            </button>

            <a href="{{ route('students.index') }}"
                class="rounded-md border border-gray-300 px-4 py-2 text-center text-sm font-medium text-gray-700 hover:bg-gray-50">
                Reset
            </a>
        </form>

        <div class="overflow-hidden rounded-lg border border-gray-200 bg-white">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">Name
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Email</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Phone</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Gender</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @forelse ($students as $student)
                            <tr class="hover:bg-gray-50">
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    {{ $student->id }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                    {{ $student->name }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600">
                                    {{ $student->email }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600">
                                    {{ $student->phone ?: '—' }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600">
                                    {{ $student->gender ?: '—' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-500">
                                    No students found. Try changing your search or filter.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t border-gray-200 px-6 py-4">
                <div class="mb-3 text-sm text-gray-500">
                    Showing {{ $students->firstItem() ?? 0 }}–{{ $students->lastItem() ?? 0 }}
                    of {{ $students->total() }} students
                </div>

                {{ $students->links() }}
            </div>
        </div>

    </div>
@endsection