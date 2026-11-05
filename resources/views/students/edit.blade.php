
@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-3xl">

    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">
            Edit Student
        </h1>
        <p class="mt-1 text-sm text-gray-600">
            Update the student's information.
        </p>
    </div>

    <form action="{{ route('students.update', $student->id) }}"
          method="POST"
          class="space-y-5 rounded-lg border border-gray-200 bg-white p-6 shadow-sm">

        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="rounded-md border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <p class="font-medium">Please correct these errors:</p>
                <ul class="mt-2 list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <label for="name" class="mb-1 block text-sm font-medium text-gray-700">
                Full Name *
            </label>
            <input type="text" id="name" name="name"
                   value="{{ old('name', $student->name) }}"
                   required maxlength="100"
                   class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="mb-1 block text-sm font-medium text-gray-700">
                Email Address *
            </label>
            <input type="email" id="email" name="email"
                   value="{{ old('email', $student->email) }}"
                   required maxlength="150"
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
                <input type="tel" id="phone" name="phone"
                       value="{{ old('phone', $student->phone) }}"
                       maxlength="20"
                       class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm">
                @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="date_of_birth" class="mb-1 block text-sm font-medium text-gray-700">
                    Date of Birth
                </label>
                <input type="date" id="date_of_birth" name="date_of_birth"
                       value="{{ old('date_of_birth', $student->date_of_birth) }}"
                       max="{{ date('Y-m-d') }}"
                       class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm">
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
                    class="w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm">
                <option value="">Select Gender</option>
                <option value="Male" {{ old('gender', $student->gender) === 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender', $student->gender) === 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ old('gender', $student->gender) === 'Other' ? 'selected' : '' }}>Other</option>
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
                      class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm">{{ old('address', $student->address) }}</textarea>
            @error('address')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-3 border-t border-gray-100 pt-5">
            <a href="{{ route('students.index') }}"
               class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                Cancel
            </a>

            <button type="submit"
                    class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                Update Student
            </button>
        </div>

    </form>
</div>
@endsection
