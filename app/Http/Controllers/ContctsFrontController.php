<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\images_products;
use App\Models\products;
use App\Models\settings;
use App\Models\stories;

class ContctsFrontController  extends Controller
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

   public function contactsRender(){

     $settings=$this->settingsSections();
    // $settings=$this->socialMediaSection();
     return view('front.contact')
            ->with('settings',$settings);

   }
    public function settingsSections(){
       $settings= settings::first();
       return $settings;
    }

     public function formSections(){
      
    }

  }
