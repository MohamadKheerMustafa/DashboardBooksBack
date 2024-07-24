<?php

namespace App\Http\Resources\Books;

use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author,
            'pages' => $this->pages,
            'downloads' => $this->downloads,
            'field' => $this->field,
            'publication_date' => $this->publication_date,
            'created_at' => $this->created_at
        ];
    }
}
