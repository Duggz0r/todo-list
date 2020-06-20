<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $guarded = [];

    public function task()
    {
        return $this->hasMany('App\Task', 'category_id', 'id');
    }
}
