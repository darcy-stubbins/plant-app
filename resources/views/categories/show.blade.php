@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="container-fluid m-3">
            <h3>{{ $category->name }}</h3>
            <h6 class="text-muted pb-3">{{ $category->description }}</h6>
            <div class="row gap-2 justify-content-center">
                @foreach ($category->types as $type)
                    <div class="card p-0" style="width: 20rem">
                        <img src="{{ $type->picture_source }}" class="rounded mb-2 card-img-top">
                        <div class="p-3">
                            <h5>{{ $type->name }}</h5>
                            <h6 class="text-muted">{{ $type->description }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
