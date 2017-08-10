<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    protected $table="sanpham";
    protected $fillable = [];
    public function danhmuc()
    {
        return $this->belongsTo('App\Model\Danhmuc','cat_id');
    }
}
