<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->hasMany('App\Categories', 'id', 'category_id');
    }
}
