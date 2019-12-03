<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'activity_name', 'activity_detail', 'activity_address', 'activity_datetime', 'activity_image',
    ];

    public $table = "activities";

    protected $primaryKey = 'activity_id';

    public function history()
    {
        return $this->hasMany('App\History', 'activity_id', 'activity_id')->withDefault();
    }
}
