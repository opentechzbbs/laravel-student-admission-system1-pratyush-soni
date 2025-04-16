@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Application Preview</h2>

    <div class="card p-4 mb-4">
        <h5>Your Details</h5>
        <p><strong>Name:</strong> {{ $admission->first_name }} {{ $admission->last_name }}</p>
        <p><strong>Email:</strong> {{ $admission->email }}</p>
        <p><strong>Phone:</strong> {{ $admission->phone }}</p>
        <p><strong>Address:</strong> {{ $admission->address }}</p>
        <p><strong>Date of Birth:</strong> {{ $admission->dob }}</p>
        <p><strong>Gender:</strong> {{ $admission->gender }}</p>
        <p><strong>High School Percentage:</strong> {{ $admission->highschool }}</p>
        <p><strong>Intermediate Percentage:</strong> {{ $admission->intermediate }}</p>
        <p><strong>Board:</strong> {{ $admission->board }}</p>
        <p><strong>Department:</strong> {{ $admission->department }}</p>
        <p><strong>Course:</strong> {{ $admission->course }}</p>
    </div>

    <a href="#" onclick="window.print()" class="btn btn-primary">Print</a>
    <a href="{{ route('admission.downloadPdf', $admission->id) }}" class="btn btn-secondary">Download PDF</a>
</div>
@endsection
