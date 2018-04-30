@extends('layouts.app')

@push('script-head')
    <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=5g5faf78gvk6yfq9bd3bbfjo858kjx1q8o0nbiwtygo2e4er"></script>
    <script>tinymce.init({ selector:'textarea', branding: false });</script> -->
@endpush

@section('content')
<div class="featured-image" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeGYabOnW8fIZNTjACJfzgS82zLD92t7jZhYnILf7yRjgcFI6a');"></div>
<div class="container post-content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-body">

                    @include('partials._breadcrumbs')

                    <h1 class="mb-5 mt-5 text-center">{{ $post->title }}</h1>

                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div>
            
            @include('partials._comments')

        </div>
    </div>
</div>

@endsection
