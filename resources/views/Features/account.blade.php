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

      <h1 class="mb-4 text-center">List Account</h1>
  
      <!-- Tombol Tambah dokumen -->
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addaccountmodal">
          Add Account
      </button>
  
      <!-- Tabel Daftar Dokumen -->
      <div class="table-responsive">
          <table class="table table-bordered table-hover">
              <thead class="table-secondary">
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Role</th>
                      <th scope="col" class="text-center">Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($accounts as $acc)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>
                             {{ $acc->name }}
                          </td>
                          <td>
                             {{ $acc->email }}
                          </td>
                          <td>
                             {{ $acc->role }}
                          </td>
                          <td class="text-center">
                              <!-- Tombol Hapus -->
                              <form action="{{ route('account.destroy', $acc->id) }}" method="POST" style="display: inline-block;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus akun ini?')">
                                      Delete
                                  </button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
  
  <div class="modal fade" id="addaccountmodal" tabindex="-1" aria-labelledby="addaccountlabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="addaccountlabel">Add Account</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ route('account.store') }}" method="POST">
                  @csrf
                  <div class="modal-body">
                      <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" name="name" class="form-control" id="name" required>
                      </div>
                      <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" id="email" required>
                      </div>
                      <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="password" required>
                      </div>
                      <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                    </div>
                    
                      <label for="role" class="form-label">Role</label>
                      <select name="role" id="role" class="form-control" required>
                        <option value="">Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="superadmin">Super Admin</option>
                      </select>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Add Account</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
@endsection