@extends('layouts._admin')

@section('admin_panel')

@include('partials.titles._page-title', ['title' => 'Language', 'subtitle' => 'Display your skills'])

<div class="card">
    <div class="card-body">

        <ul class="nav mb-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('language.store') }}">New language</a>
            </li>
        </ul>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Percentage</th>
                    <th scope="col">Experience years</th>
                    <th scope="col"><i class="fa fa-edit"></i></th>
                    <th scope="col"><i class="fa fa-trash"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach($languages as $index => $language)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $language->name }}</td>
                        <td>{{ $language->percentage }}%</td>
                        <td>{{ $language->experience_years }} years</td>
                        <td>
                            <a href="{{ route('language.update', ['language' => $language->id ]) }}">
                                Edit
                            </a>
                        </td>
                        <td>
                            <a class="text-danger" href="{{ route('language.delete', ['language' => $language->id ]) }}">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
