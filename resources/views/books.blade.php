@extends('layouts.default')

@section('title-block')Главная страница@endsection

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @if(isset($books))
                @foreach($books as $book)
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" src="{{asset('/storage/'.($book['image'] ?? 'uploads/default.jpg'))}}" width="100%" height="450" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text class="px-3 h4" x="50%" y="50%" fill="#eceeef"  dy=".3em">{{$book['title']}}</text></img>

                        <div class="card-body">
                            <p class="card-text">{{$book['description']}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    @if(\Request::getRequestUri() == "/user/books")
                                        <form action="/user/books/{{$book['id']}}" method="POST">
                                            @method("DELETE")
                                            @csrf
                                            <button class="btn btn-sm btn-outline-secondary">Delete</button>
                                        </form>
                                    @endif
                                    <a href="{{asset('/storage/'.($book['file'] ?? 'uploads/default.jpg'))}}" class="btn btn-sm btn-outline-secondary">File</a>
                                </div>
                                <small class="text-muted">Author: {{$book['author']}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
