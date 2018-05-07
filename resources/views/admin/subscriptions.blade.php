@extends('layouts._admin')

@section('admin_panel')

@include('partials._page-title', ['title' => 'Subscriptions', 'subtitle' => 'Manage subscriptions'])

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Subscribed</th>
                    <th scope="col">Unsubscribe</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscriptions as $index => $subscription)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <a href="{{ route('user.profile', ['user' => $subscription->subscribed->slug ]) }}">
                                {{ $subscription->subscribed->first_name }} {{ $subscription->subscribed->last_name }}
                            </a>
                        </td>
                        <td>{{ $subscription->created_at->diffForHumans() }}</td>
                        <td>
                            <a class='text-danger' href="{{ route('user.unsubscribe', [ 'user' => $subscription->subscribed->slug ]) }}">Unsubscribe</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row mt-3 justify-content-center">
    {{ $subscriptions->links() }}
</div>
@endsection
