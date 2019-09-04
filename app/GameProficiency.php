<?php

namespace App;

use App\Interfaces\ForeignPivotKeyAble;
use App\Roster\RosterQueryTrait;
use Illuminate\Database\Eloquent\Model;

class GameProficiency extends Model implements ForeignPivotKeyAble
{

    use RosterQueryTrait;
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

    /**
     * returns pivot key field e.g game_id for games in roster
     *
     * @return string
     */
    public function foreignPivotKey(): string
    {
        return 'proficiency_id';
    }
}
