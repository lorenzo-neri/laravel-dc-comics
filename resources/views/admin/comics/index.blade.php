@extends ('layout.admin')
@section ('content')
<main class="bg-dark">

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

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalId-{{$comic->id}}">
                                        Delete
                                    </button>
                                    
                                    <div class="modal fade" id="modalId-{{$comic->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalId-{{$comic->id}}" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId-{{$comic->id}}">Modal title id: {{$comic->id}}</h5>
                                          </div>
                                          <div class="modal-body">
                                            Attenzione! Sicuro di voler eliminare?
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal">
                                                annulla &times;
                                            </button>
                                            {{-- non confondere destroy con delete --}}
                                            <form action="{{route ('comics.destroy', $comic->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    


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