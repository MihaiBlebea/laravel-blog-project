@extends('layouts._admin')

@section('admin_panel')

@include('partials.titles._page-title', ['title' => 'Posts', 'subtitle' => 'Manage posts'])

<div class="card">
    <div class="card-body">

        @include('forms._filter-posts-form')

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ (isset($status) == false) ? 'active' : '' }}" href="{{ route('post.index') }}">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (isset($status) && $status == 'published') ? 'active' : '' }}" href="{{ route('post.index') . '?status=published' }}">Published</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (isset($status) && $status == 'draft') ? 'active' : '' }}" href="{{ route('post.index') . '?status=draft' }}">Drafts</a>
            </li>
        </ul>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col"><i class="fa fa-comments-o" aria-hidden="true"></i></th>
                    <th scope="col">Created</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Publish</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $index => $post)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <a target="_new" href="{{ route('blog.post', ['category' => $post->category->slug, 'post' => $post->slug]) }}">
                                {{ $post->title }}
                            </a>
                        </td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->comments->count() }}</td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td><a href="{{ route('post.update', ['post' => $post->slug]) }}">Update</a></td>
                        <td>
                            <a href="{{ route('post.publish', ['post' => $post->slug]) }}">{{ ($post->status == 'published') ? 'Unpublish' : 'Publish' }}</a>
                        </td>
                        <td>
                            <a class="text-danger" href="{{ route('post.delete', ['post' => $post->slug]) }}">Delete</a>
                        </td>
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
