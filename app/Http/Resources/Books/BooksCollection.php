<?php

namespace App\Http\Resources\Books;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BooksCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "current_page" =>  $this->currentPage(),
            "first_page_url" => $this->Url(1),
            "from" => $this->firstItem(),
            "last_page" => $this->lastPage(),
            "last_page_url" => $this->Url($this->lastPage()),
            "next_page_url" => $this->nextPageUrl(),
            "path" => $this->path(),
            "per_page" => $this->perPage(),
            "prev_page_url" => $this->previousPageUrl(),
            "to" => $this->lastItem(),
            "total" => $this->total(),
            'items' => BooksResource::collection($this->collection),
        ];
    }
}
