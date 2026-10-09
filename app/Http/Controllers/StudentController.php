<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        // Start building a query for students.
        $query = Student::query();

        // Search by student name or email.
        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($subQuery) use ($search) {
                $subQuery->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by course.
        if ($request->filled('course')) {
            $query->where('course', $request->input('course'));
        }

        // Fetch 10 matching students per page.
        $students = $query->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        // Get distinct courses for the filter dropdown.
        $courses = Student::query()
            ->whereNotNull('course')
            ->where('course', '<>', '')
            ->distinct()
            ->orderBy('course')
            ->pluck('course');

        return view('students.index', compact('students', 'courses'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email',
            'phone' => 'nullable|string|max:20',
            'course' => 'required|string|max:255',
        ]);

        student::create($validate);

        return redirect('/students')->with('success', 'student register successfullly');
    }

    public function edit(Student $student)
    {
        return view('students.edit', [
            'student' => $student
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('students', 'email')->ignore($student->id),
            ],
            'phone' => 'nullable|string|max:20',
            'course' => 'required|string|max:255',
        ]);

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }
}
