<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class GamePlayer
 * @package App
 */
class GamePlayer extends Model
{
    /**
     * @var string
     */
    protected $table = TableProperties::GAME_PLAYER;

    /**
     * @return BelongsTo
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * @return BelongsTo
     */
    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    /**
     * @return BelongsTo
     */
    public function proficiency()
    {
        return $this->belongsTo(GameProficiency::class, 'proficiency_id');
    }

}
