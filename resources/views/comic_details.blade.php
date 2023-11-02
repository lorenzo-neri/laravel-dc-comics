@extends('layout.app')

@section('content')
    <div class="bg-dark">

    
    <div class="container text-white">
        
        <div class="row justify-content-center">
            
            <div class="col py-5 position-relative">
                
                <div class="col-3 pb-2">
                    <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" style="width: 100%">
                </div>
                
                <div class="row">
                    
                    <div class="col">
                        
                        <h2 class="text-uppercase fw-bold">{{ $comic->title }}</h2>
                        
                        <p>{{ $comic->description }}</p>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    </div>
@endsection