
@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-3xl">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">
            Add Student
        </h1>
        <p class="mt-1 text-sm text-gray-600">
            Enter the student's details below.
        </p>
    </div>

    <form action="{{ route('students.store') }}"
          method="POST"
          class="space-y-5 rounded-lg border border-gray-200 bg-white p-6 shadow-sm">

        @csrf

        @if ($errors->any())
            <div class="rounded-md border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <p class="font-medium">Please correct the following errors:</p>
                <ul class="mt-2 list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <label for="name" class="mb-1 block text-sm font-medium text-gray-700">
                Full name <span class="text-red-600">*</span>
            </label>
            <input id="name" name="name" type="text"
                   value="{{ old('name') }}"
                   required maxlength="100"
                   autocomplete="name"
                   class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="mb-1 block text-sm font-medium text-gray-700">
                Email address <span class="text-red-600">*</span>
            </label>
            <input id="email" name="email" type="email"
                   value="{{ old('email') }}"
                   required maxlength="150"
                   autocomplete="email"
                   class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
            <div>
                <label for="phone" class="mb-1 block text-sm font-medium text-gray-700">
                    Phone
                </label>
                <input id="phone" name="phone" type="tel"
                       value="{{ old('phone') }}" maxlength="20"
                       autocomplete="tel"
                       class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="date_of_birth" class="mb-1 block text-sm font-medium text-gray-700">
                    Date of birth
                </label>
                <input id="date_of_birth" name="date_of_birth" type="date"
                       value="{{ old('date_of_birth') }}"
                       max="{{ date('Y-m-d') }}"
                       class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                @error('date_of_birth')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="gender" class="mb-1 block text-sm font-medium text-gray-700">
                Gender
            </label>
            <select id="gender" name="gender"
                    class="w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
                <option value="">Select an option</option>
                <option value="Male" @selected(old('gender') === 'Male')>Male</option>
                <option value="Female" @selected(old('gender') === 'Female')>Female</option>
                <option value="Other" @selected(old('gender') === 'Other')>Other</option>
            </select>
            @error('gender')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="address" class="mb-1 block text-sm font-medium text-gray-700">
                Address
            </label>
            <textarea id="address" name="address" rows="3" maxlength="2000"
                      class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">{{ old('address') }}</textarea>
            @error('address')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end gap-3 border-t border-gray-100 pt-5">
            <a href="{{ route('students.index') }}"
               class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                Cancel
            </a>

            <button type="submit"
                    class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Save Student
            </button>
        </div>
    </form>
</div>
@endsection
