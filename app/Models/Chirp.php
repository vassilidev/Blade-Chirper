<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'message',
    ];
}
