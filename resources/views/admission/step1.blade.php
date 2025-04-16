@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Step 1: Personal Details</h2>

    <form action="{{ route('admission.step1') }}" method="POST">
        @csrf
        <div class="card p-4 mb-4">
            <h5>Enter Your Personal Details</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" id="dob" name="dob" class="form-control" value="{{ old('dob') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label d-block">Gender</label>
                <div class="form-check form-check-inline">
                    <input type="radio" id="male" name="gender" value="Male" class="form-check-input" {{ old('gender') == 'Male' ? 'checked' : '' }} required>
                    <label for="male" class="form-check-label">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="female" name="gender" value="Female" class="form-check-input" {{ old('gender') == 'Female' ? 'checked' : '' }}>
                    <label for="female" class="form-check-label">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="other" name="gender" value="Other" class="form-check-input" {{ old('gender') == 'Other' ? 'checked' : '' }}>
                    <label for="other" class="form-check-label">Other</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Permanent Address</label>
                <textarea id="address" name="address" rows="3" class="form-control" required>{{ old('address') }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Next Step</button>
    </form>
</div>
@endsection
