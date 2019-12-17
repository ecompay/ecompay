<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;

use App\User;
use Image;
use Auth;
use Storage;

use Uuid;

use App\ProImage;

use App\Category;

use App\ProAttribute;

use DB;

use Session;

use App\Coupon;

class ProductsController extends Controller
{
    //

     public function show(){




    }


    public function createproduct(){


       $categories = Category::where(['root_id' => 0])->get();

        $cat_dropd = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            $cat_dropd .= "<option value='".$cat->id."'>".$cat->name."</option>";

            $sub_cat = Category::where(['root_id' => $cat->id])->get();
            foreach($sub_cat as $sub_c){
                $cat_dropd .= "<option value='".$sub_c->id."'>&nbsp;&nbsp;--&nbsp;".$sub_c->name."</option>";    
            }

            
        }


        return view('admin.products.create')->with(compact('cat_dropd'));

}


     public function storeproduct(Request $request){

     
        $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            if(empty($data['category_id'])){
              return redirect()->back()->with('flash_message_error','Category is missing!');

            }

             if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }

            $product = new Product;
            $product->category_id = $data['category_id'];
            $product->name = $data['name'];
            $product->code = $data['code'];
            $product->color = $data['color'];
            $product->status = $status;
            if(!empty($data['description'])){
                $product->description = $data['description'];
            }else{

                $product->description = '';

            }

             if(!empty($data['care'])){
                $product->care = $data['care'];
            }else{

                $product->care = '';

            }

            // $product->url = $data['url'];
            $product->price = $data['price'];

        $formInput=$request->except('image');




  
        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();


             $image->move('images',$imageName);
          

             $formInput['image']=$imageName;
        }

        


             product::create($formInput);

        


            return redirect()->back();


            $categories = Category::where(['root_id' => 0])->get();

        $cat_dropd = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            $cat_dropd .= "<option value='".$cat->id."'>".$cat->name."</option>";

            $sub_cat = Category::where(['root_id' => $cat->id])->get();
            foreach($cat_dropd as $cat_dropd){
                $sub_cat .= "<option value='".$sub_c->id."'>&nbsp;&nbsp;--&nbsp;".$sub_c->name."</option>";    
            }
            
        }


        return view('admin.products.create')->with(compact('cat_dropd'));
    }




   public function displayallProducts(){

         $products = Product::get();
        foreach($products as $key => $fit){
            $cat_name = Category::where(['id' => $fit->category_id])->first();
            $products[$key]->cat_name = $cat_name->name;
        }
        $products = json_decode(json_encode($products));

         return view('admin.products.index')->with(compact('products'));
    }


   public function productedit($id=null){
    


       $prodetails = Product::where(['id'=>$id])->first();


        $categories = Category::where(['root_id' => 0])->get();
        $cat_dropd = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            $cat_dropd .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_cat = Category::where(['root_id' => $cat->id])->get();
            foreach($sub_cat as $sub_c){
                $cat_dropd .= "<option value='".$sub_c->id."'>&nbsp;&nbsp;--&nbsp;".$sub_c->name."</option>";    
            }
            
        }
    
     return view('admin.products.edit')->with(compact('prodetails','cat_dropd'));
      
  }




     public function updatepro(Request $request, $id=null){
    
    if($request->isMethod('post')){
      $data = $request->all();
  //     echo "<pre>"; print_r($data); die;
  // }
      Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],'name'=>$data['name'],
                'code'=>$data['code'],'color'=>$data['color'],'description'=>$data['description'],'care'=>$data['care'],'price'=>$data['price']]);

      return redirect()->back()->with('flash_message_success','Product Updated Successfully!');
  }




    }




      public function deletePro($id=null) {
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product has been deleted successfully');
     }


     public function attributes($id=null) {

         // $prodDet = Product::where(['id'=>$id])->first();
         $prodDet = Product::findOrFail($id);
         return view('admin.products.attributes')->with(compact('prodDet'));
     }




     public function storeattribute(Request $request, $id=null) {

        
          if($request->isMethod('post')){

         $data = $request->all();

         foreach ($data['sku'] as $key => $val) {
             if(!empty($val)){
                $attribute = new ProAttribute;
                $attribute->product_id = $id;
                $attribute->sku = $val;
                $attribute->size = $data['size'][$key];
                $attribute->price = $data['price'][$key];
                $attribute->stock = $data['stock'][$key];
                $attribute->save();
             }
         }

       
     }
        return back()->with('flash_message_success','Attribute Was Created Successfully!');

     }






     public function delattribute($id=null) {
        ProAttribute::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Product has been deleted successfully');
     }




     public function products($url = null){


        $estimateCategory = Category::where(['url'=>$url, 'status'=>1])->count();



        // echo $estimateCategory; die;

        if($estimateCategory==0){
            abort(404);
        }

        // echo $url; die;
       $categories = Category::with('cat')->where(['root_id' => 0])->get();

       $catdet = Category::where(['url' => $url])->first();

     


       $products = Product::where(['category_id' => $catdet->id])->get();

       return view('products.listing')->with(compact('categories','catdet','products'));
     }






     public function deleteprodimg($id = null){

       $prodimg = Product::where('id',$id)->first();

   
        $image_path = 'images';



         if(file_exists($image_path.$prodimg->image)){
            unlink($image_path.$prodimg->image);
        }

       
        
  

          

         Product::where(['id'=>$id])->update(['image'=>'']);

        return redirect()->back()->with('flash_message_success', 'Product image has been deleted successfully');

     }




       public function productdetail($id = null) {
           

          

          $categories = Category::with('cat')->where(['root_id' => 0])->get();
          // $prodet = Product::where('id',$id)->first();

          $prodet = Product::with('attr')->where('id',$id)->first();

          $proImages = ProImage::where('product_id',$id)->get();
 
          $proImages = json_decode(json_encode($proImages));

          // echo "<pre>"; print_r($proImages); die;

          $totstock = ProAttribute::where('product_id',$id)->sum('stock');
          $cartCount = Product::cartEstimate();
          return view('front.detail')->with(compact('prodet','categories','proImages','totstock','cartCount'));

     }




     public function selectpriceofproduct(Request $request){




       $data = $request->all();

        // echo "<pre>"; print_r($data); die;

        $property = explode("-",$data['chidSize']);
        

        $property = ProAttribute::where(['product_id' => $property[0], 'size' => $property[1]])->first();

        echo $property->price;


        echo "#";

        echo $property->stock;
     }






      public function addmoreimages($id=null){
           
        $prodet = Product::with('attr')->where(['id'=>$id])->first();

        $showImages = ProImage::where(['product_id'=>$id])->get();

        $showImages = json_decode(json_encode($showImages));

         return view('admin.products.addimages')->with(compact('prodet','showImages'));    

      }



     public function storemoreimages(Request $request, $id=null){
        

         $data = $request->all();
         $formInput=$request->except('image'); 
        
        // $categoryDetails = Category::where(['id'=>$productDetails->category_id])->first();
        // $category_name = $categoryDetails->name;

        $prodet = Product::with('attr')->where(['id'=>$id])->first();

        
        
          if($request->isMethod('post')){

             $ProImage = new ProImage;

            // $data = $request->all();
            //  echo "<pre>"; print_r($data); die;



              $image=$request->image;
             if($image){

           
             $imageName=$image->getClientOriginalName();


              $image->move('images',$imageName);
            
              // $image->product_id = $data['product_id'];
              $formInput['image']=$imageName;
              $ProImage->product_id = $data['product_id'];

           }

             ProImage::create($formInput);

    }

          // $proImages = ProImage::where(['product_id'=>$id])->get();

          // $proImages = json_decode(json_encode($proImages));

          $showImages = ProImage::where(['product_id'=>$id])->get();

        $showImages = json_decode(json_encode($showImages));

         return view('admin.products.addimages')->with(compact('prodet','showImages'));



}



     public function deladdimage($id=null){



         $proImages = ProImage::where('id',$id)->first();

         unlink(public_path('/images/') . $proImages->image);

         proImage::where(['id'=>$id])->delete();

       
    }




     public function editattr(Request $request,$id=null){
         if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            foreach($data['idFromat'] as $key=> $attr){
                if(!empty($attr)){
                    ProAttribute::where(['id' => $data['idFromat'][$key]])->update(['price' => $data['price'][$key], 'stock' => $data['stock'][$key]]);
                }
            }
            return redirect('admin/attributes/'.$id)->with('flash_message_success', 'Product Attributes has been updated successfully');
        }

      }






      public function tocart(Request $request){

        Session::forget('couponsum');
        Session::forget('couponcode');


        $data = $request->all();


        if(empty(Auth::user()->email)){
            $data['email'] = '';    
        }else{
            $data['email'] = Auth::user()->email;
        }
 

       // echo  $session_id = Uuid::generate(); die;
            
        $session_id = Session::get('session_id');
        if(!isset($session_id)){
            $session_id = Uuid::generate();
            Session::put('session_id',$session_id);
        }

          
         if(empty($data['size'])){
            $data['size'] = '';    
        }
        // echo "<pre>"; print_r($data); die;

        DB::table('cart')->insert(['product_id' => $data['product_id'],'name' => $data['name'],'code' => $data['code'],'color' => $data['color'],
            'price' => $data['price'],'size' => $data['size'],'quantity' => $data['quantity'],'email' => $data['email'],'session_id' => $session_id]);


       return redirect('cart')->with('flash_message_success','Product has been added in Cart!');


        // return view('front.cart')->with('flash_message_success','Product has been added in Cart!');

     }




      public function cartindex(){

        $catmenu = "";
        $categories = Category::with('cat')->where(['root_id' => 0])->get();
        $cartCount = Product::cartEstimate();
        return view('front.cart')->with(compact('categories','cartCount'));
     }



      public function cart(){
          $categories = Category::with('cat')->where(['root_id' => 0])->get();
        $session_id = Session::get('session_id');



       $clientCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        
         foreach($clientCart as $key => $product){
            $prodet = Product::where('id',$product->product_id)->first();
            $clientCart[$key]->image = $prodet->image;
        }


        // echo "<pre>"; print_r($clientCart);
         $cartCount = Product::cartEstimate();
        return view('front.cart')->with(compact('clientCart','categories','cartCount'));
     }


       public function deleteproductfromcart($id = null){
        // echo $id; die;
         
         Session::forget('couponsum');
         Session::forget('couponcode');

        DB::table('cart')->where('id',$id)->delete();


        return back()->with('flash_message_success',"Product has been deleted successfully");
       }


        public function updatyquantityofcart($id=null,$quantity=null){
            DB::table('cart')->where('id',$id)->increment('quantity',$quantity);

             return redirect('cart')->with('flash_message_success','Product Quantity has been updated Successfully!');
      }


      public function usecoupon(Request $request){
              
              Session::forget('couponsum');

              Session::forget('couponcode');

              $data = $request->all();

              // echo "<pre>"; print_r($data); die;


              $countcoup = Coupon::where('code',$data['code'])->count();

              if($countcoup == 0){
                  return redirect()->back()->with('flash_message_error','Coupon is not valid');
              }else{


                // echo "Success"; die;

                $detcoupon = Coupon::where('code',$data['code'])->first();


                if($detcoupon->status==0){

                  return redirect()->back()->with('flash_message_error','This is coupon iss not active!');
                }


                $expdatecoupon = $detcoupon->expdate;

                $present_date = date('Y-m-d');


               if($expdatecoupon < $present_date){
                    return back()->with('flash_message_error','This is coupon is expired!');

                }


                // echo "Success"; die;
               $session_id = Session::get('session_id');
               $clientCart = DB::table('cart')->where(['session_id' => $session_id])->get();
               $sum_amount = 0;
                foreach($clientCart as $item){
                 $sum_amount = $sum_amount + ($item->price * $item->quantity);
               }


             


                if($detcoupon->volume_type=="Fixed"){
                $couponsum = $detcoupon->volume;
                }else{
               $couponsum = $sum_amount * ($detcoupon->volume/100);
                 }

             



                Session::put('couponsum',$couponsum);
                Session::put('couponcode',$data['code']);


                return back()->with('flash_message_success','This is coupon is applied!');
              }

       }


     


































}
