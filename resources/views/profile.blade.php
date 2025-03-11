@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h2>Hello {{ $user->name }}</h2>
                <h5>Email: {{ $user->email }}</h5>

                <h4>Your Plants:</h4>
                <div class="row gap-2 justify-content-center">
                    @foreach ($likedTypes as $likedType)
                        <div class="card p-0" style="width: 30rem">
                            <img src="{{ $likedType->picture_source }}" class="rounded mb-2 card-img-top">
                            <a class="h5 card-title m-2 text-decoration-none">{{ $likedType->name }}</a>
                            <h6 class="card-subtitle mx-2 mb-3 text-muted">{{ $likedType->description }}</h6>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
