<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    

    public function cat(){
        return $this->hasMany('App\Category','root_id');
    }
}
