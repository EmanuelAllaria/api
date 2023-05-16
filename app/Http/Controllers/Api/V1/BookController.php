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
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        returnBookResource::collection(Book::latest()->paginate());
    }

    /**
     * Mostrar el recurso especificado.
     * 
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Quite el recurso especificado del almacenamiento.
     * 
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if($book->delete()) {
            return response()->json([
                'message' => 'Success'
            ], 204);
        }
        return response()->json([
            'message' => 'Not found'
        ], 404);
    }
}
