@extends('layouts.app')
@section('content')
<div class="container my-4">
    <div class="border rounded p-3 bg-light">
        <!-- Add/Edit department Form -->
        <div class="border rounded p-4 mb-3 bg-white shadow-sm">
            <form id="department-form" class="w-75 mx-auto">
                @csrf
                <input type="hidden" id="department_id" name="department_id">
                <h5 class="mb-3" id="form-title">Add New department</h5>
                <div class="input-group mb-3">
                    <input id="name" name="name" type="text" class="form-control" placeholder="Enter department name" required>
                    <button type="submit" id="submit-btn" class="btn btn-success">Add</button>
                </div>
                <div id="form-feedback" class="text-danger small"></div>
            </form>
        </div>

        <!-- department List -->
        <div class="border rounded-3 p-3 bg-white shadow-sm" style="max-height: 400px; overflow-y: auto;">
            <h5 class="mb-3">All departments</h5>
            <ul class="list-group list-group-flush" id="department-list">
                @foreach($departments as $department)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="department-name" data-id="{{ $department->id }}">{{ $department->name }}</span>
                        <div>
                            <button class="btn btn-sm btn-primary edit-btn" data-id="{{ $department->id }}" data-name="{{ $department->name }}">Edit</button>
                            <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $department->id }}">Delete</button>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
$(document).ready(function () {
    // ADD or UPDATE department
    $('#department-form').on('submit', function (e) {
        e.preventDefault();
        let id = $('#department_id').val();
        let name = $('#name').val();
        let url = id ? `/department/${id}` : `{{ route('department.store') }}`;
        let method = id ? "PUT" : "POST";

        $.ajax({
            url: url,
            method: method,
            data: {
                name: name,
                _token: '{{ csrf_token() }}',
                _method: method
            },
            success: function () {
                location.reload();
            },
            error: function (xhr) {
                let error = xhr.responseJSON.errors?.name?.[0] ?? 'Something went wrong.';
                $('#form-feedback').text(error);
            }
        });
    });

    // EDIT department
    $('.edit-btn').on('click', function () {
        let id = $(this).data('id');
        let name = $(this).data('name');
        $('#department_id').val(id);
        $('#name').val(name);
        $('#form-title').text('Edit department');
        $('#submit-btn').removeClass('btn-success').addClass('btn-warning').text('Update');
    });

    // DELETE department
    $('.delete-btn').on('click', function () {
        let id = $(this).data('id');
        if (confirm('Are you sure you want to delete this department?')) {
            $.ajax({
                url: `/department/${id}`,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function () {
                    location.reload();
                },
                error: function () {
                    alert('Delete failed.');
                }
            });
        }
    });
});
</script>
@endsection
