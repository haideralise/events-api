<?php namespace App\Models;

use App\Traits\Roster\RosterQueryTrait;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use RosterQueryTrait;
    /**
     * Get all of the post's rosters.
     */
    public function rosters()
    {
        return $this->morphMany(Roster::class, 'rosterable');
    }
}
