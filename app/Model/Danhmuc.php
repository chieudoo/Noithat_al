<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    protected $table="danhmuc";
    protected $fillable = [];
    public function sanpham()
    {
        return $this->hasMany('App\Model\Sanpham');
    }
    public function duan()
    {
        return $this->hasMany('App\Model\Duan');
    }
}
