<?php


namespace App\Roster;


use App\Roster;
use App\TableProperties;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait RosterQueryTrait
{

    public function rosters()
    {
        return $this->hasMany(Roster::class, $this->foreignPivotKey());
    }

    /**
     * @return BelongsToMany
     */
    public function players()
    {
        return $this->rosters()->with('player')->ofPlayerType();
    }

    /**
     * @return BelongsToMany
     */
    public function proficiencies()
    {
        return  $this->rosters()->with('proficiency');
    }

    public function teams()
    {
        return $this->rosters()->with('team')->ofTeamType();
    }

    public function games()
    {
        return $this->rosters()->with('game');
    }

}
