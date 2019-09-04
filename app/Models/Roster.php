<?php namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Roster
 * @package App\Models
 */
class Roster extends Model
{
    /**
     * @return MorphTo
     */
    public function rosterable()
    {
        return $this->morphTo();
    }

    /**
     * @return BelongsTo
     */
    public function player()
    {
        return ($this->rosterable_type == Player::class) ? $this->belongsTo(Player::class, 'rosterable_id'): null;
    }

    /**
     * @return BelongsTo
     */
    public function team()
    {
        return ($this->rosterable_type == Team::class) ? $this->belongsTo(Team::class, 'rosterable_id') : null;
    }

    /**
     * @return BelongsTo
     */
    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    /**
     * @return BelongsTo
     */
    public function proficiency()
    {
        return $this->belongsTo(GameProficiency::class, 'proficiency_id');
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
     * @param $rosterable_type
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
     * @param $player_id
     * @return Builder
     */
    public function scopeOfPlayer(Builder $query, $player_id)
    {
        return $query->ofType(Player::class)->where('rosterable_id', $player_id);
    }

    /**
     * @param Builder $query
     * @param $team_id integer
     * @return Builder
     */
    public function scopeOfTeam(Builder $query, $team_id)
    {
        return $query->ofType(Player::class)->where('rosterable_id', $team_id);
    }

}
