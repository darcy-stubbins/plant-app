@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container-fluid">
        <div class="row gap-2 justify-content-center">
            <h2 class="text-center">Hello {{ $user->name }}!</h2>
            <h4 class="text-center text-muted pb-3">Here are all your saved plants:</h4>

            @foreach ($likedTypes as $likedType)
                <div class="card p-0" style="width: 20rem">
                    <img src="{{ $likedType->picture_source }}" class="rounded mb-2 card-img-top">

                    {{-- like icon button with form --}}
                    <form action="/like" method="POST">
                        @csrf

                        <input type="hidden" name="type_id" value="{{ $likedType->id }}">

                        {{-- show either of the like icons (full/empty) depending on if the user has liked the post or not --}}
                        @if (auth()->user()->likes->pluck('type_id')->contains($likedType->id))
                            <button type="submit" class="btn">
                                <i class="fa-solid fa-heart px-3"></i>
                            </button>
                        @else
                            <button type="submit" class="btn">
                                <i class="fa-regular fa-heart px-3"></i>
                            </button>
                        @endif
                    </form>

                    <p class="h5 card-title m-2">{{ $likedType->name }}</p>
                    {{-- tag icons --}}
                    <div class="text-left px-2 pb-3">
                        @foreach ($likedType->tags as $tag)
                            <i class="{{ $tag->icon }}"></i>
                        @endforeach
                    </div>
                    <h6 class="card-subtitle mx-2 mb-3 text-muted">{{ $likedType->description }}</h6>
                </div>
            @endforeach
        </div>
    </div>
@endsection
