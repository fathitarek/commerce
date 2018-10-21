<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\images_products;
use App\Models\products;
use App\Models\settings;
use App\Models\stories;

class StoriesFrontController  extends Controller
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

   public function storiesRender(){

     $stories=$this->storiesSections();
    // $settings=$this->socialMediaSection();
     return view('front.stories')
            ->with('stories', $stories);
            //->with('settings',$settings);

   }
    public function storiesSections(){
       $stories= stories::latest()->paginate(2);
       return $stories;
    }
   // public function socialMediaSection(){
   //     $settings= settings::first();
   //     return $settings;
   //  }  
}
