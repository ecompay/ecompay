<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Product;

use App\Category;

use App\Cart;

use Session;

use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       

        // $categories = json_decode(json_encode($categories));

        // echo "<pre>"; print_r($categories); die;
        $products=Product::all();
        $session_id = Session::get('session_id');
         $clientCart = DB::table('cart')->where(['session_id'=>$session_id])->get();

        $catmenu = "";
        

        $cartCount = Product::cartEstimate();
         $categories = Category::with('cat')->where(['root_id' => 0])->get();
         return view('front/home')->with(compact('products','catmenu','categories','clientCart','cartCount'));
        }
    
}
