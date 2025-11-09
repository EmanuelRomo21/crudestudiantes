<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Career;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with('career');

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                  ->orWhere('numero_control', 'like', "%{$search}%");
            });
        }

        $students = $query->orderBy('nombre')->get();
        $noResults = $request->filled('q') && $students->isEmpty();

        return view('students.index', compact('students', 'noResults'));
    }

    public function create()
    {
        $careers = Career::all();
        return view('students.create', compact('careers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'numero_control' => 'required|digits_between:6,12|unique:students,numero_control',
            'career_id' => 'required|exists:careers,id',
            'semestre' => 'required|integer|min:1|max:12',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Estudiante registrado correctamente.');
    }

    public function edit(Student $student)
    {
        $careers = Career::all();
        return view('students.edit', compact('student', 'careers'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'numero_control' => 'required|digits_between:6,12|unique:students,numero_control,' . $student->id,
            'career_id' => 'required|exists:careers,id',
            'semestre' => 'required|integer|min:1|max:12',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Estudiante actualizado correctamente.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Estudiante eliminado correctamente.');
    }
}
