@extends('layouts._admin')

@section('admin_panel')

    @include('partials.titles._page-title', ['title' => 'Create new language entry', 'subtitle' => 'add a new language skill'])

    <div class="row justify-content-center">
        <div class="card col-md-8">
            <div class="card-body">
                <form action="{{ route('language.store') }}" method="POST">
                    @csrf

                    @include('forms._create-language-form')

                    <div class="mt-5">
                        @include('partials._form-button', [
                            'cta' => 'Save',
                        ])
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
