<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\V1\BookResource;

class BookController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     */
    public function index()
    {
        $book = Book::all();
        return response()->json($book);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $book = new Book;
        $book->user_id = $request->user_id;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->save();
        $data = [
            'message' => 'Libro creado satisfactoriamente',
            'Libro' => $book
        ];
        return response()->json($data);
    }

    /**
     * Mostrar el recurso especificado.
     */
    public function show(Book $book)
    {
        $data = [
            'book' => $book
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->title = $request->title;
        $book->description = $request->description;
        $book->save();
        $data = [
            'message' => 'Libro editado satisfactoriamente',
            'book' => $book
        ];
        return response()->json($data);
    }

    /**
     * Quite el recurso especificado del almacenamiento.
     * 
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        $data = [
            'message' => 'Libro eliminado satisfactoriamente',
            'book' => $book
        ];
        return response()->json($data);
    }
}
