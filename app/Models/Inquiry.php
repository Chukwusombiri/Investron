<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Inquiry extends Model
{

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'client_need',
        'investable_asset',
        'comment',
        'user_id',
        'wants_to_talk',
        'zip_code',
        'advisor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
