<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\images_products;
use App\Models\products;
use App\Models\settings;
use App\Models\categories;

class CategoriesFrontController  extends Controller
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

   public function categoriesRender(){

     $categories=$this->categorySections();
    // $settings=$this->socialMediaSection();
     return view('front.category')
            ->with('categories', $categories);
            //->with('settings',$settings);

   }
    public function categorySections(){
       $categories= categories::latest()->paginate(3);
       return $categories;
    }
   // public function socialMediaSection(){
   //     $settings= settings::first();
   //     return $settings;
   //  }  
}
