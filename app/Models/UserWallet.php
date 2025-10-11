<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    use HasUuids,BelongsToUser;

    public function withdrawal(){
        return $this->hasMany(\App\Models\Withdrawal::class,'user_wallet_id');
    }
}
