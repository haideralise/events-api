<?php namespace App\Models;

use App\Interfaces\ForeignPivotKeyAble;
use App\Traits\Roster\RosterQueryTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Game
 * @package App
 */
class Game extends Model implements ForeignPivotKeyAble
{
    use SoftDeletes;
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
    public function foreignPivotKey(): string
    {
        return 'game_id';
    }
}
