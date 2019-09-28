<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Gradebook;

class StudentsController extends Controller
{
    public function index()
    {
        return Student::with('gradebook')->get();
    }

    public function store(Request $request)
    {
        $this->validate(request(), Student::STORE_RULES);

        $student = new Student();
        $student->firstName = $request->input('firstName');
        $student->lastName = $request->input('lastName');
        $student->image = $request->input('image');
        $student->gradebook_id = (int)request('gradebook_id');
        $student->save();

        return $student;
    }

    public function show($id)
    {
        $student = Student::with('gradebook')->findOrFail($id);
        return $student;
    }
}
