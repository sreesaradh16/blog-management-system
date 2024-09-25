@extends("layouts.admin.list")
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
        <h3 class="card-title">List Posts</h3>
        <div class="card-options">
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn">Create Post</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                <thead>
                    <tr>
                        <th class="wd-15p">#</th>
                        <th class="wd-20p">title</th>
                        <th class="wd-20p">description</th>
                        <th class="wd-20p">tags</th>
                        <th class="wd-20p">image</th>
                        <th class="wd-25p" width="300px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $key=>$post)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->tags->pluck('name')->implode(', ') }}</td>
                        <td><img src="{{ $post->image_url }}" alt="" width="50px;"></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('posts.edit', [$post->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                            <a class="btn btn-sm btn-danger frmsubmit" href="{{route('posts.destroy',[$post->id])}}" method="DELETE"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection