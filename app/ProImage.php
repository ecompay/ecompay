<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProImage extends Model
{
    //
    protected $table = 'proimages';
    protected $primaryKey = 'id';
    protected $fillable=['product_id','image'];
}
