<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'activity_id', 'user_id',
    ];

    public $table = "histories";

    protected $primaryKey = 'history_id';

    public function activity()
    {
        return $this->belongsTo('App\Activity', 'activity_id', 'activity_id')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'user_id')->withDefault();
    }
}
