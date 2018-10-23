<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\images_products;
use App\Models\products;
use App\Models\settings;
use App\Models\sellers;
use Mail;
class VendorFrontController  extends Controller
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

   public function vendorRender($id){

     $vendor=$this->vendorSections($id);
     $products=$this->productSections($id);
     return view('front.vendor')
            ->with('vendor',$vendor)->with('products',$products);

   }
    public function vendorSections($id){
       $vendor= sellers::findOrFail((int)$id);
       return $vendor;
    }

    public function productSections($id){
      $products= products::where('seller_id',$id)->get();
      foreach ($products as $product) {
          $product->images_product = images_products::where('product_id', $product->id)->first();
        }
        return $products;
    }
  }
