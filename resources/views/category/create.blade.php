@extends("layouts.admin.app")

@section("heading")
<h1 class="page-title">Category</h1>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('categories.index') }}" style="color:#5e2dd8">Category</a></li>
</ol>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="mb-0 card-title">Create Category</h3>
    </div>
    <form action="{{ route('categories.store') }}" method="post" id="category_form">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success mt-1">Save</button>
            <a href="{{ route('categories.index') }}" class="btn btn-danger mt-1">Cancel</a>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script>
    initJqueryValidator("#category_form", {
        rules: {
            name: "required",
        },
        messages: {
            name: "Name is required",
        },
    });
</script>
@endpush