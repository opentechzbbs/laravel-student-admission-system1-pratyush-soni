@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Step 3: Course Selection</h2>

    <form action="{{ route('admission.step3') }}" method="POST">
        @csrf
        <div class="card p-4 mb-4 shadow">
            <h5 class="mb-3">Choose Your Department and Course</h5>

            {{-- Department Dropdown --}}
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <select id="department" name="department" class="form-select @error('department') is-invalid @enderror" required onchange="loadCourses(this.value)">
                    <option value="" disabled selected>Select Department</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ old('department') == $dept->id ? 'selected' : '' }}>
                            {{ $dept->name }}
                        </option>
                    @endforeach
                </select>
                @error('department')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Course Dropdown --}}
            <div class="mb-3">
                <label for="course" class="form-label">Course</label>
                <select id="course" name="course" class="form-select @error('course') is-invalid @enderror" required>
                    <option value="" disabled selected>Select Course</option>
                    {{-- Populated by JS --}}
                </select>
                @error('course')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Next Step</button>
    </form>
</div>
<script>
    const courseSelect = document.getElementById('course');

    function loadCourses(departmentId, selectedCourseId = null) {
        courseSelect.innerHTML = `<option disabled>Loading...</option>`;

        fetch("{{ url('/get-courses-by-department') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ department_id: departmentId })
        })
        .then(response => response.json())
        .then(data => {
            courseSelect.innerHTML = `<option value="" disabled selected>Select Course</option>`;
            data.forEach(course => {
                const selected = selectedCourseId == course.id ? 'selected' : '';
                courseSelect.innerHTML += `<option value="${course.id}" ${selected}>${course.name}</option>`;
            });
        })
        .catch(error => {
            console.error('Error:', error);
            courseSelect.innerHTML = `<option value="" disabled selected>Failed to load courses</option>`;
        });
    }

    // Load old values on page load
    document.addEventListener('DOMContentLoaded', function () {
        const oldDepartment = '{{ old('department') }}';
        const oldCourse = '{{ old('course') }}';
        if (oldDepartment) {
            loadCourses(oldDepartment, oldCourse);
        }
    });
</script>

@endsection


