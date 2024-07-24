<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comparison extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'book1_id', 'book2_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book1()
    {
        return $this->belongsTo(Book::class, 'book1_id');
    }

    public function book2()
    {
        return $this->belongsTo(Book::class, 'book2_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
