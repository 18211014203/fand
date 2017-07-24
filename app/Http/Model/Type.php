<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // 关联数据 表
    protected $table = "type";
    protected $primaryKey = 'tid';
    public $timestamps = false;
    public $guarded = [];
}
