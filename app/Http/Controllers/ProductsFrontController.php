<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\images_products;
use App\Models\products;
use App\Models\settings;
use App\Models\stories;

class ProductsFrontController  extends Controller
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

   public function productsRender(){

     $products=$this->productsSections();
    // $settings=$this->socialMediaSection();
     return view('front.proudcts')
            ->with('products', $products);
            //->with('settings',$settings);

   }
    public function storiesSections(){
       $stories= stories::latest()->paginate(2);
       return $stories;
    }
     public function productsSections(){
       $products= products::latest()->where('publish',1)->paginate(12);
       foreach ($products as $product) {
            $product->images_product = images_products::where('product_id', $product->id)->first();
        }
       return $products;
    }

  }
