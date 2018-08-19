@extends('layouts._admin')

@section('admin_panel')

@include('partials.titles._page-title', ['title' => 'Schedule', 'subtitle' => 'Manage schedule'])

<a href="{{ route('schedule.store') }}" class="btn btn-primary mb-3">Add schedule</a>

<div class="row">

    @foreach($schedules as $schedule)

        <div class="col-md-4 mb-4">

            @include('partials.cards._schedule-card')

        </div>

    @endforeach

</div>

<div class="row mt-3 justify-content-center">
    {{ $schedules->links() }}
</div>

@endsection
