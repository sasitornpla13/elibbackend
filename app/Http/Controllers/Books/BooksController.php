<?php

namespace App\Http\Controllers\Books;

use App\Models\Books\Books;
use App\Models\BookCollection\BookCollection;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class BooksController extends BaseController
{
    public function newBooks(Request $request)
    {
        $newResult = new Books;
        $newResult->book_code = $request->book_code;
        $newResult->book_title = $request->book_title;
        $newResult->book_keyword = $request->book_keyword;
        $newResult->book_abstract = $request->book_abstract;
        $newResult->public_start_date = $request->public_start_date;
        $newResult->access_control = $request->access_control;
        $newResult->status = 1;
        $newResult->save();
        return response()->json('200');
    }

    public function updateBooks(Request $request)
    {
        $result_update_books = Books::find($request->id);
        $result_update_books->book_code = $request->book_code;
        $result_update_books->book_title = $request->book_title;
        $result_update_books->book_keyword = $request->book_keyword;
        $result_update_books->book_abstract = $request->book_abstract;
        $result_update_books->public_start_date = $request->public_start_date;
        $result_update_books->access_control = $request->access_control;
        $result_update_books->save();
        return response()->json('200');
    }

    public function deleteBooks($id)
    {
        // $result_books_id = Books::where('id', '=', $id)->delete();
        $result_books_id = Books::find($id);
        $result_books_id->status = 0;
        $result_books_id->save();
        return response()->json('200');
    }

    public function searchAll(Request $request)
    {
        $result_books = Books::where('book_title', 'like', '%' . $request->text . '%')
            ->orWhere('book_keyword', 'like', '%' . $request->text . '%')
            ->orWhere('book_abstract', 'like', '%' . $request->text . '%')
            ->get();
        return response()->json($result_books);
    }

    public function searchByType(Request $request)
    {
        // $result = BookCollection::where('type', $request->type)->where('map_id', $request->id)->get();
        // return response()->json($result);

        // if ($request->year != '0') {
        //     $conditions[] = ['Books.public_start_date', 'like', '%' . $request->year . '%'];
        // }

        // if ($request->department != '0') {
        //     $conditions[] = ['book_collection.map_id', '=', $request->department];
        // }

        // if ($request->country != '0') {
        //     $conditions[] = ['country.', '=', $request->country];
        // }

        // if ($request->text != '0') {
        //     $conditions[] = ['Books.book_title.', 'like', '%' . $request->text . '%'];
        //     $conditions[] = ['Books.book_keyword.', 'like', '%' . $request->text . '%'];
        //     $conditions[] = ['Books.book_abstract.', 'like', '%' . $request->text . '%'];
        // }

        // $result = BookCollection::where($conditions)
        //     ->leftJoin('Books', 'book_collection.book_id', '=', 'Books.id')
        //     ->get();
        // return response()->json($result);
    }

}
