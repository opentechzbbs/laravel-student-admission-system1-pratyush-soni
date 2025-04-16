@extends('layouts.app')
@section('content')

<div class="container my-5 d-flex justify-content-center">
    <div class="card col-10 shadow-lg border-0 rounded-4">
        <div class="card-header bg-dark text-white text-center py-3 rounded-top">
            <h4 class="mb-0">Add New course</h4>
        </div>
        <div class="card-body p-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data" id="addcourseForm">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="Department" class="form-label fw-semibold">Department</label>
                        <select name="department_id" id="Department" class="form-select" required>
                            <option disabled selected>-- Select Department --</option>
                            @foreach($Departments as $Department)
                                <option value="{{ $Department->id }}">{{ $Department->name }}</option>
                            @endforeach
                        </select>
                        @error('Department_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="courseName" class="form-label fw-semibold">course Name</label>
                        <input name="name" type="text" id="courseName" class="form-control" placeholder="Enter course name" required>
                        @error('course_name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="row">
                   

                    <div class="col-md-6 mb-3">
                        <label for="brand" class="form-label fw-semibold">Description</label>
                        <input name="description" type="text" id="brand" class="form-control" placeholder="Enter Description" required>
                        @error('brand') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

              

                <div class="text-center">
                    <button type="submit" id="submit" class="btn btn-primary px-4 py-2">Add course</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Live preview -->
<script>
document.getElementById('courseImage').addEventListener('change', function () {
    const preview = document.getElementById('imagePreview');
    const file = this.files[0];
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('d-none');
    }
});
</script>

@endsection
