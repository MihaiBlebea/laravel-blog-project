@extends('layouts._admin')

@section('admin_panel')

@include('partials._page-title', ['title' => 'Tracking', 'subtitle' => 'See how many views you had today'])

<div class="card">
    <div class="card-body">
        <p>Sort by:
            <a class="text-capitalize" href="{{ route('track.manage', ['sort' => ($sort == 'date') ? 'page' : 'date']) }}">
                {{ $sort }}
            </a>
        </p>

        <!-- Vue Chart component -->
        <vue-chart :api="'/api/v1/tracking?sort={{ $sort }}'"></vue-chart>
        <!-- Vue Chart component -->

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Link</th>
                    <th scope="col">Views</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tracks as $index => $track)
                    <tr class="bg-light text-primary">
                        <th scope="row" colspan="2">{{ $index }}</th>
                        <th scope="row">{{ $totals[$index] }}</th>
                    </tr>

                    @foreach($track as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ ($sort == 'date') ? $item->link : $item->created_at->format('d-M-Y') }}</td>
                            <td>{{ $item->count }}</td>
                        </tr>
                    @endforeach

                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
