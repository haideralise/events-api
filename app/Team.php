<?php

namespace App;

use App\Interfaces\ForeignPivotKeyAble;
use App\Interfaces\RosterableType;
use App\Roster\RosterQueryTrait;
use Illuminate\Database\Eloquent\Model;

class Team extends Model implements ForeignPivotKeyAble
{
    use RosterQueryTrait;
    /**
     * Get all of the post's rosters.
     */
    public function rosters()
    {
        return $this->morphMany(Roster::class, 'rosterable');
    }

    /**
     * returns pivot key field e.g game_id for games in roster
     *
     * @return string
     */
    public function foreignPivotKey(): string
    {
        return  'rosterable_id';
    }
}
