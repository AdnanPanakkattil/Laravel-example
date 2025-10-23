<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Student;
use Yajra\DataTables\DataTables;
class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $students = Student::select(['id', 'first_name', 'last_name', 'age', 'address', 'mobile', 'guardian_name', 'mother_name'])->orderBy('created_at', 'desc');

        return DataTables::of($students)
            ->addIndexColumn()
            ->addColumn('action', function ($student) {
                return '
                    <a href="'.route('students.show', $student->id).'" class="btn btn-primary btn-sm">View</a>
                    <a href="'.route('students.edit', $student->id).'" class="btn btn-warning btn-sm">Edit</a>
                    <form action="'.url('/students/'.$student->id).'" method="POST" class="deleteForm" style="display:inline;">
                        '.csrf_field().method_field('DELETE').'
                        <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                    </form>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('students.index');
    }

    public function getData()
    {
        
    }

    /**
     * Show the form for creating a new student.
     */

    public function create(): View
    {
        return view('students.create');
    }

    /**
     * Store a newly created student in storage (AJAX or normal).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'age'           => 'required|numeric|min:1',
            'mobile'        => 'required|string|max:20',
            'address'       => 'required|string|max:255',
            'guardian_name' => 'required|string|max:255',
            'mother_name'   => 'required|string|max:255',
        ]);

        $student = Student::create($validated);

        // For AJAX request
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Student added successfully!',
                'data' => $student
            ]);
        }

        // Normal redirect
        return redirect()
            ->route('students.index')
            ->with('flash_message', 'Student added successfully!');
    }

    /**
     * Display the specified student.
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(string $id): View
    {
        $student = Student::findOrFail($id);
        $studentId = $id;
        return view('students.edit', compact('student','studentId'));
        // ❌ Before: compact('students.edit') — wrong key
        // ✅ Should pass variable name that exists: 'student'
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'age'           => 'required|numeric|min:1',
            'mobile'        => 'required|string|max:20',
            'address'       => 'required|string|max:255',
            'guardian_name' => 'required|string|max:255',
            'mother_name'   => 'required|string|max:255',
        ]);

        $student = Student::findOrFail($id);
        $student->update($validated);

        return response()->json([
        'status'  => 'success',
        'message' => 'Student updated successfully!',
        'student' => $student, // optional, you can return updated data
    ]);
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('flash_message', 'Student deleted successfully!');
    }
}
