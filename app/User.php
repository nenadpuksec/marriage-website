<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password',
    ];

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

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function role_user()
    {
        return $this->hasOne('App\RoleUser');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user){
            $user->role_user()->create([
                'role_id' => 1,
                'user_id' => $user->user_id,
            ]);
        });
    }

}
