<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\images_products;
use App\Models\products;
use App\Models\settings;
use App\Models\stories;

class ProductFrontController  extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

   public function productRender($id){

     $product=$this->productSections($id);
     return view('front.product')
            ->with('product',$product);

   }
    public function settingsSections(){
       $settings= settings::first();
       return $settings;
    }

  
     
     public function productSections($id){
     $product= products::where('id',$id)->first();
     // foreach ($products as $product) {
          $product->images_product = images_products::where('product_id', $product->id)->first();
      //  }
        return $product;
    }


  }
