@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="container-fluid m-3">
            <h3 class="text-center mb-3">{{ $tag->name }}</h3>
            <h5 class="text-center text-muted mb-3">{{ $tag->description }}</h5>
            <div class="row gap-2 justify-content-center">
                @foreach ($types as $type)
                    <div class="card p-0" style="width: 20rem">
                        <img src="{{ $type->picture_source }}" class="rounded mb-2 card-img-top">

                        {{-- like icon button with form --}}
                        <form action="/like" method="POST">
                            @csrf

                            <input type="hidden" name="type_id" value="{{ $type->id }}">

                            {{-- show either of the like icons (full/empty) depending on if the user has liked the post or not --}}
                            @if (auth()->user()->likes->pluck('type_id')->contains($type->id))
                                <button type="submit" class="btn">
                                    <i class="fa-solid fa-heart px-3"></i>
                                </button>
                            @else
                                <button type="submit" class="btn">
                                    <i class="fa-regular fa-heart px-3"></i>
                                </button>
                            @endif
                        </form>

                        <div class="p-3">
                            <h5>{{ $type->name }}</h5>
                            <h6 class="text-muted">{{ $type->description }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
