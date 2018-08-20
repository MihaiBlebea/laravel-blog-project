@extends('layouts._admin')

@section('admin_panel')

@include('partials.titles._page-title', ['title' => 'Social channels'])

<div class="card">
    <div class="card-body">

        <ul class="nav mb-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('schedule.manage') }}">Back to schedules</a>
            </li>
        </ul>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Channel</th>
                    <th scope="col">Status</th>
                    <th scope="col">Connect</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach($channels as $index => $channel)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><span class="text-capitalize">{{ $channel }}</span></td>
                        <td>{{ auth()->user()->hasSocialToken($channel) ? 'Connected' : 'Not connected' }}</td>
                        <td>
                            <a href="{{ route('schedule.add-token', [ 'driver_name' => $channel ]) }}">
                                Connect
                            </a>
                        </td>
                        <td>
                            <a class="text-danger" href="{{ route('schedule.remove-token', [ 'driver_name' => $channel ]) }}">
                                Remove
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
