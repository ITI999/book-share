<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function signin(Request $req){
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $formFields = $req->only(['email','password']);
        if(Auth::attempt($formFields)){
            return redirect()->intended(route('private'));
        }

        return redirect(route('login'))->withErrors([
            'email' => 'Не удалось авторизоваться'
        ]);

    }

    function register(Request $req){

        if(Auth::check()){
            return redirect(route('books'));
        }

        $validateFields = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:50'
        ]);

        if(User::where('email',$validateFields['email'])->exists()){
            return redirect(route('register'))->withErrors([
                'email' => 'Такой email уже зарегистрирован'
            ]);
        }

        $user = User::create($validateFields);
        if($user){
            Auth::login($user);
            return redirect()->to(route('books'));
        }
        return redirect(route('register'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении пользователя'
        ]);
    }
}
