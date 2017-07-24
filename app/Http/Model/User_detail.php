<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User_detail extends Model
{
    // 关联数据 表
    protected $table = "user_detail";
    protected $primaryKey = "uid";
    public $timestamps = false;
    public $guarded = [];

    public function user()
    {
        return $this -> belongsTo('App\Http\Model\User',"uid","uid");
    }
}
