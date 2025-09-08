<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = ['character','romaji','type'];
    protected $primaryKey = 'idcharacters';
}
