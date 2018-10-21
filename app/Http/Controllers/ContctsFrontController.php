<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\images_products;
use App\Models\products;
use App\Models\settings;
use App\Models\stories;
use Mail;
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

  
     
       public function formSections(Request $request){
          
            /*
                $this->validate($request, [
                'subject' => 'required',    'email' => 'required',
                'mobile' => 'required',     'message' => 'required',
                ]);
            */
           $to = "fathitarek208@gmail.com";
$subject = "My subject";
$txt =$request->msg;
$headers = "From: ".$request->email ;

mail($to,$subject,$txt,$headers);

           $data = array(
                      'name'=>$request->name,
                      'email'=>$request->email,
                      'phone'=>$request->phone,
                      'bodyMessage'=>$request->msg
              );
           
              // Mail::send('front.formContactMail',$data , function ($message) use ($data)
              // {
              //       $message->from($data['email'], 'new mail');
              //       $message->to('fathitarek208@gmail.com');
              //       $message->subject('Bright App Order');
              // });
              // return redirect('front.contact')->with('message', ' تم ارسال رسالتك بنجاح ');
              return $this->contactsRender();
        }


  }
