@extends ('layout.app')
@section ('content')
<main class="bg-dark">
    <h1 class="text-danger">
        ADMIN
    </h1>
        <div class="container">
            <h4 class="text-muted text-uppercase">All Comics</h4>
            <a class="btn btn-primary position-fixed bottom-0 end-0 m-4" href="{{route('comics.create')}}">Add Comic</a>
    
    
            <div class="card">
    
                <div class="table-responsive-sm ">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
    
    
                            @forelse ($comics as $comic)
                            <tr class="">
                                <td scope="row">{{$comic->id}}</td>
                                <td>
                                    <!--  <img width="100" src="{{$comic->thumb}}" alt=""> -->
                                    <img width="100" src="{{ $comic->thumb }}" alt="">
    
                                </td>
                                <td>{{$comic->title}}</td>
                                <td>
    
                                    <a href="{{route('comics.show', $comic->id)}}" class="btn btn-primary">View</a>
                                    <a href="{{route('comics.edit', $comic->id)}}" class="btn btn-secondary">Edit</a>
    
                                    Delete
                                </td>
                            </tr>
                            @empty
                            <tr class="">
    
                                <td>Oops! No comics yet!</td>
    
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
    
        </div>
    
</main>
<!-- /main -->
@endsection