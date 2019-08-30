<?php


namespace App\Interfaces;


interface ForiegnPivotKeyAble
{
    /**
     * returns pivot key field e.g game_id for games in roster
     *
     * @return string
     */
    public function foriegnPivotKey(): string;
}
