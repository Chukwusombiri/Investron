<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use BelongsToUser,HasUuids;    

    protected $fillable = [
        'username',
        'level',
        'bonus',
        'downlineUsername',
        'downline_id',
        'user_id',
    ];
}
