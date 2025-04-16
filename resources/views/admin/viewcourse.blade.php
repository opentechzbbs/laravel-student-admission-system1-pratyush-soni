@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-center align-items-center">
    <div class="card col-12 m-3">
        <div class="card-header">
            <form>
                <div class="row">
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <h4>Search Courses by Department</h4>
                    </div>
                    <div class="col-8">
                        <select class="form-control" name="department" id="department">
                            <option selected disabled>-- Select Department --</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Description</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody id="coursetable">
                    <tr>
                        <td colspan="7">Select a department to view courses.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="courseModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="courseForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="update_id" name="id">
                <div class="modal-header">
                    <h5 class="modal-title">Update Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row">
                    <div class="col-md-6">
                        <label>Department</label>
                        <select class="form-control" id="update_cat" name="department_id" required>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        <label>Course Name</label>
                        <input type="text" class="form-control" id="update_name" name="course_name" required>
                       </div>
                    <div class="col-md-6">
                        <label>Description</label>
                        <input type="text" class="form-control" id="update_brand" name="brand" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="save_update" class="btn btn-primary">Save</button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Pass base URL to JS -->
<script>
    const baseUrl = "{{ url('/courses') }}";

    $(document).ready(function () {

        // Load Courses on department change
        $('#department').on('change', function () {
            let departmentId = $(this).val();
            $.ajax({
                url: "{{ route('course.by.department') }}",
                method: "GET",
                data: {
                    department_id: departmentId
                },
                success: function (courses) {
                    let data = '';
                    if (courses.length > 0) {
                        courses.forEach((p, index) => {
                            data += `<tr>
                                <td>${index + 1}</td>
                                <td>${p.name}</td>
                                <td>${p.description}</td>
                               <td><button class='btn btn-danger btn-sm delete-btn' data-id='${p.id}'>Delete</button></td>
                                <td>
                                    <button class='btn btn-warning btn-sm edit-btn'
                                        data-id='${p.id}'
                                        data-name='${p.name}'
                                        data-des='${p.description}'
                                        data-department='${p.department_id}'
                                        data-bs-toggle='modal'
                                        data-bs-target='#courseModal'>Update</button>
                                </td>
                            </tr>`;
                        });
                    } else {
                        data = `<tr><td colspan="7">No courses found in this department.</td></tr>`;
                    }
                    $('#coursetable').html(data);
                }
            });
        });

        // Fill Update Modal
        $(document).on("click", ".edit-btn", function () {
            $('#update_id').val($(this).data('id'));
            $('#update_name').val($(this).data('name'));
            $('#update_brand').val($(this).data('des'));
            $('#update_cat').val($(this).data('department')).change();
            });

        // Submit Update
        $('#courseForm').on('submit', function (e) {
            e.preventDefault();
            let id = $('#update_id').val();
            let formData = new FormData(this);

            $.ajax({
                url: `${baseUrl}/${id}`,
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function () {
                    $('#courseModal').modal('hide');
                    $('#department').trigger('change'); // reload course list
                },
                error: function (xhr) {
                    alert('Update failed.');
                    console.log(xhr.responseText);
                }
            });
        });

        // Reset modal on close
        $('#courseModal').on('hidden.bs.modal', function () {
            $('#courseForm')[0].reset();
            $('#image_preview').addClass('d-none');
        });

        // Delete Course
        $(document).on('click', '.delete-btn', function () {
            let id = $(this).data('id');
            if (confirm('Are you sure?')) {
                $.ajax({
                    url: `${baseUrl}/${id}`,
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function () {
                        $('#department').trigger('change');
                    },
                    error: function () {
                        alert('Delete failed');
                    }
                });
            }
        });
    });
</script>

@endsection
