<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'pages', 'downloads', 'field', 'publication_date',
    ];

    public function comparisonBook1()
    {
        return $this->hasMany(Comparison::class, 'book1_id');
    }

    public function comparisonBook2()
    {
        return $this->hasMany(Comparison::class, 'book2_id');
    }
}
