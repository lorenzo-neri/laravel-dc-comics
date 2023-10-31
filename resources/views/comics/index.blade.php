@extends ('layout.app')
@section ('content')
<main class=""></main>
    <div class="container">
        <div class="row">
            @foreach($comics as $key => $comic)
                <div class="col">
                    {{$comic['title']}}
                </div>
            @endforeach
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</main>
<!-- /. -->
@endsection