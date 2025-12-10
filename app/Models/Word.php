<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    //
    protected $fillable = [
        'word_hiragana',
        'word_kanji',
        'romaji',
        'meaning'
    ];
}
