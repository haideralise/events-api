<?php


namespace App\Roster;


use App\Roster;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait RosterQueryTrait
{

    /**
     * @return BelongsToMany
     */
    public function rosters()
    {
        return $this->hasMany(Roster::class, $this->foreignPivotKey());
    }

    /**
     * @return BelongsToMany
     */
    public function players()
    {
        return $this->rosters()->ofPlayerType();
    }

    /**
     * @return BelongsToMany
     */
    public function proficiencies()
    {
        return $this->rosters();
    }

    public function teams()
    {
        return $this->rosters()->ofTeamType();
    }

    /**
     * @return mixed
     */
    public function games()
    {
        return $this->rosters();
    }

}
