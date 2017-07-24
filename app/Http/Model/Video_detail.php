<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Video_detail extends Model
{
    //// 关联数据 表
    protected $table = "video_detail";
    protected $primaryKey = 'vid';
    public $timestamps = false;
    public $guarded = [];
}
