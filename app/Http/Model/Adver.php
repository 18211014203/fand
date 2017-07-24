<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Adver extends Model
{
    // //// 关联数据 表
    protected $table = "adver";
    protected $primaryKey = 'aid';
    public $timestamps = false;
    public $guarded = [];
}
