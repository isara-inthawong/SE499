<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $fillable = ['role'];

    public $table = "roles";

    protected $primaryKey = 'role_id';

    public function user()
    {
        return $this->hasMany('App\User', 'role_id', 'role_id')->withDefault();
    }
}
