<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GameProficiency extends Model
{
    protected $guarded = ['id'];
    const BEGINNER_ID =  1;
    const INTERMEDIATE_ID = 2;
    const PROFESSIONAL_ID = 3;

    const BEGINNER =  'beginner';
    const INTERMEDIATE = 'intermediate';
    const PROFESSIONAL = 'professional';

    const BEGINNER_LEVEL =  1;
    const INTERMEDIATE_LEVEL = 2;
    const PROFESSIONAL_LEVEL = 3;

    /**
     * @return BelongsToMany
     */
    public function games()
    {
        return $this->belongsToMany(Game::class,
            TableProperties::ROSTERS,
            'proficiency_id',
            'game_id'
        )->where('rosterable_type', Player::class);
    }

    /**
     * @return array
     */
    public static function proficiencies()
    {
        return [
            [
                'id' => self::BEGINNER_ID,
                'title' => self::BEGINNER,
                'level' => self::BEGINNER_LEVEL,
            ],[
                'id' => self::INTERMEDIATE_ID,
                'title' => self::INTERMEDIATE,
                'level' => self::INTERMEDIATE_LEVEL,
            ],[
                'id' => self::PROFESSIONAL_ID,
                'title' => self::PROFESSIONAL,
                'level' => self::PROFESSIONAL_LEVEL,
            ]
        ];
    }
}
