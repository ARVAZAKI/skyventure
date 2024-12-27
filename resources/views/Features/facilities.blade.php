@extends('layouts')

@section('content')
<div class="container mt-5">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <h1 class="mb-4 text-center">List Facilities</h1>

    <!-- Tombol Tambah Facility -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addFacilityModal">
        Add Facility
    </button>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-secondary">
                <tr>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col">Facility Name</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($facilities as $facility)
                <tr>
                    <td class="text-center">
                        <img 
                        src="{{ asset('storage/img/facility/' . $facility->image) }}"
                        alt="Foto" 
                        class="img-thumbnail" 
                        style="width: 100px; height: 100px; object-fit: cover;">
                                        </td>
                    <td>{{ $facility->facility_name }}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <!-- Tombol Edit -->
                            <button class="btn btn-primary btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#editFacilityModal{{ $facility->id }}">
                                Edit
                            </button>

                            <!-- Form Hapus -->
                            <form action="{{ route('facility.destroy', $facility->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- Modal Edit Facility -->
                <div class="modal fade" id="editFacilityModal{{ $facility->id }}" tabindex="-1" aria-labelledby="editFacilityLabel{{ $facility->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editFacilityLabel{{ $facility->id }}">Edit Facility</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('facility.update', $facility->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="facility_name" class="form-label">Facility Name</label>
                                        <input type="text" name="facility_name" class="form-control" value="{{ $facility->facility_name }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="3" class="text-center">No Facilities Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Facility -->
<div class="modal fade" id="addFacilityModal" tabindex="-1" aria-labelledby="addFacilityLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addFacilityLabel">Add Facility</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('facility.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="facility_name" class="form-label">Facility Name</label>
                        <input type="text" name="facility_name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Facility</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
