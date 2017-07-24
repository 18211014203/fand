<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User_brower extends Model
{
    // 关联数据 表
    protected $table = "user_brower";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $guarded = [];

}
