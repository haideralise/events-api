<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    public function rosterable()
    {
        return $this->morphTo();
    }

    public function player()
    {
        return $this->belongsTo(Player::class,
            'rosterable_id',
            'id'
        );
    }
    public function team()
    {
        return $this->belongsTo(Team::class,
            'rosterable_id',
            'id'
        );
    }

    public function game()
    {
        return $this->belongsTo(Game::class,
            'game_id',
            'id'
        );
    }

    public function proficiency()
    {
        return $this->belongsTo(GameProficiency::class,
            'proficiency_id',
            'id'
        );
    }


    /**
     * @param Builder $query
     * @param $game_id
     * @return Builder
     */
    public function scopeOfGame(Builder $query, $game_id)
    {
        return $query->where(compact('game_id'));
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOfType(Builder $query, $rosterable_type)
    {
        return $query->where(compact('rosterable_type'));
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOfTeamType(Builder $query)
    {
        return $query->ofType(Team::class);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOfPlayerType(Builder $query)
    {
        return $query->ofType(Player::class);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOfPlayer(Builder $query, $player_id)
    {
        return $query->ofType(Player::class)->where('rosterable_id', $player_id);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOfTeam(Builder $query, $team_id)
    {
        return $query->ofType(Player::class)->where('rosterable_id', $team_id);
    }



}
