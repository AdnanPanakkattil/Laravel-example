<?php

namespace App\Http\Controllers;
    
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\student;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::all();
        return view('students.index')->with('students', $students);
    }

    // other methods (create, store, etc.)

    public function create(): View
    {
        return view('students.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        student::create($input);
        return redirect('students')->with('flash_massage','student Addedd!');
    }


    public function show(string $id): view
    {
        $students = student::find($id);
        return view('students.show')->with('students',$students);
    }

    public function edit(string $id)
    {
        $students = Student::findOrFail($id);
        return view('students.edit', compact('students'));
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|string|max:25',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'guardian_name' => 'required|string|max:200',
            'mother_name' => 'required|string|max:200',
         ]);
        $student = Student::findOrFail($id);
        $student->first_name = $validated['first_name'];
        $student->last_name = $validated['last_name'];
        $student->age = $validated['age'];
        $student->address = $validated['address'];
        $student->mobile = $validated['mobile'];
        $student->guardian_name=$validated['guardian_name'];
        $student->mother_name = $validated['mother_name'];
        $student->save();
    return redirect()->route('students.index')->with('success', 'Student updated successfully.');

    }


    public function destroy(string $id): RedirectResponse
    {
        student::destroy($id);
        return redirect('students')->with('flash_massage','student deleted');
    }


}