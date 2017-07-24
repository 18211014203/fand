<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    // //// 关联数据 表
    protected $table = "url";
    public $timestamps = false;
    public $guarded = [];
}
