<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\UserVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'referralId',
        'upline_id',
        'uplineUsername'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->referralId = "CRP". $user->randomId();
        });
    }

    public function sendEmailVerificationNotification(){
        $this->notify(new UserVerifyEmail);
    }

    public function randomId(){
        return rand(111111111,99999999);
    }

    public function deposits(){
        return $this->hasMany(\App\Models\Deposit::class);
    }

    public function withdrawals(){
        return $this->hasMany(\App\Models\Withdrawal::class);
    }

    public function userwallets(){
        return $this->hasMany(\App\Models\UserWallet::class);
    }
    
    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class, 'plan_user', 'user_id', 'plan_id')->withPivot('id','total', 'roi')->as('subscription')->withTimestamps();
    }
    
    public function upline()
    {
        return $this->belongsTo(User::class, 'upline_id');
    }

    public function downlines(){
        return $this->hasMany(\App\Models\Referral::class,'user_id');
    }
}
