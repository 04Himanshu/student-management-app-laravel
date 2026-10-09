@extends('layout.app')

@section('title', 'Students | StudentHub')
@section('page-heading', 'Dashboard')

@section('content')

    {{-- Success message --}}
    @if (session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- Page heading --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="welcome-title mb-2">Student Management System</h1>
            <p class="muted-text mb-0">
                Search, filter, and manage your students.
            </p>
        </div>

        <a href="{{ route('students.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>
            Add New Student
        </a>
    </div>

    {{-- Students table card --}}
    <div class="content-card">

        <div class="card-heading">
            <div>
                <h5>All Students</h5>
                <p>View and manage student records.</p>
            </div>

            <span class="course-badge">
                {{ $students->total() }} total records
            </span>
        </div>

        {{-- Search and course filter --}}
        <div class="p-3 p-md-4 border-bottom">
            <form action="{{ route('students.index') }}" method="GET">
                <div class="row g-3 align-items-end">

                    <div class="col-12 col-md-5">
                        <label for="search" class="form-label">
                            Search students
                        </label>

                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="bi bi-search"></i>
                            </span>

                            <input
                                type="text"
                                id="search"
                                name="search"
                                class="form-control"
                                placeholder="Search by name or email..."
                                value="{{ request('search') }}"
                            >
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="course" class="form-label">
                            Filter by course
                        </label>

                        <select id="course" name="course" class="form-select">
                            <option value="">All courses</option>

                            @foreach ($courses as $course)
                                <option
                                    value="{{ $course }}"
                                    {{ request('course') == $course ? 'selected' : '' }}
                                >
                                    {{ $course }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary flex-grow-1">
                            <i class="bi bi-search me-1"></i>
                            Search
                        </button>

                        <a href="{{ route('students.index') }}"
                           class="btn btn-light border">
                            Reset
                        </a>
                    </div>

                </div>
            </form>
        </div>

        {{-- Students data --}}
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td class="text-secondary">
                                #{{ $student->id }}
                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="student-avatar">
                                        {{ strtoupper(substr($student->name, 0, 1)) }}
                                    </span>

                                    <div>
                                        <div class="student-name">
                                            {{ $student->name }}
                                        </div>

                                        <div class="student-email">
                                            {{ $student->email }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                {{ $student->phone ?: 'Not provided' }}
                            </td>

                            <td>
                                <span class="course-badge">
                                    {{ $student->course }}
                                </span>
                            </td>

                            <td>
                                <div class="d-flex gap-2">
                                    <a
                                        href="{{ route('students.edit', $student) }}"
                                        class="action-btn edit-btn"
                                        title="Edit student"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form
                                        action="{{ route('students.destroy', $student) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this student?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="action-btn delete-btn"
                                            title="Delete student"
                                        >
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <i class="bi bi-people"></i>
                                    <h5>No students found</h5>
                                    <p>Try another search or add a new student.</p>

                                    <a
                                        href="{{ route('students.create') }}"
                                        class="btn btn-primary"
                                    >
                                        Add Student
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 p-3">
            <p class="muted-text mb-0">
                Showing {{ $students->firstItem() ?? 0 }}
                to {{ $students->lastItem() ?? 0 }}
                of {{ $students->total() }} students
            </p>

            <div>
                {{ $students->links() }}
            </div>
        </div>

    </div>

@endsection