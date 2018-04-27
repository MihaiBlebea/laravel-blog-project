@extends('layouts._admin')

@section('admin_panel')
<div class="card">
    <div class="card-header">
        <span class="float-left">Categories</span>
        <button type="button" class="btn btn-sm btn-outline-primary float-right">Add new</button>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Posts</th>
                    <th scope="col">View</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $index => $category)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->posts->count() }}</td>
                        <td><a href="">Open</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row mt-3 justify-content-center">
    {{ $categories->links() }}
</div>
@endsection
