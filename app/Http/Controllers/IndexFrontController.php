<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\images_products;
use App\Models\products;
use App\Models\settings;

class IndexFrontController  extends Controller
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

   public function indexRender(){

     $productsPopular=$this->productsPopularSections();
     $settings=$this->socialMediaSection();
     return view('front.index')
            ->with('productsPopular', $productsPopular)->with('settings',$settings);

   }
    public function productsPopularSections(){
       $products= products::latest()->where('publish',1)->limit(8)->get();
       foreach ($products as $product) {
            $product->images_product = images_products::where('product_id', $product->id)->first();
        }
       return $products;
    }
   public function socialMediaSection(){
       $settings= settings::first();
       return $settings;
    }  
}
