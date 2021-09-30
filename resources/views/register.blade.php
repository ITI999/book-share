@extends('layouts.default')

@section('content')
    @parent

    <div class="container px-5">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Зарегистрируйтесь</h1>
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
    <form action="{{route('register')}}" method='post'>
        @csrf
        <div class="form-group">
            <div class="form-group my-3">
                <label for="email">Email:</label>
                <input type="text" name="email" placeholder="Введите email" id="email" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="password">Пароль:</label>
                <input type="text" name="password" placeholder="Введите пароль" id="password" class="form-control">
            </div>

        </div>
        <button type="submit" class="btn btn-success my-3">Отправить</button>
    </form>
    </div>
@endsection

