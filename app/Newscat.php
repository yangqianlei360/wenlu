<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newscat extends Model
{
    protected $fillable=[
        'name','enname','fid','title','keyword','des','sort'
    ];

    // 自身关联
    public function childNewscat()
    {
        return $this->hasMany('App\Newscat', 'fid', 'id')->orderBy('sort','asc');
    }

    // 自身关联
    public function allChildrenNewscats()
    {
        return $this->childNewscat()->with('allChildrenNewscats');
    }
}
