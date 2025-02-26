@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h1>Welcome!</h1>
            @foreach ($types as $type)
                <div class="card">
                    {{ $type->name }}
                </div>
                {{-- <img src="{{ $type->picture_source }}"> --}}
            @endforeach
        </div>
    </div>
@endsection
