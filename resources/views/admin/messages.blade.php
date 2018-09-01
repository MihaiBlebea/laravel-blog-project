@extends('layouts._admin')

@section('admin_panel')

@include('partials.titles._page-title', ['title' => 'Messages', 'subtitle' => 'Manage messages'])

<div class="card">
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col"><i class="fa fa-eye"></i></th>
                    <th scope="col"><i class="fa fa-trash"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $index => $message)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->read ? 'Read' : 'Not read'}}</td>
                        <td>
                            <a href="{{ route('message.read', ['message' => $message->id ]) }}">
                                Read
                            </a>
                        </td>
                        <td>
                            <a class="text-danger" href="{{ route('message.delete', ['message' => $message->id ]) }}">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row mt-3 justify-content-center">
    {{ $messages->links() }}
</div>
@endsection
