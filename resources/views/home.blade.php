@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container pb-3">
        <h1 class="text-center">Welcome!</h1>
        <h4 class="text-center text-muted">You can browse all plants here or sort them via the tags below.</h4>
        {{-- tag buttons --}}
        <div class="text-center">
            <div class="btn-group py-3" role="group">
                @foreach ($tags as $tag)
                    <a class="btn-1" href="/type/tagged/{{ $tag->id }}">{{ $tag->name }} <i
                            class="{{ $tag->icon }}"></i></a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row gap-2 justify-content-center">
            @foreach ($types as $type)
                <div class="card p-0" style="width: 15rem">
                    <img src="{{ $type->picture_source }}" class="rounded card-img-top">
                    <p class="text-center h6 pt-2">{{ $type->name }}</p>
                    {{-- tag icons --}}
                    <div class="text-center pb-2">
                        @foreach ($type->tags as $tag)
                            <i class="{{ $tag->icon }}"></i>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
