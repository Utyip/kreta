<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view("Students.index", ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("students.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = new Student(
            [
                "name" => $request->name,
                "birthday" => $request->birthday,
                "course_id" => $request->course_id,
            ]
        );

        $student->save();

        return back()->with("success", "Student created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $this->authorize('view', $student);
        return view('students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view("students.edit", ['student' => $student]);    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'The student was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return back()->with('success', 'Successfully deleted the course: ' . $student->name . '.');
    }


    /* Saját funkciók */
    public function show_deleted()
    {
        $deleted_students = Student::onlyTrashed()->get();
        return view('students.show_deleted', ['student' => $deleted_students]);
    }

    public function restore(Student $student)
    {
        $student->restore();
        return back()->with('success', '' . $student->name . ' was successfully restored.');
    }

}
