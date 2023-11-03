@extends('layout.admin')

@section('content')
    <div class="show_content">
        <div class="p-5 bg-dark text-light rounded-0">
            <h1 class="text-center">Comic #{{ $comic->id }}</h1>
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">{{ $comic->title }}</h1>
                <p class="col-md-8 fs-4">{{ $comic->description }}</p>
                {{-- <button class="btn btn-primary btn-lg" type="button">Example button</button> --}}
                <a href="{{ route('comics.index') }}" class="btn btn-primary btn-lg" type="button">Back to Collection!</a>
                <a class="btn btn-warning btn-lg" href="{{ route('comics.edit', $comic->id) }}">Edit</a>
            </div>
        </div>
        <div class="container d-flex py-3">
            @if (str_contains($comic->thumb, 'http'))
                <img class="h-100 object-fit-cover" src="{{ $comic->thumb }}">
            @else
                <img class="h-100 object-fit-cover" src="{{ asset('storage/' . $comic->thumb) }}">
            @endif
            <div class="row row-cols-2 w-100 info">
                <div class="col-12">
                    <h4><strong>Type: </strong> {{ $comic->type }}</h4>
                    <h4><strong>Series: </strong> {{ $comic->series }}</h4>
                    <h4><strong>Sale Date: </strong> {{ $comic->sale_date }}</h4>
                    <h4><strong>Price: </strong> {{ $comic->price }} €</h4>
                </div>
            </div>
        </div>
    </div>
@endsection