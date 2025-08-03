<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['bible_reading_id', 'user_id', 'comment', 'comment_date'];

    public function bibleReading()
    {
        return $this->belongsTo(BibleReading::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
