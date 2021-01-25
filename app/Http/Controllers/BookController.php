<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function create(Request $request){   
        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->save();
        return response()->json(['book' => $book],200);
    }

    public function index() {
        $books = Book::all();
        return response()->json(['book' => $books],200);
    }

    public function show($id) {
        $book = Book::find($id);
        return response()->json(['book' => $book],200);
    }

    public function update(Request $request,$id) {
        $book = Book::find($id);
        if($request->title) {
            $book->title = $request->title;
        }

        if($request->author) {
            $book->author = $request->author;
        }

        if($request->publisher) {
            $book->publisher = $request->publisher;
        }

        $book->save();
        return response()->json(['book' => $book],200);
    }

    public function destroy($id) {
        $book = Book::find($id);
        $book->delete();
        return response()->json(['Livro deletado com sucesso!'],200);
    }
}
