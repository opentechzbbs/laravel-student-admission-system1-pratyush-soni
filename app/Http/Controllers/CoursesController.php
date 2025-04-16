<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Department;
use Illuminate\Http\Request;

class CoursesController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Departments = Department::all();
        return view('admin.course', compact('Departments'));
    }
    public function view()
    {
        $departments = Department::all();
        return view('admin.viewcourse', compact('departments'));
    }

    public function create()
    {
        return view('admin.course');
    }
    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);

        Courses::create([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Courses added successfully.');
    }
    public function getCoursesByDepartment(Request $request)
{
    $departmentId = $request->input('department_id');
    $courses = Courses::where('department_id', $departmentId)->get();

    return response()->json($courses);
}

    public function getByDepartment(Request $request)
    {
        $courses = Courses::where('department_id', $request->department_id)->get();
        return response()->json($courses);
    }
    public function update(Request $request, $id)
    {
        $course = Courses::findOrFail($id);
        $course->name = $request->course_name;
        $course->description = $request->brand;
        $course->department_id = $request->department_id;
        
        $course->save();

        return response()->json(['success' => true]);
    }



    /**
     * Delete a Courses.
     */
    public function destroy(string $id)
    {
        Courses::destroy($id);
        return response()->json(['success' => true]);
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
        //
    }

    public function search(Request $request)
    {
        $query = $request->query('query');
        $DepartmentId = $request->query('Department');

        $Coursess = Courses::query()
            ->when($query, fn($q) => $q->where('name', 'like', "%$query%"))
            ->when($DepartmentId, fn($q) => $q->where('Department_id', $DepartmentId))
            ->latest()
            ->get();

        return view('partials.Courses-cards', compact('Coursess'))->render();
    }
}
