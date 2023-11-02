@extends ('layout.app')
@section ('content')
<main class="bg-dark">
    <div class="container">
        <div class="row row-cols-4">
            @foreach($comics as $key => $comic)
                <div class="col p-3">
                    <div style="width: 280px; height: 650px; overflow:auto" class="card">
                      <img style="width:;" src="{{$comic['thumb']}}" class="" alt="{{$comic['title']}}">
                        <div class="card-body">       
                            <div class="card-title">{{$comic['title']}}</div>
                            <div class="card-subtitle mb-2 text-muted">{{$comic['series']}}</div>
                            <div class="card-subtitle mb-2 text-muted">{{$comic['price']}}</div>
                            <div class="card-subtitle mb-2 text-muted">{{$comic['sale_date']}}</div>
                            <div class="card-subtitle mb-2 text-muted">{{$comic['type']}}</div>
                            <div class="card-subtitle mb-2 text-muted">Artists: {{$comic['artists']}}</div>
                            <div class="card-subtitle mb-2 text-muted">Writers: {{$comic['writers']}}</div>
                        </div>
                        <a class="btn btn-danger" href="{{ route('guests.comics.show', $comic->id) }}">
                            Scopri di più
                        </a>
                    </div>
                    {{-- .card --}}
                    
                </div>
            @endforeach
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</main>
<!-- /. -->
@endsection