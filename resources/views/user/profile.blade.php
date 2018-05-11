@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">

                    @include('partials._page-title', [
                        'title'    => $user->first_name . ' ' . $user->last_name,
                        'subtitle' => $user->email
                    ])

                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-image-wrapper mb-2 mr-3" style="background-image: url('{{ public_upload_path($user->profile_image) }}');"></div>
                        </div>
                        <div class="col-md-8">
                            <strong>{{ $user->profile->short_description }}</strong>
                        </div>
                    </div>
                    <hr class="mb-4">

                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            {!! $user->profile->description !!}
                        </div>
                    </div>
                    <hr class="mb-4">

                    <h3>Read my posts...</h3>
                    <div class="row">
                        @foreach($user->posts as $post)

                            <div class="col-md-6">
                                @include('partials._post-card')
                            </div>

                        @endforeach
                    </div>
                    <hr class="mb-4">

                    <h3>More information...</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Email: {{ $user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
