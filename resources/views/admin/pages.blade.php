@extends('layouts._admin')

@section('admin_panel')

@include('partials.titles._page-title', ['title' => 'Pages', 'subtitle' => 'Manage pages'])

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Type</th>
                    <th scope="col">Publish</th>
                    <th scope="col">Preview</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $index => $page)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $page->name }}</td>
                        <td>{{ $page->slug }}</td>
                        <td>{{ $page->type }}</td>
                        <td><a href="{{ route('page.publish', ['page' => $page->slug]) }}">{{ ($page->published == true) ? 'Unpublish' : 'Publish' }}</a></td>
                        <td>
                            <a href="{{ route('page.get', ['type' => $page->type, 'page' => $page->slug]) }}">
                                Preview
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row mt-3 justify-content-center">
    {{ $pages->links() }}
</div>
@endsection
