<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Maininfo;
use Illuminate\Http\Request;

class InfoController extends Controller
{

    public static function show(Request $request)

    {
        if($request->isMethod('POST')){
        //return view('layouts.Admin.InfoForm',self::getinfo());
    
        //return

        
        
        
        if($request->has('Edite')){
        foreach($_POST as $key=>$v){

        if($key !="_token"){
            $info=Maininfo::where("name",$key)->get()->first();
    
       //     $info=Maininfo::find($key);
            $info->info=$v;
            $info->save();
    }
        }
        return back()->with('stat','ok')->with('message','Saved Seccusfuly');
    }
    else
    {
        foreach($_POST as $key=>$v){
            if($key !="_token"){
            $inf=new Maininfo();
            $inf->name=$key;
            $inf->info=$v;
            $inf->save();
            }


        }
        return  view('layouts.Admin.InfoForm',self::getinfo());
        //return secure_url('InfoForm');
    


    }

//        return  view('layouts.Admin.InfoForm',self::getinfo())->with('stat',"ok"); 
    }
        else if($request->isMethod('GET'))
        return  view('layouts.Admin.InfoForm',self::getinfo());
    }


    public static function save(Request $request)
    {
        # code...
       $arr= $GLOBALS['arry']=array("facebook"=>"","gmail"=>"" 
        ,"telephone"=>"" ,"mphone"=>"" ,"note"=>"" ,"addtxt"=>"" ,"addurl"=>"",
        "mophone"=>"", "mgmail"=>"","mname"=>"",
    'mfacebook'=>"" );

    foreach($request as $key=>$v){

        $info=Maininfo::find($key);
        $info->info=$v;
        $info->save();

    }





    }
    public static function getinfo()
    {
        # code...
        
        $infos=Maininfo::all();
        $arr=[];

        foreach($infos as $info){

            $arr[$info->name]=$info->info;

            }
            
            return $arr;

    }
}
