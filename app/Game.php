<?php

namespace App;

use App\Interfaces\ForiegnPivotKeyAble;
use App\Roster\RosterQueryTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Game
 * @package App
 */
class Game extends Model implements ForiegnPivotKeyAble
{
    use RosterQueryTrait;
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
     * returns pivot key field e.g game_id for games in roster
     *
     * @return string
     */
    public function foriegnPivotKey(): string
    {
        return 'game_id';
    }
}
