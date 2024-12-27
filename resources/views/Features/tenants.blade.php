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

    <h1 class="mb-4 text-center">List Tenants</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTenantModal">
        Add Tenant
    </button>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-secondary">
                <tr>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col">Tenant Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Website</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tenants as $tenant)
                <tr>
                    <td class="text-center">
                        <img 
                        src="{{ asset('storage/img/tenants/' . $tenant->image) }}"
                        alt="Image" 
                        class="img-thumbnail" 
                        style="width: 100px; height: 100px; object-fit: cover;">
                    </td>
                    <td>{{ $tenant->tenant_name }}</td>
                    <td>{{ $tenant->tenant_description }}</td>
                    <td><a href="{{ $tenant->tenant_website }}" target="_blank">{{ $tenant->tenant_website }}</a></td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#editTenantModal{{ $tenant->id }}">
                            Edit
                        </button>
                        <form action="{{ route('tenant.destroy', $tenant->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Tenant Modal -->
                <div class="modal fade" id="editTenantModal{{ $tenant->id }}" tabindex="-1" aria-labelledby="editTenantLabel{{ $tenant->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editTenantLabel{{ $tenant->id }}">Edit Tenant</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('tenant.update', $tenant->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tenant_name" class="form-label">Tenant Name</label>
                                        <input type="text" name="tenant_name" class="form-control" value="{{ $tenant->tenant_name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tenant_description" class="form-label">Description</label>
                                        <textarea name="tenant_description" class="form-control" required>{{ $tenant->tenant_description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tenant_website" class="form-label">Website</label>
                                        <input type="url" name="tenant_website" class="form-control" value="{{ $tenant->tenant_website }}">
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
                    <td colspan="5" class="text-center">No Tenants Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add Tenant Modal -->
<div class="modal fade" id="addTenantModal" tabindex="-1" aria-labelledby="addTenantLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTenantLabel">Add Tenant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tenant.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="tenant_name" class="form-label">Tenant Name</label>
                        <input type="text" name="tenant_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="tenant_description" class="form-label">Description</label>
                        <textarea name="tenant_description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tenant_website" class="form-label">Website</label>
                        <input type="url" name="tenant_website" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Tenant</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
