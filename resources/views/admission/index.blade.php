@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Admission List</h2>

    <div class="mb-3">
        <a href="{{route('admission.step1')}}" class="btn btn-primary btn-lg">Add New Admission</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Highschool</th>
                    <th>Intermediate</th>
                    <th>Board</th>
                    <th>Department</th>
                    <th>Course</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($admissions as $index => $admission)
                    <tr>
                        <td>{{ $admissions->firstItem() + $index }}</td>
                        <td>{{ $admission->first_name }} {{ $admission->last_name }}</td>
                        <td>{{ $admission->dob }}</td>
                        <td>{{ ucfirst($admission->gender) }}</td>
                        <td>{{ $admission->email }}</td>
                        <td>{{ $admission->phone }}</td>
                        <td>{{ $admission->address }}</td>
                        <td>{{ $admission->highschool }}</td>
                        <td>{{ $admission->intermediate }}</td>
                        <td>{{ $admission->board }}</td>
                        <td>{{ $admission->department }}</td>
                        <td>{{ $admission->course }}</td>
                        <td>
                            <a href="{{ route('admissions.edit', $admission->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admissions.destroy', $admission->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this record?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="13" class="text-center">No admissions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
    {!! $admissions->links('vendor.pagination.bootstrap-4') !!}
</div>

</div>
@endsection
