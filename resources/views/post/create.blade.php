@extends("layouts.admin.app")

@section("heading")
<h1 class="page-title">Post</h1>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('posts.index') }}" style="color:#5e2dd8">Post</a></li>
</ol>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="mb-0 card-title">Create Post</h3>
    </div>
    <form action="{{ route('posts.store') }}" method="post" id="post_form" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select class="form-control" name="category_id">
                            <option value="" selected disabled>Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Title">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Tags</label>
                        <select class="form-control select2" name="tags[]" multiple data-placeholder="Select tags">
                            @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-label">Image</div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" placeholder="Description">{{ old('description') }}</textarea> 
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success mt-1">Save</button>
            <a href="{{ route('posts.index') }}" class="btn btn-danger mt-1">Cancel</a>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script>
    initJqueryValidator("#post_form", {
        rules: {
            category_id: "required",
            title: "required",
            image: {
                required: true,
                extension: "jpg|jpeg|png|gif",
                filesize: 1048576
            },
            description: "required",
        },
        messages: {
            category_id: "Category is required",
            title: "Title is required",
            image: {
                required: "Image is required",
                extension: "Only JPG, JPEG, PNG, and GIF formats are allowed",
                filesize: "Image must be less than 1MB"
            },
            description: "Description is required",
        },
    });
</script>
@endpush