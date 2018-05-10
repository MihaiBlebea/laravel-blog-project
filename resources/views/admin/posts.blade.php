@extends('layouts._admin')

@section('admin_panel')

@include('partials._page-title', ['title' => 'Posts', 'subtitle' => 'Manage posts'])

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Created</th>
                    <th scope="col">View</th>
                    <th scope="col">Publish</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $index => $post)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->comments->count() }}</td>
                        <td>{{ $post->created_at->toDateString() }}</td>
                        <td><a target="_new" href="{{ route('blog.post', ['category' => $post->category->slug, 'post' => $post->slug]) }}">Open</a></td>
                        <td>
                            <a href="{{ route('post.publish', ['post' => $post->slug]) }}">{{ ($post->published == true) ? 'Unpublish' : 'Publish' }}</a></td>
                        <td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row mt-3 justify-content-center">
    {{ $posts->links() }}
</div>
@endsection
