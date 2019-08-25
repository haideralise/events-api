<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use SoftDeletes;
    const STATUS_ACTIVE = 'active';
    const STATUS_ACTIVE_ID = 1;
    const STATUS_INACTIVE = 'inactive';

    const STATUS_INACTIVE_ID = 2;
    const STATUS_APPROVED = 'approved';
    const STATUS_APPROVED_ID = 3;
    const STATUS_PENDING = 'pending';
    const STATUS_PENDING_ID = 4;

    protected $fillable = ['title'];

    public static function availableStatuses()
    {
        return [
            self::STATUS_ACTIVE_ID => self::STATUS_ACTIVE,
            self::STATUS_INACTIVE_ID => self::STATUS_INACTIVE,
            self::STATUS_APPROVED_ID => self::STATUS_APPROVED,
            self::STATUS_PENDING_ID => self::STATUS_PENDING,
        ];
    }
}
