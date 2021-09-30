@extends('layouts.default')

@section('content')
    @parent
    <div class="container px-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Добавьте книгу</h1>
        </div>

        @if($errors->any())
            <div class='alert alert-danger'>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        <form action="{{route('add')}}" method='post' enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-group my-3">
                    <label for="title">Название</label>
                    <input type="text" name="title" placeholder="Введите название" id="title" class="form-control">
                </div>
                <div class="form-group my-3">
                    <label for="author">Автор:</label>
                    <input type="text" name="author" placeholder="Введите автора" id="author" class="form-control">
                </div>
                <div class="form-group my-3">
                    <label for="description">Описание:</label>
                    <input type="text" name="description" placeholder="Введите описание" id="description" class="form-control">
                </div>
                <div class="form-group my-3">
                    <label for="image">Прикрепите обложку:</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group my-3">
                    <label for="file">Прикрепите файл книги:</label>
                    <input type="file" name="file" placeholder="Введите пароль" id="file" class="form-control">
                </div>

            </div>
            <button type="submit" class="btn btn-success my-3">Добавить</button>
        </form>
    </div>
@endsection
