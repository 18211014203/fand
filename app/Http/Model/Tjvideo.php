<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Tjvideo extends Model
{
    //// 关联数据 表
    protected $table = "tjvideo";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $guarded = [];

    public function detail()
    {
        return $this -> hasOne('App\Http\Model\video_detail','vid','vid');
    }
    public function user()
    {
        return $this -> belongsTo('App\Http\Model\user','uid','uid');
    }
}
