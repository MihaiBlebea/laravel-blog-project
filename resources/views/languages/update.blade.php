@extends('layouts._admin')

@section('admin_panel')

    @include('partials.titles._page-title', [
        'title' => 'Update language entry',
        'subtitle' => $language->name
    ])

    <div class="row justify-content-center">
        <div class="card col-md-8">
            <div class="card-body">
                <form action="{{ route('language.update', [ 'language' => $language->id ]) }}" method="POST">
                    @csrf

                    @include('forms._create-language-form')

                    <div class="mt-5">
                        @include('partials._form-button', [
                            'cta' => 'Update',
                        ])
                    </div>

                </form>
            </di>
        </div>
    </div>
    
@endsection
