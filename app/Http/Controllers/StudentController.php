<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Student;

class StudentController extends Controller
{

    public function dashboard()
    {
        $totalStudents = Student::count();

        $thisMonthStudents = Student::whereMonth(
            'created_at',
            now()->month
        )->whereYear(
                'created_at',
                now()->year
            )->count();

        $recentStudentsCount = Student::where(
            'created_at',
            '>=',
            now()->subDays(7)
        )->count();

        $latestStudents = Student::latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalStudents',
            'thisMonthStudents',
            'recentStudentsCount',
            'latestStudents'
        ));
    }


    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->input('gender'));
        }

        $students = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();


        return view('students.index', compact('students'));
    }



    public function create()
    {
        Log::info('Student registration form opened.', ['route' => 'students.create']);

        return view('students.create');

    }

    public function store(Request $request)
    {

        // dd($request->all());

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150', 'unique:students,email'],
            'phone' => ['nullable', 'string', 'max:20'],
            'date_of_birth' => ['nullable', 'date', 'before_or_equal:today'],
            'gender' => ['nullable', 'in:Male,Female,Other'],
            'address' => ['nullable', 'string', 'max:2000'],
        ]);

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student details passed validation.');
    }


    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => [
                'required',
                'email',
                'max:150',
                'unique:students,email,' . $student->id,
            ],
            'phone' => ['nullable', 'string', 'max:20'],
            'date_of_birth' => ['nullable', 'date', 'before_or_equal:today'],
            'gender' => ['nullable', 'in:Male,Female,Other'],
            'address' => ['nullable', 'string', 'max:2000'],
        ]);

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
