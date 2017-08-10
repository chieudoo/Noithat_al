<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Duan extends Model
{
    protected $table="duan";
    protected $fillable = [];
    public function danhmuc()
    {
        return $this->belongsTo('App\Model\Danhmuc','cat_id');
    }
}
