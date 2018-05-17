@extends('layouts._admin')

@push('script-head')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=5g5faf78gvk6yfq9bd3bbfjo858kjx1q8o0nbiwtygo2e4er"></script>
<script>tinymce.init({ selector:'#description', branding: false });</script>
@endpush

@section('admin_panel')

    @include('partials._page-title', ['title' => 'New post', 'subtitle' => 'show your skills'])

    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('forms._create-post-form')

        <vue-editor-wrapper :draft-id="'{{ json_encode($draft_id) }}'"
                            :init-content="'{{ isset($post->content) ? json_encode($post->content) : '' }}'">
        </vue-editor-wrapper>

    </form>
@endsection

@push('javascript')
    <script src="{{ asset('js/image-upload-helper.js') }}"></script>
@endpush
