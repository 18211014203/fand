<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User_store extends Model
{
    // 关联数据 表
    protected $table = "user_store";
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $guarded = [];

}
