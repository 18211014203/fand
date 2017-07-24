<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table = "user";
    protected $primaryKey = "uid";
    public $timestamps = false;
    public $guarded = [];

    // 关联用户详情表
    public function detail()
    {
        return $this -> hasOne('App\Http\Model\User_detail',"uid","uid");
    }

    // 关联视频表
    public function video()
    {
        return $this -> hasMany('App\Http\Model\Video',"uid","uid");
    }


}
