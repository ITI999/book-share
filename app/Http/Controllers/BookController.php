<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function add(Request $req){
        $req->validate([
            "file" => 'required'
        ]);
        $formFields = $req->only(['title','author','description','image','file']);
        if(isset($formFields['image'])){
            $path = $req->file('image')->store('uploads','public');
            $formFields['image'] = $path;
        }
        if(isset($formFields['file'])){
            $path = $req->file('file')->store('uploads','public');
            $formFields['file'] = $path;
        }
        $formFields['user_id'] = Auth::id();
        if(Book::create($formFields)){
            return redirect(route('private'));
        }

        return redirect(route('add'))->withErrors([
            'add' => 'Не удалось добавить'
        ]);
    }

    public function getAllBooks(Request $req){
        $books = Book::all();
        return view("/books",['books' => $books]);
    }

    public function getUserBooks(Request $req){
        $books = Book::where('user_id',Auth::id())->get();
        return view("/books",['books' => $books]);
    }

    public function search(Request $req){
        $query = $req['query'];
        $books = Book::where('title','regexp',".*".$query.".*")->get();
        return view("/books",['books' => $books]);
    }

    public function delete(Request $req, $id){
        Book::where('user_id',Auth::id())->where('id',$id)->delete();
        return redirect(route('private'));
    }
}
