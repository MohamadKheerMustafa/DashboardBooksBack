<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'comparison_id', 'similarity_rating',
    ];

    public function comparison()
    {
        return $this->belongsTo(Comparison::class);
    }
}
