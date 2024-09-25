@extends("layouts.admin.list")
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
        <h3 class="card-title">List Categories</h3> 
        <div class="card-options">
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn">Create Category</a>
        </div> 
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                <thead>
                    <tr>
                        <th class="wd-15p">#</th>
                        <th class="wd-20p">Name</th>
                        <th class="wd-25p" width="300px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key=>$category)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('categories.edit', [$category->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                            <a class="btn btn-sm btn-danger frmsubmit" href="{{route('categories.destroy',[$category->id])}}" method="DELETE"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection