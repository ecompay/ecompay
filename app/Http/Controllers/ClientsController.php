<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Category;
use Auth;

use App\User;
use App\Product;

use App\Country;

use App\InvoiceAddress;

use Session;

use App\Cart;

use App\Order;
use App\OrdersProduct;
use DB;


use Srmklive\PayPal\Services\ExpressCheckout;
class ClientsController extends Controller
{
    //

   public function register(){
         
        $categories = Category::with('cat')->where(['root_id' => 0])->get();
        return view('clients.register')->with(compact('categories'));
    }


     public function clientlogin(Request $request){

        $categories = Category::with('cat')->where(['root_id' => 0])->get();
         
       if($request->isMethod('post')){

        $data = $request->all();

        // echo "<pre>"; print_r($data); die;
         if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
            

            Session::put('frontSession',$data['email']);
            return redirect('/cart')->with(compact('categories'));
         }else{
            return redirect()->back()->with('flash_message_error', 'Invalid Username or password');
         }

      }
       
    }





       public function loginstore(Request $request){

         
       $categories = Category::with('cat')->where(['root_id' => 0])->get();


         if($request->isMethod('post')){
              $data = $request->all();

               $clientsCount = User::where('email',$data['email'])->count();

              if($clientsCount>0){

                return redirect()->back()->with('flash_message_error','Email already exists!');
              }else{
                $user = new User;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->save();

                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){

                  Session::put('frontSession',$data['email']);
                  return redirect('/');

              }

          }

       
        return view('clients.register')->with(compact('categories'));
    }
    

   
}






   public function clientaccount() {
      $user_id = Auth::user()->id;
      $countries = Country::get();
      $clientDetails = User::find($user_id);
      $categories = Category::with('cat')->where(['root_id' => 0])->get();
    
       return view('clients.account')->with(compact('categories','countries','clientDetails'));

    }



    public function clientupdate(Request $request) {

      $user_id = Auth::user()->id;

      $clientDetails = User::find($user_id);



       // echo "<pre>"; print_r($userDetails); die;

       $countries = Country::get();

       if($request->isMethod('post')){
         $data = $request->all();


         // echo "<pre>"; print_r($data); die;
         $user = User::find($user_id);
         $user->name = $data['name'];
         $user->address = $data['address'];
         $user->city = $data['city'];
         $user->state = $data['state'];
         $user->country = $data['country'];
         $user->pincode = $data['pincode'];
         $user->mobile = $data['mobile'];
         $user->save();

         return redirect()->back()->with('flash_message_success','Your account details has been successfully updated!');

       }

       return view('clients.account')->with(compact('categories'));

   

    }





       public function checkout() {

       $user_id = Auth::user()->id;
       $clientDetails = User::find($user_id);

        $countries = Country::get();
        $categories = Category::with('cat')->where(['root_id' => 0])->get();

        $session_id = Session::get('session_id');

        $clientCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        
         foreach($clientCart as $key => $product){
            $prodet = Product::where('id',$product->product_id)->first();
            $clientCart[$key]->image = $prodet->image;
        }
     return view('front.checkout')->with(compact('categories','clientDetails','countries','clientCart'));

}


     public function invoicestore(Request $request) {




      $user_id = Auth::user()->id;

      $email = Auth::user()->email;
     $clientDetails = User::find($user_id);

     $countries = Country::get();
       $categories = Category::with('cat')->where(['root_id' => 0])->get();
      $session_id = Session::get('session_id');
      $clientCart = DB::table('cart')->where(['session_id'=>$session_id])->get();

     
        
         foreach($clientCart as $key => $product){
            $prodet = Product::where('id',$product->product_id)->first();
            $clientCart[$key]->image = $prodet->image;
        }



      $shipcount = InvoiceAddress::where('user_id',$user_id)->count();
     $shipdet = array();
     if($shipcount>0){
        $shipdet = InvoiceAddress::where('user_id',$user_id)->first();
     }

     if($request->isMethod('post')){
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;



        if(empty($data['invoice_name']) || empty($data['invoice_address']) || empty($data['invoice_city']) || empty($data['invoice_state']) || empty($data['invoice_country']) || empty($data['invoice_pincode']) || empty($data['invoice_mobile']) || empty($data['shipname']) || empty($data['shipaddress']) || empty($data['shipcity']) || empty($data['shipstate']) || empty($data['shipcountry']) || empty($data['shippincode']) || empty($data['shipmobile'])){

           return redirect()->back()->with('flash_message_error','PLease fill all fields to Checkout!');
    

        }


         // 

         


    




             User::where('id',$user_id)->update(['name'=>$data['invoice_name'],'address'=>$data['invoice_address'],'city'=>$data['invoice_city'],'state'=>$data['invoice_state'],'country'=>$data['invoice_country'],'pincode'=>$data['invoice_pincode'],'mobile'=>$data['invoice_mobile']]);


          
          if($shipcount>0){
          // Update Shipping address
           InvoiceAddress::where('user_id',$user_id)->update(['name'=>$data['shipname'],'address'=>$data['shipaddress'],'city'=>$data['shipcity'],'state'=>$data['shipstate'],'country'=>$data['shipcountry'],'pincode'=>$data['shippincode'],'mobile'=>$data['shipmobile']]);


        }else{
          // Add New Shipping Address
         $shipping = new InvoiceAddress;
         $shipping->user_id = $user_id;
         $shipping->user_email = $email;
         $shipping->name = $data['shipname'];
         $shipping->address = $data['shipaddress'];
         $shipping->city = $data['shipcity'];
         $shipping->state = $data['shipstate'];
         $shipping->country = $data['shipcountry'];
         $shipping->pincode = $data['shippincode'];
         
         $shipping->mobile = $data['shipmobile'];
         $shipping->save();


     }


           // echo "<pre>"; print_r($data); die;

           // echo "Redirect to Order Review Page"; die;

     // echo "Redirect to Order Review Page"; print_r($data); die;
           // return view('front.checkout')->with(compact('clientDetails','countries','clientCart','categories','shipdet'));

     return redirect()->action('ClientsController@orderrevision');
         // die;

     }

   }


     // return view('front.checkout')->with(compact('clientDetails','countries','clientCart','categories'));


    public function orderrevision(){


         $categories = Category::with('cat')->where(['root_id' => 0])->get();

         $user_id = Auth::user()->id;
         $user_email = Auth::user()->email;
         $clientDetails = User::where('id',$user_id)->first();


         $shipdet = InvoiceAddress::where('user_id',$user_id)->first();

         $shipdet = json_decode(json_encode($shipdet));

         // echo "<pre>";print_r($shipdet); die;
         $session_id = Session::get('session_id');
         $clientCart = DB::table('cart')->where(['session_id'=>$session_id])->get();

     
        
         foreach($clientCart as $key => $product){
            $prodet = Product::where('id',$product->product_id)->first();
            $clientCart[$key]->image = $prodet->image;
        }


         return view('front.orderrevision')->with(compact('categories','clientDetails','shipdet','clientCart'));
        
     }




