<?php

namespace App\Services;

use App\Http\Resources\Books\BooksCollection;
use App\Http\Resources\Books\BooksResource;
use App\Interfaces\BooksInterface;
use App\Models\Book;
use App\Models\Comparison;
use App\Models\Rating;
use Illuminate\Support\Facades\Log;

class BooksService implements BooksInterface
{
    public function index($request)
    {
        $limit = 12;
        if ($request->query('limit') != null)
            $limit = $request->query('limit');
        $page = 1;
        if ($request->query('page') != null)
            $page = $request->query('page');

        $books = Book::paginate($limit, ['*'], 'page', $page);
        return ['msg' => 'Here are all books', 'statusCode' => 200, 'data' => new BooksCollection($books)];
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return ['msg' => 'retrived Successfully', 'statusCode' => 200, 'data' => BooksResource::make($book)];
    }

    public function store($request)
    {
    }

    public function update($request, $id)
    {
    }

    public function destroy($request, $id)
    {
    }

    public function makeComparisons($request)
    {
        $bookIds = $request->books;

        if (count($bookIds) != 2) {
            return $this->response('Please, select only 2 books', 400);
        }

        $books = Book::findMany($bookIds);

        if (!$this->validateBooks($books)) {
            return $this->response('Invalid book selection', 400);
        }

        $comparison = $this->createComparison($books[0], $books[1]);

        if ($comparison) {
            if ($rate = $this->addRating($comparison->id, $request->similarity_rating)) {
                return $this->response('Rate Added Successfully.', 201, $rate);
            }
        }

        return $this->response('Failed to add rate', 500);
    }

    private function response($message, $statusCode, $data = null)
    {
        return [
            'msg' => $message,
            'statusCode' => $statusCode,
            'data' => $data,
        ];
    }

    private function validateBooks($books)
    {
        return count($books) == 2 && $books[0] !== null && $books[1] !== null;
    }

    private function createComparison($book1, $book2)
    {
        return Comparison::create([
            'user_id' => auth()->user()->id,
            'book1_id' => $book1->id,
            'book2_id' => $book2->id,
        ]);
    }

    private function addRating($comparisonId, $similarityRating)
    {
        return Rating::create([
            'comparison_id' => $comparisonId,
            'similarity_rating' => $similarityRating,
        ]);
    }
}
