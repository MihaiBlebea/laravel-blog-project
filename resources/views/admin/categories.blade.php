@extends('layouts._admin')

@section('admin_panel')

@include('partials._page-title', ['title' => 'Categories', 'subtitle' => 'Manage categories'])

<div class="card">
    <div class="card-body">

        <ul class="nav mb-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category.store') }}">New category</a>
            </li>
        </ul>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Posts</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $index => $category)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->posts->count() }}</td>
                        <td><a href="{{ route('category.update', ['category' => $category->slug] )}}">Update</a></td>
                        <td><a class="text-danger" href="{{ route('category.delete', ['category' => $category->slug]) }}">Delete</a></td>
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
