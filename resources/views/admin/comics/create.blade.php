@extends('layout.admin')


@section('content')

<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{route('comics.store')}}" method="POST" enctype="multipart/form-data">

        <!-- // Attention to Cross site request forgery attacks -->
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            
            {{-- required value="{{  old('name') }} per mantenere i dati scritti in caso di errore --}}
            <input type="text" class="form-control" name="title" id="name" aria-describedby="helpId" placeholder="Comic" required value="{{  old('title') }}">
            
            <small id="nameHelper" class="form-text text-muted">Type the name here</small>
            @error('title')
                <div class="text-danger"> {{$message}} </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="00.00">
            <small id="priceHelper" class="form-text text-muted">Type the price here</small>
            @error('price')
                <div class="text-danger"> {{$message}} </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="thumb" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="thumb" id="thumb" placeholder="" aria-describedby="thumb_helper">
            <div id="thumb_helper" class="form-text">Upload an image for the current product</div>
        </div>


        <button type="submit" class="btn btn-primary">
            Save
        </button>


    </form>

</div>


@endsection