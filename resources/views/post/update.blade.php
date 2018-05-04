@extends('layouts._profile')

@push('script-head')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=5g5faf78gvk6yfq9bd3bbfjo858kjx1q8o0nbiwtygo2e4er"></script>
    <script>tinymce.init({ selector:'#content', branding: false });</script>
@endpush

@section('profile_content')
    <h1 class="mb-5">Update post</h1>

    <form action="{{ route('post.update', [ 'post' => $post->slug ]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('forms._create-post-form')

    </form>
@endsection
