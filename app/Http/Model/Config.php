<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    // 关联数据 表
    protected $table = "config";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $guarded = [];
}
