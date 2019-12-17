<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Category;

class CategoriesController extends Controller
{


     public function index()
    {
         $categories=Category::all();

         $degree = Category::where(['root_id'=>0])->get();
        return view('admin.category.index',compact(['categories','degree']));
      
        
    }

    //
   public function createCategory(Request $request){


        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;


            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }

           $category = new Category;
            $category->name = $data['name'];
            $category->root_id = $data['root_id'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->status = $status;
            $category->save();
            return back()->with('flash_message_success', 'Category has been added successfully');

 }

          $degree = Category::where(['root_id'=>0])->get();

          return back()->with('flash_message_success', 'Category has been added successfully')->with(compact('degree'));


}





   public function displayallCategories(){ 

        $categories = category::get();
        return view('admin.category.categories')->with(compact('categories'));
    }

   public function editCat(Request $request, $id=null)
    {
        //
         $catdetails = Category::where(['id'=>$id])->first();
         $degree = Category::where(['root_id'=>0])->get();
         return view('admin.category.editcat')->with(compact('catdetails','degree'));
    }



 public function updateCat(Request $request,$id=null)
    {
        //
        if($request->isMethod('post')){
        $data = $request->all();
      //   if($request->isMethod('post')){
      //   $data = $request->all();
      //   echo "<pre>"; print_r($data); die;

      // }

         if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }


        Category::where(['id'=>$id])->update(['name'=>$data['name'],'description'=>$data['description'],'url'=>$data['url'],'status'=>$status]);

        $catdetails = Category::where(['id'=>$id])->first();
         // return view('admin.category.editcat');

         return back()->with('flash_message_success','Category Updated Successfully!');


         $catdetails = Category::where(['id'=>$id])->first();


         $degree = Category::where(['root_id'=>0])->get();
        return view('admin.category.index')->with(compact('catdetails','degree'));
    }


}



   public function deletecat($id=null)

   {
       if(!empty($id)){
       Category::where(['id'=>$id])->delete();
       return back()->with('flash_message_success','Category deleted Successfully!');
        }


   }










































}




