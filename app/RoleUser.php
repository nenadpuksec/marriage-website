<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = "role_user";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
