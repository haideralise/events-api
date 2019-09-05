<?php


namespace App\Interfaces;


interface ForeignPivotKeyAble
{
    /**
     * returns pivot key field e.g game_id for games in roster
     *
     * @return string
     */
    public function foreignPivotKey(): string;
}