public function paypalpayment() {
       $provider = new ExpressCheckout; 
      
    
        $orderId=uniqid();
       $data=$this->cartDetails($orderId);
      
     
         
        $response = $provider->setExpressCheckout($data);
      
      return redirect($response['paypal_link']);
     
    }
     protected function cartDetails($orderId)
        {
          
       $session_id = Session::get('session_id');
          $clientCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        $data = [];
        // $invoiceId = $response['INVNUM']??uniqid();
        $data['items'] = [];
        foreach($clientCart as $key=>$cart){
          $itemDetail=[
            'name' => $cart->name,
            'qty' => $cart->quantity,
            'price' => $cart->price
          ];
          $data['items'][]=$itemDetail;
        }
        // $data['invoice_id'] = $invoiceId();
         $data['invoice_id'] = uniqid();
        $data['invoice_description'] = "test order";
        $data['return_url'] = route('paypalrich');
        $data['cancel_url'] = url('/test');
        $total = $clientCart;
        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }
        $data['total']=$total;
           return $data;
           // dd($data);
        }

    public function paypalSuccess(Request $request) {
         
         $provider = new ExpressCheckout;
         $token=$request->token;
         $PayerID=$request->PayerID;
         $response = $provider->getExpressCheckoutDetails($token);
         
       
         $invoiceId = $response['INVNUM']??uniqid();
         $data=$this->cartData($invoiceId);
        
         $response = $provider->doExpressCheckoutPayment($data, $token, $PayerID);
         
         return "Order Completed";
        }


    public function paypalrich(Request $request) {
         

         $provider = new ExpressCheckout;


         $token=$request->token;
         $PayerID=$request->PayerID;

          

         $response = $provider->getExpressCheckoutDetails($token);
          $invoiceId = $response['INVNUM']??uniqid();
          $data=$this->cartDetails($invoiceId);
          $response = $provider->doExpressCheckoutPayment($data, $token, $PayerID);

         // dd($response);

          return "Order Completed";
        }









































































}