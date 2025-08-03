<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BibleReading extends Model
{
    protected $fillable = ['reading_date', 'passage', 'text'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
