<?php namespace App\Models;

use App\Traits\Roster\RosterQueryTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
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
     * @return MorphMany
     */
    public function rosters()
    {
        return $this->morphMany(Roster::class, 'rosterable');
    }
}
