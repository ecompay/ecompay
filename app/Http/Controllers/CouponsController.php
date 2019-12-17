<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Coupon;

class CouponsController extends Controller
{


      public function attachcoupon(){
           return view('admin.coupons.attachcoupon');
       }
    
       public function storecoupon(Request $request){


           if($request->isMethod('post')){
              $data = $request->all();

              // 

              $coupon = new Coupon;
              $coupon->code = $data['code'];
              $coupon->volume = $data['volume'];
              $coupon->volume_type = $data['volume_type'];
              $coupon->expdate = $data['expdate'];
              $coupon->status = $data['status'];
              $coupon->save();
            }
        
              return view('admin.coupons.attachcoupon')->with('flash_message_success','Coupon has been added Successfully!');

           }


         public function coupons(){
           $coupons = Coupon::orderBy('id','DESC')->get();
           return view('admin.coupons.coupons')->with(compact('coupons'));
         }




    public function couponedit($id=null){

         $coupdet = Coupon::find($id);

        // $coupdet = json_decode(json_encode($coupdet));

        // echo "<pre>"; print_r($coupdet); die;

          return view('admin.coupons.couponedit')->with(compact('coupdet'));
    }




     public function couponeupdate(Request $request, $id=null){

         $coupdet = Coupon::find($id);

        // $coupdet = json_decode(json_encode($coupdet));

        // echo "<pre>"; print_r($coupdet); die;    


           if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            $coupon = Coupon::find($id);
            $coupon->code = $data['code'];    
            $coupon->volume_type = $data['volume_type'];    
            $coupon->volume = $data['volume'];
            $coupon->expdate = $data['expdate'];
            if(empty($data['status'])){
                $data['status'] = 0;
            }
            $coupon->status = $data['status'];
            $coupon->save();    
            return redirect()->action('CouponsController@coupons')->with('flash_message_success', 'Coupon has been updated successfully');
        }
         $coupdet = Coupon::find($id);

         return view('admin.coupons.couponedit')->with(compact('coupdet'));
    }





     public function coupdel($id = null){
        Coupon::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Coupon has been deleted successfully');
    }














































}
