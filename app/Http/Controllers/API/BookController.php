<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all()->load('publisher');

        return response()->json([
          'status' => 'success',
          'data' => $books
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $rules = [
         'title' => 'required|max:191',
         'author' => 'required|max:191',
         'publisher_id' => 'required|integer|exists:publishers,id',
         'cover' => 'file|image',
         'year' => 'required|integer|min:1900',
         'isbn' => 'required|alpha_num|size:13|unique:books,isbn',
         'price' => 'required|numeric|min:0'
       ];

       $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
         return response()->json($validator->errors(), 422);
       }

       $book = new Book();

       if ($request->hasFile('cover'))
       {
         $cover = $request->file('cover');
         $extension = $cover->getClientOriginalExtension();
         $filename = date('Y-m-d-His') . '_' . $request->input('isbn') . '.' . $extension;

         $path = $cover->storeAs('public/covers', $filename);
         $book->cover = $filename;
       }

       $book->title = $request->input('title');
       $book->author = $request->input('author');
       $book->publisher_id = $request->input('publisher_id');
       $book->year = $request->input('year');
       $book->isbn = $request->input('isbn');
       $book->price = $request->input('price');
       $book->save();

       return response()->json([
         'status' => 'success',
         'data' => $book->load('publisher')
       ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        if($book === null){
          $statusMsg = "Book not found!";
          $statusCode = 404;

        }
         else{
           $book->load('publisher');
           $statusMsg = "success";
           $statusCode = 200;
         }

        return response()->json([
          'status' => $statusMsg,
          'data' => $book
        ], $statusCode);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id)

        if($book === null) {
          return response()->json([
            'status' => 'Book not found!',
            'data' => null
          ], 404);
        }

        $rules = [
          'title' => 'required|max:191',
          'author' => 'required|max:191',
          'publisher_id' => 'required|integer|exists:publishers,id' . $book->id,
          'year' => 'required|integer|min:1900',
          'isbn' => 'required|alpha_num|size:13|unique:books,isbn',
          'price' => 'required|numeric|min:0'
        ];

        $validator = Validator::make($request->all(), $rules);

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->publisher_id = $request->input('publisher_id');
        $book->year = $request->input('year');
        $book->isbn = $request->input('isbn');
        $book->price = $request->input('price');
        $book->save();

        return response()->json([
          'status' => 'success',
          'data' => $book->load('publisher')
        ], 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id)

        if($book === null){
          $statusMsg = "Book not found!";
          $statusCode = 404;

        }
         else{
           $book->delete();
           $statusMsg = "success";
           $statusCode = 200;
         }

        return response()->json([
          'status' => $statusMsg,
          'data' => null
        ], $statusCode);
    }
}
