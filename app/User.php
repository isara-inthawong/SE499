<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\ResetPassword as ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'major', 'tel', 'email', 'password', 'user_image'
    ];

    public $table = "users";

    protected $primaryKey = 'user_id';

    public function history()
    {
        return $this->hasMany('App\History', 'user_id', 'user_id')->withDefault();
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'member';
    public function isAdmin()
    {
        return $this->role === self::ADMIN_TYPE;
    }

    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotification($token));
    }
}
