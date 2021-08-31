<?php

namespace App\Http\Controllers\Admin;

use App\Countviset;
use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Http\Request;

use App\Moreitem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;
class MoreitemController extends Controller
{
    //


    public $mdata;
    public static function addnew(Request $request){


        global $items;
        $items=Item::all();

        //Get method with id to show edited
        if(isset($_GET['id'])){

            $id =$_GET['id'];
            $vcounter=0;
            $mitem=Moreitem::find($id);
    $viatcount=Countviset::where('id_pro',$request['id'])->take(1)->get();
    if(count($viatcount)>0){
        $vcounter=$viatcount[0]->countv;
    }

            return view('layouts.Admin.MitemAddForm' ,Array('items'=>$items,'mitem'=>$mitem,'vcount'=>$vcounter));


        }

        //only show the view to add new Mitems
        if($request->isMethod('GET')){

            return view('layouts.Admin.MitemAddForm' ,Array('items'=>$items));
        }
        

        if($request->isMethod('POST') && $request['mid']==null){

            $request->validate([


                'name'=>['required','string'],
                'desc'=>['required','string'],
                'image' => ['required'],
                'itemid'=>['required']

            ]);

            $img = explode('|', $_POST['image']);
            $imgarr=[];


            //return count($img);




//            ["img20210824042508_0.png", "img20210824042508_1.png", "img20210824042508_2.png", "img20210824042508_3.png", "img20210824042508_4.png"]
            for($i=0; $i<count($img)-1; $i++){


                if (strpos($img[$i], 'data:image/jpeg;base64,') === 0) {
                    $img[$i] = str_replace('data:image/jpeg;base64,', '', $img[$i]);  
                    $ext = '.JPG';
                }
                if (strpos($img[$i], 'data:image/png;base64,') === 0) { 
                    $img[$i] = str_replace('data:image/png;base64,', '', $img[$i]); 
                    $ext = '.png';
                }

                $img[$i] = str_replace(' ', '+', $img[$i]);
                $data = base64_decode($img[$i]);

                $name='img'.date("YmdHis").'_'.$i.$ext;
                $file ='1g7udSjnqSLOKBFuQiizrcXbRTqP1FL8R/'.$name;


                
            Storage::disk('google')->put('1g7udSjnqSLOKBFuQiizrcXbRTqP1FL8R/'.$name,$data);

             $urlll= Storage::disk('google')->url('1g7udSjnqSLOKBFuQiizrcXbRTqP1FL8R/'.$name);
                //if (file_put_contents($file, $data)) {
                    $imgarr[]=$urlll;
                //    echo "<p>Image $i was saved as <img src='myimages/loadimg/$name' /> .</p>";
                //} 
            }
                $moitem=new Moreitem();
                $moitem->name=$request['name'];
                $moitem->desc=$_POST['desc'];
                if($imgarr!=null)
                $moitem->imgs=$imgarr;
                if($request['price']!=null)
                $moitem->price=$request['price'];
                else
                $moitem->price=0.0;

                $moitem->item_id=$request->itemid;
            
                $moitem->save();
                

         //   return Response()->json($moitem);
         return redirect(route('Mitemadd',['id'=>$moitem->id]))->with('stat','ok')->with('message','Saved Secussfull');
            return back()->with('stat','ok')->with('message','Saved Secussfull');
        

        }










        else if($request->isMethod('POST')&& $request['mid']!=null){

            $request->validate([

                'name'=>['required','string'],
                'desc'=>['required','string'],
                'itemid'=>['required','min:1']
            
            ]);
            $imgarr=[];
    
        

            if($request['image']!=null){

                $img = explode('|', $_POST['image']);
                for($i=0; $i<count($img)-1; $i++){
    
    
                    if (strpos($img[$i], 'data:image/jpeg;base64,') === 0) {
                        $img[$i] = str_replace('data:image/jpeg;base64,', '', $img[$i]);  
                        $ext = '.JPG';
                    }
                    if (strpos($img[$i], 'data:image/png;base64,') === 0) { 
                        $img[$i] = str_replace('data:image/png;base64,', '', $img[$i]); 
                        $ext = '.png';
                    }
    
                    $img[$i] = str_replace(' ', '+', $img[$i]);
                    $data = base64_decode($img[$i]);
    
                    $name='img'.date("YmdHis").'_'.$i.$ext;
                    $file ='myimages/moreitemsphoto/'.$name;
                    
            Storage::disk('google')->put('1g7udSjnqSLOKBFuQiizrcXbRTqP1FL8R/'.$name,$data);

    
            $urlll=Storage::disk('google')->url('1g7udSjnqSLOKBFuQiizrcXbRTqP1FL8R/'.$name);
    
            
                    
                    //if (file_put_contents($file, $data)) {
                        $imgarr[]=$urlll;
                    //    echo "<p>Image $i was saved as <img src='myimages/loadimg/$name' /> .</p>";
                   // } 
                }
            }


            $moitem=Moreitem::find($request['mid']);


            if($moitem!=null){


                
            $moitem->name=$request['name'];
            $moitem->desc=$_POST['desc'];
            if($imgarr!=null)
            {
                foreach ( $moitem->imgs as $ig){
            $imgarr[]=$ig;
        }
            $moitem->imgs=$imgarr;
            }
            
            if($request['price']!=null)
            $moitem->price=$request['price'];
            else
            $moitem->price=0.0;
            $moitem->item_id=$request->itemid;
            
            $moitem->save();
        

                





            }






            return back()->with('stat','ok')->with('message','Edit Secssfuly ');

        }
}
    

    public static function delmitem(Request $request)
    {
        # code...

        if($request->has('id')){
            $mit =Moreitem::find($request->id);

            foreach(json_decode(json_encode($mit->imgs)) as $img){
                
        //Storage::disk('public')->delete('myimages/moreitemsphoto/'.$img);



            }
            $mit->delete();
            return back()->with('stat','ok')->with('message','Deleted Secessfuly');


        }



    }

    public static function getAllMitems(Request $request)
    {
        # code...
    $size=Moreitem::count();
        $pro=Moreitem::orderBy('updated_at','desc')->take(8)->get();
    
    $count=8;

    if($count>$size)
    $count=$size;
    
    return view('layouts.Admin.MitemTable',Array('items'=>$pro,'count'=>8,'size'=>$size));
    }

public  $arrdel;

    public static function delimg(Request $request)
    {

        //return $request->user()->name;
        $id=$_GET['id'];
    $img=$_GET['img'];

    $delitem=Moreitem::find($id);


    if(count($delitem->imgs)==1)
    return $data=Array('state'=>'لاتستطيع حذف الصورة لكل منتج صورة على الاقل'); 

//    return $data=Array('state'=>''); 

    foreach($delitem->imgs as $im){

        if($im!=$img)
        $arrdel[]=$im;
    }
    if($arrdel!=null)
    $delitem->imgs=$arrdel;
    $delitem->save();

    
    //Storage::disk('public')->delete('myimages/moreitemsphoto/'.$img);



    return $data=Array('state'=>'ok'); 
    

}

        # code...
    

    public function edit(Request $request)
    {
        # code...



    }

}
