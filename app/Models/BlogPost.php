<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
