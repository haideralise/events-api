<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    public function games()
    {
        return $this->belongsToMany(Game::class,
            TableProperties::ROSTERS,
            'rosterable_id',
            'game_id'
        )->where('rosterable_type', Team::class);
    }
    /**
     * Get all of the post's rosters.
     */
    public function rosters()
    {
        return $this->morphMany(Roster::class, 'rosterable');
    }
}
