@extends('layouts._admin')

@section('admin_panel')

@include('partials.titles._page-title', ['title' => 'Message', 'subtitle' => 'Manage messages'])

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card">
            <div class="card-body">
                <p><strong>From:</strong> {{ $message->name }}</p>
                <p><strong>Email:</strong> {{ $message->email }}</p>
                <hr>
                <p>{{ $message->content }}</p>
                <hr>
                <a href="{{ URL::previous() }}" class="btn btn-primary mr-2">Back</a>
                <a href="{{ route('message.delete', [ 'message' => $message->id ]) }}"
                   class="btn btn-danger">Delete</a>
            </div>
        </div>

    </div>
</div>

@endsection
