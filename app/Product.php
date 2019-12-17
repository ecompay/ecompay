<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

use Session;

use DB;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable=['name','category_id','code','color','description','price','image','url','status','care'];



    public function attr(){

        return $this->hasMany('App\ProAttribute','product_id');
    }


    public static function cartEstimate(){

        if(Auth::check()){
         

         //echo "User is logged in We will use Auth";
           $email = Auth::user()->email;

           $cartEstimate = DB::table('cart')->where('email',$email)->sum('quantity');
        }else{
          //echo "User is not logged in. We will user Session";

            $session_id = Session::get('session_id');

              $cartEstimate = DB::table('cart')->where('session_id',$session_id)->sum('quantity');
        }

        return $cartEstimate;
    }



}
