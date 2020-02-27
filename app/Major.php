<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Major extends Model
{
    use SoftDeletes;
    protected $fillable = ['major'];

    public $table = "majors";

    protected $primaryKey = ['major_id'];

    public function user()
    {
        return $this->hasMany('App\User', 'major_id', 'major_id')->withDefault();
    }
}
