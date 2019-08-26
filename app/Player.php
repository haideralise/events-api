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
        return $this->belongsToMany(Game::class, TableProperties::GAME_PLAYER);
    }

    /**
     * @return BelongsToMany
     */
    public function proficiencies()
    {
        return $this->belongsToMany(GameProficiency::class, TableProperties::GAME_PLAYER, 'proficiency_id', 'id');
    }
}
