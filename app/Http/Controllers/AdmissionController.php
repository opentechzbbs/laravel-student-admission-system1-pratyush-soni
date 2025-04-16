<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\Courses;
use App\Models\Department;

class AdmissionController extends Controller
{
    public function index()
    {
        $admissions = Admission::paginate(10); // Change 10 to whatever per-page limit you prefer
        return view('admission.index', compact('admissions'));
    }

    public function getCByDepartment(Request $request)
    {
        $courses = Courses::where('department_id', $request->department_id)->get();
        return response()->json($courses);
    }
    public function step1()
    {
        return view('admission.step1');
    }

    public function postStep1(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        session(['admission.step1' => $data]);
        return redirect()->route('admission.step2');
    }

    public function step2()
    {
        return view('admission.step2');
    }

    public function postStep2(Request $request)
    {
        $data = $request->validate([
            'highschool' => 'required',
            'intermediate' => 'required',
            'board' => 'required',
        ]);

        session(['admission.step2' => $data]);
        return redirect()->route('admission.step3');
    }

    public function step3()
    {
        $departments = Department::all();
        return view('admission.step3', compact('departments'));
    }


    public function postStep3(Request $request)
    {
        $data = $request->validate([
            'department' => 'required',
            'course' => 'required',
        ]);

        session(['admission.step3' => $data]);
        return view('admission.confirm');
    }

    public function submit(Request $request)
    {
        $data = $request->session()->get('admission');

        if (!$data) {
            return redirect()->route('admission.step1')->with('error', 'No data found in session');
        }

        $admission = Admission::create([
            'first_name' => $data['step1']['first_name'] ?? null,
            'last_name' => $data['step1']['last_name'] ?? null,
            'dob' => $data['step1']['dob'] ?? null,
            'gender' => $data['step1']['gender'] ?? null,
            'email' => $data['step1']['email'] ?? null,
            'phone' => $data['step1']['phone'] ?? null,
            'address' => $data['step1']['address'] ?? null,
            'highschool' => $data['step2']['highschool'] ?? null,
            'intermediate' => $data['step2']['intermediate'] ?? null,
            'board' => $data['step2']['board'] ?? null,
            'department' => $data['step3']['department'] ?? null,
            'course' => $data['step3']['course'] ?? null,
        ]);

        // Clear session
        $request->session()->forget('admission');

        // Redirect with ID
        return redirect()->route('admission.preview', ['id' => $admission->id]);
    }
    public function preview($id)
    {
        $admission = Admission::findOrFail($id);
        return view('admission.preview', compact('admission'));
    }

    public function downloadPdf($id)
    {
        $admission = Admission::findOrFail($id);
        $pdf = Pdf::loadView('admission.preview-pdf', compact('admission'));
        return $pdf->download('admission_details.pdf');
    }
    public function edit($id)
    {
        $admission = Admission::findOrFail($id);
        return view('admission.edit', compact('admission'));
    }

    public function update(Request $request, $id)
    {
        $admission = Admission::findOrFail($id);
        $admission->update($request->all());
        return redirect()->route('admission.index')->with('success', 'Admission updated successfully.');
    }

    public function destroy($id)
    {
        $admission = Admission::findOrFail($id);
        $admission->delete();
        return redirect()->route('admission.index')->with('success', 'Admission deleted successfully.');
    }
}
