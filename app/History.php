<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\PKHelper;

class History extends PKHelper
{
    use SoftDeletes;
    protected $fillable = [
        'activity_id', 'user_id', 'state', 'date_time_rate',
        'address_rate', 'overview_rate', 'suggestion',
    ];

    public $table = "histories";
    protected $primaryKey = ['user_id', 'activity_id'];
    public $incrementing = false;

    public function activity()
    {
        return $this->belongsTo('App\Activity', 'activity_id', 'activity_id')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'user_id')->withDefault();
    }
}
