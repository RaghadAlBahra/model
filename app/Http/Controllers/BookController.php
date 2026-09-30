<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
   public function store(storeBookRequest $request){
    Book::query()->create($request->validated());
    return "successs";
   }

   public function show($id){
    return Book::query()->where('id',$id)->get();
   }

   public function index(){
    return Book::all();
   }

   public function update(Request $request ,$id){
    $book = Book::FindOrFail($id);
    $book->update([
        'title'=>$request->title ?? $book->title,
        'author'=>$request->author ?? $book->author,
        'publication_year'=>$request->publication_year ??$book->publication_year,

    ]);
    return response()->json([
        'message' => 'Book updated successfully!',
        'data' => $book
    ], 200);
   }

   public function destroy($id){
    $book = Book::FindOrFail($id);
    $book->delete();
    return "book deleted successfuly";
   }
}
