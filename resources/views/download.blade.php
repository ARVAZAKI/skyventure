@extends('layouts.client')
@section('content')
<div class="container mt-5 mb-5">
    <h1 class="mb-4 text-center">Daftar Dokumen</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">Document Name</th>
                    <th scope="col">File</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($docs as $item)
                <tr>
                    <td>{{ $item->document_name }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="btn btn-sm btn-success">
                            View File
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="text-center">Belum ada dokumen</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div> 
@endsection
