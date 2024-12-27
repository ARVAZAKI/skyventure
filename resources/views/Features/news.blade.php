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

    <h1 class="mb-4 text-center">News Management</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addNewsModal">
        Add News
    </button>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-secondary">
                <tr>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Date</th>
                    <th scope="col">Author</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($news as $item)
                <tr>
                    <td class="text-center">
                        <img 
                        src="{{ asset('storage/img/news/' . $item->image) }}" 
                        alt="Image" 
                        class="img-thumbnail" 
                        style="width: 100px; height: 100px; object-fit: cover;">
                    </td>
                    <td>{{ $item->news_title }}</td>
                    <td>{!! $item->news_content !!}</td>     
                   <td>{{ \Carbon\Carbon::parse($item->news_date)->format('d F Y') }}</td>
                    <td>{{ $item->news_author }}</td>
                    <td class="text-center">
                        <button class="btn btn-primary btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#editNewsModal{{ $item->id }}">
                            Edit
                        </button>
                        <form action="{{ route('news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Edit News Modal -->
                <!-- Edit News Modal -->
<div class="modal fade" id="editNewsModal{{ $item->id }}" tabindex="-1" aria-labelledby="editNewsLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNewsLabel{{ $item->id }}">Edit News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('news.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="news_title" class="form-label">Title</label>
                        <input type="text" name="news_title" class="form-control" value="{{ $item->news_title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="news_content{{ $item->id }}" class="form-label">Content</label>
                        <textarea name="news_content" id="news_content{{ $item->id }}" class="form-control">{{ $item->news_content }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="news_date" class="form-label">Date</label>
                        <input type="date" name="news_date" class="form-control" value="{{ $item->news_date }}" required>
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
                    <td colspan="6" class="text-center">No News Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add News Modal -->
<!-- Add News Modal -->
<div class="modal fade" id="addNewsModal" tabindex="-1" aria-labelledby="addNewsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewsLabel">Add News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="news_title" class="form-label">Title</label>
                        <input type="text" name="news_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="news_content" class="form-label">Content</label>
                        <textarea name="news_content" id="news_content" class="form-control">{{ old('news_content') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="news_date" class="form-label">Date</label>
                        <input type="date" name="news_date" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add News</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>

<script>
   document.addEventListener('DOMContentLoaded', function() {
    // Function to initialize CKEditor with custom configuration
    function initCKEditor(element) {
        return ClassicEditor
            .create(element, {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload'],
            })
            .then(editor => {
                // Store editor instance in the form
                element.editor = editor;
                
                // Update hidden textarea before form submission
                const form = element.closest('form');
                if (form) {
                    form.addEventListener('submit', function() {
                        element.value = editor.getData();
                        element.style.display = 'block';
                        element.removeAttribute('required');
                    });
                }
            })
            .catch(error => {
                console.error(error);
            });
    }

    // Initialize for Add News form
    const addNewsTextarea = document.querySelector('#news_content');
    if (addNewsTextarea) {
        initCKEditor(addNewsTextarea);
    }

    // Initialize for Edit News forms
    document.querySelectorAll('[id^="news_content"]').forEach(element => {
        if (element.id !== 'news_content') {
            initCKEditor(element);
        }
    });
});
</script>

@endsection
