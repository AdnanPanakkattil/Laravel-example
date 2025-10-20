<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index(): View
    {
        $students = Student::all();
        return view('students.index')->with('students', $students);
    }

    /**
     * Display the specified student.
     */
    public function show(string $id): View
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing a student.
     */
    public function edit(string $id): View
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified student.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'age'            => 'required|numeric|min:1',
            'mobile'         => 'required|string|max:20',
            'address'        => 'required|string|max:255',
            'guardian_name'  => 'required|string|max:255',
            'mother_name'    => 'required|string|max:255',
        ]);

        $student = Student::findOrFail($id);
        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('flash_message', 'Student updated successfully!');
    }

    /**
     * Remove the specified student.
     */
    public function destroy(string $id): RedirectResponse
    {
        Student::destroy($id);

        return redirect()
            ->route('students.index')
            ->with('flash_message', 'Student deleted successfully!');
    }
      public function create()
    {
        return view('students.create');
    }

    // Handle AJAX Store
    public function store(Request $request)
    {
    // Validate the incoming data
    $validated = $request->validate([
        'first_name'    => 'required|string|max:255',
        'last_name'     => 'required|string|max:255',
        'age'           => 'required|numeric|min:1',
        'mobile'        => 'required|string|max:20',
        'address'       => 'required|string|max:255',
        'guardian_name' => 'required|string|max:255',
        'mother_name'   => 'required|string|max:255',
    ]);

    // Create a new student record
    $student = Student::create($validated);

    // Return JSON response for AJAX
    return response()->json([
        'success' => true,
        'message' => 'Student added successfully!',
        'data' => $student
    ]);
}


}
