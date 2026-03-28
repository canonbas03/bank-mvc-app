<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return view('index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'fn' => 'required|integer',

            'name' => 'required|max:255',

        ]);

        $student = Student::create($validatedData);

        return redirect('/students')->with('success', 'The Student is successfully saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);

        return view('edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([

            'fn' => 'required|numeric',

            'name' => 'required|max:255',

        ]);

        Student::whereId($id)->update($validatedData);

        return redirect('/students')->with('success', 'Student data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect('/students')->with('success', 'Student data is successfully deleted');
    }
}
