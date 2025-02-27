@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <h1>Welcome!</h1>
        {{-- tag buttons --}}
        @foreach ($tags as $tag)
            <a class="btn-1" href="/type/tagged/{{ $tag->id }}">{{ $tag->name }}</a>
        @endforeach

        <div class="row gap-2 justify-content-center">
            @foreach ($types as $type)
                <div class="card p-0" style="width: 10rem">
                    <img src="{{ $type->picture_source }}" class="rounded card-img-top">
                </div>
            @endforeach
        </div>
    </div>
@endsection
