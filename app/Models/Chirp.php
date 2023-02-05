<?php

namespace App\Models;

use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'message',
    ];

    /**
     * @var string[]
     */
    protected $dispatchesEvents = [
        'created' => ChirpCreated::class,
    ];

    /**
     * @return BelongsTo<User>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
