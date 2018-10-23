<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\images_products;
use App\Models\products;
use App\Models\settings;
use App\Models\sellers;
class SellersFrontController  extends Controller
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

   public function sellersRender(){

     $sellers=$this->sellersSections();
    // $settings=$this->socialMediaSection();
     return view('front.sellers')
            ->with('sellers',$sellers);

   }
    public function sellersSections(){
       $sellers= sellers::latest()->where('active',1)->get();
       return $sellers;
    }

  
     
     

  }
