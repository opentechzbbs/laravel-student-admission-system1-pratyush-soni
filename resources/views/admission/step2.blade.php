@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Step 2: Academic Details</h2>

    <form action="{{ route('admission.step2') }}" method="POST">
        @csrf
        <div class="card p-4 mb-4">
            <h5>Enter Your Academic Information</h5>
            <div class="mb-3">
                <label for="highschool" class="form-label">High School (10th) Percentage</label>
                <input type="text" id="highschool" name="highschool" class="form-control" value="{{ old('highschool') }}" required>
            </div>
            <div class="mb-3">
                <label for="intermediate" class="form-label">Intermediate (12th) Percentage</label>
                <input type="text" id="intermediate" name="intermediate" class="form-control" value="{{ old('intermediate') }}" required>
            </div>
            <div class="mb-3">
                <label for="board" class="form-label">Board Name (12th)</label>
                <input type="text" id="board" name="board" class="form-control" value="{{ old('board') }}" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Next Step</button>
    </form>
</div>
@endsection
