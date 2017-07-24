<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //// 关联数据 表
    protected $table = "video";
    protected $primaryKey = 'vid';
    public $timestamps = false;
    public $guarded = [];

    public function detail()
    {
        return $this -> hasOne('App\Http\Model\video_detail','vid','vid');
    }

}
