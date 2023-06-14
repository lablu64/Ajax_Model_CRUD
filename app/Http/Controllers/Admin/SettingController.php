<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    function seo(){
        $data=DB::table('seos')->first();
        return view('admin.setting.seo',compact('data'));
        
    }

    public function seoupdate(Request $request, $id)  {


        // dd($request->all());
        // die();
        $data = array();
        $data['meta_title'] = $request->meta_title;
        $data['meta_author'] = $request->meta_author;

         $data['meta_tag'] = $request->meta_tag;
         $data['meta_description'] = $request->meta_description;
         $data['meta_keyword'] = $request->meta_keyword;
         $data['google_verification'] = $request->google_verification;
         $data['google_analytics'] = $request->google_analytics;
       
        $data['alexa_verification'] = $request->alexa_verification;
        $data['google_adsense'] = $request->google_adsense;
      
   
       DB::table('seos')->where('id',$id)->update($data);
       
       return redirect()->back();
        
    }

    //smtp
    public function smtp(){
        $data=DB::table('smtps')->first();
        return view('admin.setting.smtp',compact('data'));
        
    }

    public function smtpupdate(Request $request, $id)  {


        // dd($request->all());
        // die();
        $data = array();
        $data['mailer'] = $request->mailer;
        $data['port'] = $request->port;

         $data['username'] = $request->username;
         $data['password'] = $request->password;
         $data['host'] = $request->host;
       
   
       DB::table('smtps')->where('id',$id)->update($data);
       
       return redirect()->back();
        
    }


    //web setting

    public function web(){
        $data=DB::table('settings')->first();
        return view('admin.setting.web',compact('data'));

    }

    public function webupdate(Request $request, $id)  {


        // dd($request->all());
        // die();
        $data = array();
        $data['currency'] = $request->currency;
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['mail_email'] = $request->mail_email;
        $data['support_email'] = $request->support_email;

        
        $data['favicon'] = $request->favicon;
        $data['facebook'] = $request->facebook;
         $data['instagram'] = $request->instagram;
         $data['linkin'] = $request->linkin;
         $data['youtube'] = $request->youtube;
         $data['twitter'] = $request->twitter;
         if($request->file('logo')){
            $logo=$request->logo;
            $logoname=uniqid().'.'.$logo->getClientOriginalExtension();
            $logo->move('public/files/setting/',$logoname);

            $data['logo'] = 'public/files/setting/'.$logoname;
        }
        else{
            $data['logo'] = $request->old_logo;
        }

        if($request->file('favicon')){
            $favicon=$request->favicon;
            $faviconname=uniqid().'.'.$favicon->getClientOriginalExtension();
            $favicon->move('public/files/setting/',$faviconname);

            $data['favicon'] = 'public/files/setting/'.$faviconname;
        }
        else{
            $data['favicon'] = $request->old_favicon;
        }
    
    
       
   
       DB::table('settings')->where('id',$id)->update($data);
       
       return redirect()->back();
        
    }


}
