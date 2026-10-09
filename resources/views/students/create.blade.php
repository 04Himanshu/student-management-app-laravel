@extends('layout.app')

@section('title', 'Add Student | StudentHub')
@section('page-heading', 'Add Student')

@section('content')

    <div class="mb-4">
        <a href="{{ route('students.index') }}" class="muted-text">
            <i class="bi bi-arrow-left me-1"></i> Back to dashboard
        </a>
        <h1 class="welcome-title mt-3 mb-2">Register a Student</h1>
        <p class="muted-text mb-0">
            Enter the student's details in the form below.
        </p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            Please correct the errors highlighted below.
        </div>
    @endif

    <div class="form-card">
        <div class="d-flex align-items-center gap-3 mb-4">
            <span class="stat-icon icon-purple">
                <i class="bi bi-person-plus-fill"></i>
            </span>
            <div>
                <h5 class="mb-1 fw-bold">Student Information</h5>
                <p class="muted-text mb-0">Fields marked with * are required.</p>
            </div>
        </div>

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <label for="name" class="form-label">Full Name *</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" placeholder="Enter full name" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-6">
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" placeholder="student@example.com" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-6">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone') }}" placeholder="Enter phone number">
                    <div class="form-hint">Optional</div>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-6">
                    <label for="course" class="form-label">Course *</label>
                    <input type="text" id="course" name="course" class="form-control @error('course') is-invalid @enderror"
                        value="{{ old('course') }}" placeholder="e.g. Laravel Development" required>
                    @error('course')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-4" style="border-color: var(--border);">

            <div class="d-flex flex-wrap justify-content-end gap-2">
                <a href="{{ route('students.index') }}" class="btn btn-light border px-4 py-2">
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check2-circle me-2"></i>
                    Register Student
                </button>
            </div>
        </form>
    </div>

@endsection