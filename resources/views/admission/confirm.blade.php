@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2>Confirm Your Details</h2>

    <div class="card p-4 mb-4">
        <h5>Your Details</h5>
        <p><strong>Name:</strong> {{ session('admission.step1.first_name') }} {{ session('admission.step1.last_name') }}</p>
        <p><strong>Email:</strong> {{ session('admission.step1.email') }}</p>
        <p><strong>Phone:</strong> {{ session('admission.step1.phone') }}</p>
        <p><strong>Address:</strong> {{ session('admission.step1.address') }}</p>
        <p><strong>High School Percentage:</strong> {{ session('admission.step2.highschool') }}</p>
        <p><strong>Intermediate Percentage:</strong> {{ session('admission.step2.intermediate') }}</p>
        <p><strong>Board:</strong> {{ session('admission.step2.board') }}</p>
        <p><strong>Department:</strong> {{ session('admission.step3.department') }}</p>
        <p><strong>Course:</strong> {{ session('admission.step3.course') }}</p>
    </div>

    <form action="{{ route('admission.submit') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Submit Application</button>
    </form>
</div>
@endsection
