<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoonJamesModel extends Model
{
    protected $fillable =
    [
        'sticker_id',
        'sticker_grouup',
        'sticker_version',
    ];
    public $table = "moon_james";
    protected $primaryKey = 'id';
}
