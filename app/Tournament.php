<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'place',
        'description'
    ];

    /**
     * @return BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    /**
     * @return BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }
    /**
     * @return BelongsTo
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * @return BelongsToMany
     */
    public function events()
    {
        return $this->belongsToMany(Event::class)->using(EventTournament::class);
    }
}
