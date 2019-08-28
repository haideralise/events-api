<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Game
 * @package App
 */
class Game extends Model
{
    use SoftDeletes;
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * @return BelongsToMany
     */
    public function players()
    {
        return $this->belongsToMany(Player::class,
            TableProperties::ROSTERS,
            'game_id',
            'rosterable_id'

        )->where('rosterable_type', Player::class);
    }

    /**
     * @return BelongsToMany
     */
    public function proficiencies()
    {
        return $this->belongsToMany(GameProficiency::class,
            TableProperties::ROSTERS,
            'game_id',
            'proficiency_id'

        )->where('rosterable_type', Player::class);
    }
}
