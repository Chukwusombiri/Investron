<?php

namespace App\Models;

use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable implements CanResetPassword
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;
    use HasUuids;
    use Notifiable;
    use SoftDeletes;

    public $incrementing = false;
    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'admin_role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $url = route('admin.password.reset',['token'=>$token,'email'=>$this->email]);
        $this->notify(new AdminResetPasswordNotification($url));
    }
}
