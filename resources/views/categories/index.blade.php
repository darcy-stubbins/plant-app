@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="row gap-2 justify-content-center">
            @foreach ($categories as $category)
                <div class="card p-0" style="width: 30rem">
                    <img src="{{ $category->picture_source }}" class="rounded mb-2 card-img-top">
                    <a class="h5 card-title m-2 text-decoration-none"
                        href="/categories/{{ $category->id }}">{{ $category->name }}</a>
                    <h6 class="card-subtitle mx-2 mb-3 text-muted">{{ $category->description }}</h6>
                </div>
            @endforeach
        </div>
    </div>
@endsection
