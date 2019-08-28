<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use SoftDeletes;
    protected $guarded = ['id', 'city_id'];

    /**
     * @return BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return BelongsToMany
     */
    public function games()
    {
        return $this->belongsToMany(Game::class,
            TableProperties::ROSTERS,
            'rosterable_id',
            'game_id'
        )->where('rosterable_type', Player::class);
    }

    /**
     * @return BelongsToMany
     */
    public function proficiencies()
    {
        return $this->belongsToMany(GameProficiency::class,
            TableProperties::ROSTERS,
            'rosterable_id',
            'proficiency_id'
        )->where('rosterable_type', Player::class);
    }

    /**
     * Get all of the post's rosters.
     */
    public function rosters()
    {
        return $this->morphMany(Roster::class, 'rosterable');
    }
}
