<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeComparisonsRequest;
use App\Interfaces\BooksInterface;
use Illuminate\Http\Request;

class BookController extends AppBaseController
{
    private BooksInterface $bookInterface;

    public function __construct(BooksInterface $bookInterface)
    {
        $this->bookInterface = $bookInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $data = $this->bookInterface->index($request);
            return $this->sendResponse(
                $data['data'],
                $data['msg'],
                200,
                0
            );
        } catch (\Exception $e) {
            return $this->sendResponse(
                null,
                $e->getMessage(),
                500,
                1
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data = $this->bookInterface->show($id);
            return $this->sendResponse(
                $data['data'],
                $data['msg'],
                200,
                0
            );
        } catch (\Exception $e) {
            return $this->sendResponse(
                null,
                $e->getMessage(),
                500,
                1
            );
        }
    }

    /**
     * Make a Comparisons between 2 books.
     *
     * @param  \Illuminate\Http\Client\Request $request
     * @return \Illuminate\Http\Response
     */
    public function makeComparisons(MakeComparisonsRequest $request)
    {
        try {
            $data = $this->bookInterface->makeComparisons($request);
            return $this->sendResponse(
                $data['data'],
                $data['msg'],
                200,
                0
            );
        } catch (\Exception $e) {
            return $this->sendResponse(
                null,
                $e->getMessage(),
                500,
                1
            );
        }
    }
}
