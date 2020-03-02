<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'activity_name', 'activity_address', 'activity_date',
        'activity_time', 'hour', 'activity_detail', 'activity_image',
        'assessment_status',
    ];

    public $table = "activities";

    protected $primaryKey = 'activity_id';

    public function history()
    {
        return $this->belongsTo('App\History', 'activity_id', 'activity_id')->withDefault();
    }
}
