<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Loc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;
class LocController extends Controller
{
    //


    public static function Locadd(Request $request)
    {
        # code...
        
        if($request->isMethod('GET')){
            $locs =Loc::all();
            return view('layouts.Admin.locform',Array('locs'=>$locs));
        }






    

        else if($request->isMethod('post') && $request->lid==null){
        


            $request->validate([

                'name'=>['required','string'],
                'address'=>['required'],
                'addurl'=>['required'],
                'phone'=>['required','max:14','min:9'],
                'image' => ['required']

            ]);
            $loc=new Loc();
            $loc->name=$_POST['name'];
            $loc->phone=$_POST['phone'];
            $loc->address=$_POST['address'];
            $loc->url=$_POST['addurl'];
            

                
            $img =$_POST['image'];
            if (strpos($img, 'data:image/jpeg;base64,') === 0) {
                $img = str_replace('data:image/jpeg;base64,', '', $img);  
                $ext = '.JPG';
            }
            if (strpos($img, 'data:image/png;base64,') === 0) { 
                $img = str_replace('data:image/png;base64,', '', $img); 
                $ext = '.png';
            }

            $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);


                $name='img'.date("YmdHis").'_'.$ext;
                $file ='myimages/locimg/'.$name;

                
            Storage::disk('google')->put('1ZeOc4Yixmxfr9MaweVl7RGwTIfh8fXTb/'.$name,$data);

            $urlll=Storage::disk('1ZeOc4Yixmxfr9MaweVl7RGwTIfh8fXTb/'.$name);
               // if (file_put_contents($file, $data)) {
                
                    $loc->img=$urlll;
               // }

                $loc->img=$name;
                $loc->save();
            
            return back()->with('stat','ok')->with('message','Saved Secessfuly');


            

        }

        else if($request->isMethod('POST') && $request['lid']!=null){


            $request->validate([

                'name'=>['required','string'],
                'address'=>['required'],
                'addurl'=>['required'],
                'phone'=>['required','max:14','min:6'],
            
            ]);

            $loc =Loc::find($request['lid']);
            $loc->name=$_POST['name'];
            $loc->phone=$_POST['phone'];
            $loc->address=$_POST['address'];
            $loc->url=$_POST['addurl'];

            if(isset($_POST['image'])){

        
                $locpath=public_path('myimages/locimg/');
                $imgpath=$locpath.$loc->img;

            //Storage::disk('public')->delete('myimages/locimg/'.$loc->img);


                $img =$_POST['image'];
                if (strpos($img, 'data:image/jpeg;base64,') === 0) {
                    $img = str_replace('data:image/jpeg;base64,', '', $img);  
                    $ext = '.JPG';
                }
                if (strpos($img, 'data:image/png;base64,') === 0) { 
                    $img = str_replace('data:image/png;base64,', '', $img); 
                    $ext = '.png';
                }
    
                $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
    
    
                    $name='img'.date("YmdHis").'_'.$ext;
                    $file ='myimages/locimg/'.$name;
    
                    
            //Storage::disk('public')->put('myimages/locimg/'.$name,$data);

            Storage::disk('google')->put('1ZeOc4Yixmxfr9MaweVl7RGwTIfh8fXTb/'.$name,$data);

            $urlll=Storage::disk('1ZeOc4Yixmxfr9MaweVl7RGwTIfh8fXTb/'.$name);
               // if (file_put_contents($file, $data)) {
                
                    $loc->img=$urlll;
                 //   if (file_put_contents($file, $data)) {
                    
                   // }
    

            }
            $loc->save();

            return back()->with('stat','ok')->with('message','Edited Secessfuly');





        }



       
    }


     public static function Deletloc(Request $request)
    {
        # code...
        $locpath=public_path('myimages/locimg/');

        if($request->has('dlid')){
        $loc=Loc::find($request['dlid']);
        
        
       // Storage::disk('public')->delete('myimages/locimg/'.$loc->img);

        $loc->delete();

        return back()->with('stat','ok')->with('message','Deleted Secessfuly');
        
    
    }
    }

    public static function getlocinfo(Request $request)
    {
        # code...
        if($request->has('lid')){

            $loc=Loc::find($request['lid']);
        
        return  $data=Array(
            'id'=>$loc->id,
            'name'=>$loc->name,
            'phone'=>$loc->phone,
            'address'=>$loc->address,
            'addurl'=>$loc->url,
            'img'=>$loc->img

        );


        }
    }
}
