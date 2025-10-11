<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    /** @use HasFactory<\Database\Factories\DepositFactory> */
    use HasFactory,HasUuids,BelongsToUser;
}
