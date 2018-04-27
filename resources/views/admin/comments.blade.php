@extends('layouts._admin')

@section('admin_panel')
<div class="card">
    <div class="card-header">
        <span class="float-left">Comments</span>
        <button type="button" class="btn btn-sm btn-outline-primary float-right">Add new</button>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Author</th>
                    <th scope="col">Replies</th>
                    <th scope="col">Read</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $index => $comment)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $comment->subject }}</td>
                        <td>{{ $comment->author->first_name }} {{ $comment->author->last_name }}</td>
                        <td>2</td>
                        <td><a href="">Open</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row mt-3 justify-content-center">
    {{ $comments->links() }}
</div>
@endsection
