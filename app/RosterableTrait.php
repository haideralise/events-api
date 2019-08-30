<?php


namespace App;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait RosterableTrait
{
    /**
     * @return BelongsToMany
     */
    public function rosterBelongsToMany($related, $relatedPivotKey, $ofType = null, $foriegnPivotKey = 'rosterable_id')
    {
        return $this->belongsToMany($related,
            TableProperties::ROSTERS,
            $foriegnPivotKey,
            $relatedPivotKey
        )->when($ofType, function ($query) use($ofType){
            return $query->where('rosterable_type', $ofType);
        });
    }

    /**
     * @return BelongsToMany
     */
    public function games()
    {
        return  $this->rosterBelongsToMany(
            Game::class,
            'game_id',
            $this->rosterableType(),
            $this->foriegnPivotKey()
        );
    }

    /**
     * @return BelongsToMany
     */
    public function proficiencies()
    {
        return  $this->rosterBelongsToMany(
            GameProficiency::class,
            'proficiency_id',
            $this->rosterableType(),
            $this->foriegnPivotKey()
        );
    }

}
