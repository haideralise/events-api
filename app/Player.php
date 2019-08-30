<?php

namespace App;

use App\Interfaces\ForiegnPivotKeyAble;
use App\Roster\RosterQueryTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model implements ForiegnPivotKeyAble
{
    use SoftDeletes;
    use RosterQueryTrait;
    protected $guarded = ['id', 'city_id'];

    /**
     * @return BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get all of the post's rosters.
     */
    public function rosters()
    {
        return $this->morphMany(Roster::class, 'rosterable');
    }

    /**
     * returns pivot key field e.g game_id for games in roster
     *
     * @return string
     */
    public function foriegnPivotKey(): string
    {
        return  'rosterable_id';
    }
}
