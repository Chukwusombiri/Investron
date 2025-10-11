<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plan extends Model
{
    /** @use HasFactory<\Database\Factories\PlanFactory> */
    use HasFactory,HasUuids;

    public function deposits(){
        return $this->hasMany(\App\Models\Deposit::class,'plan_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'plan_user','plan_id','user_id')->withPivot('id','total', 'roi')->as('subscribers')->withTimestamps();
    }
}
