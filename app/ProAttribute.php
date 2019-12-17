<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProAttribute extends Model
{
    //

    protected $table = 'products_attributes';
    protected $primaryKey = 'id';
    protected $fillable=['name','category_id','code','color','description','price','image','url','status','care'];
}
