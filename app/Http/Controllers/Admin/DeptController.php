<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Item;
use App\Moreitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;
class DeptController extends Controller
{
    //


    public static function deptadd(Request $request)
    {
        # code...

        if($request->isMethod('GET')){
            $item =Item::all();


            return view('layouts.Admin.DeptEdit',Array('item'=>$item,'id'=>5));
        }



        if($request->isMethod('POST') && $request['deptid']==null){

            
            $request->validate([

                'titel'=>['required','string'],
                'desc'=>['required'],
                'image' => ['required']

            ]);


            $item =new Item();

            $item->titel=$_POST['titel'];
            $item->desc=$_POST['desc'];




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

            $name='img'.date("YmdHis").''.$ext;
            

            
        $pahtt=  Storage::disk('google')->put('1BOTbU_WNmknImrYWYPP8evls1Dp40hud/'.$name,base64_decode($img));

       // $urllll=Storage::disk()->get();
       $path="1BOTbU_WNmknImrYWYPP8evls1Dp40hud/".$name."";
        $urllll =Storage::disk('google')->url($path);

      //  $filg= Storage::disk('google')->getMetadata($path);
        
     //   $filpath=$filg['path']."/".$filg['filename'].".".$filg['extension'];
       // return 0;
   //     Storage::disk('google')->delete($filpath);
//

  //  echo '<img src="'.$urllll.'" />' ;
    //dd($filg);
   // return 0;
    
        $item->img=$urllll;
            
        //Storage::putFileAs()
        
        //echo '<img src="'.Storage::url('myimages/items/'.$name).'" />';
        //return 0;
          //      $data = base64_decode($img);

                
          //      echo 'Data   '.$img;

            //    $file ='myimages/items/'.$name;




           // $pa= Storage::put('flie.jpg',file_put_contents($file, $data),'public');
            
            //return  base64_encode($data);
               //File $f=new File()


              //  if (file_put_contents($file, $data)) {
                
                //    $item->img=$name;
               // }
                $item->save();


            
                
        return back()->with('stat','ok')->with('message','Saved Seccusfuly');



    }
    else if($request->isMethod('POST') && $request->deptid!=null){
        $request->validate([

            'titel'=>['required','string','max:191'],
            'desc'=>['required'],

        ]);



        $item=Item::find($request['deptid']);
        if($request['image']!=null){


            $path=public_path("myimages/items");


            

          //  Storage::disk('google')->delete(Storage::disk('google')->get($item->img));

            
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

                $pahtt=  Storage::disk('google')->put('1BOTbU_WNmknImrYWYPP8evls1Dp40hud/'.$name,base64_decode($img));

                $urlll=Storage::disk('google')->url('1BOTbU_WNmknImrYWYPP8evls1Dp40hud/'.$name);

                $item->img=$urlll;
             //   $file ='myimages/items/'.$name;

               // if (file_put_contents($file, $data)) {
                
                 //   $item->img=$name;
               // }





        }
        $item->titel=$_POST['titel'];
            $item->desc=$_POST['desc'];

            $item->save();


            
                
            return back()->with('stat','ok')->with('message','Edited Seccusfuly');
    





    }
    }
    public static function getitemsfordept(Request $request)
    {
        # code...




        
        $id=$_GET['id'];
        

        if($id=="all"){

            $count=$request['count'];

            $stat="";
        
            $size=$request['size'];
            
            
            $pro=Moreitem::orderBy('updated_at','desc')->skip($count)->take(5)->get();
        $dt='';
    
        $dt.=view('layouts.Admin.tableofitems',Array('items'=>$pro));

        $count+=5;
        if($count>=$size)
        $stat="no";
        else
        $stat="ok";

        if($count>$size)
        $count=$size;

        return $data=Array('trows'=>$dt,'count'=>$count,'stat'=>$stat,'size'=>$size);
    
        }


        else{





        if($request->has('count')){
            $count=$request['count'];

            $stat="";
        
            $size=$request['size'];
            
            
            $pro=Moreitem::where('item_id',$request['id'])->orderBy('updated_at','desc')->skip($count)->take(5)->get();
        $dt='';
    
        $dt.=view('layouts.Admin.tableofitems',Array('items'=>$pro));

        $count+=5;
        if($count>=$size)
        $stat="no";
        else
        $stat="ok";

        if($count>$size)
        $count=$size;

        return $data=Array('trows'=>$dt,'count'=>$count,'stat'=>$stat,'size'=>$size);
        }




        if($request->has('id')){

            


        
           // $items=DB::select("select mr.* from moreitems mr where mr.item_id=".$id." order by mr.created_at DESC");
            $items=Moreitem::where('item_id',$id)->orderBy('updated_at', 'desc')->take(8)->get();
            
        $size=Moreitem::where('item_id',$request['id'])->count();
            $theitem= DB::select('select * from items where id='.$id.' LIMIT 1');
            
            
            $count=0;
            if($size<8)
            $count=$size;
            else
            $count=8;
                $d='';
                $d.=view('layouts.Admin.tableofitems',Array('items'=>$items,'count'=>8));
                return $data=Array('items_result'=>$d,
                'titel'=>$theitem[0]->titel,'desc'=>$theitem[0]->desc
                ,'img'=>$theitem[0]->img,
                'id'=>$theitem[0]->id,'size'=>$size,'count'=>$count);
        }

    }
    }

    public static function deldept(Request $request)
    {
        # code...
        if($request->has('deptid')){
            $item=Item::find($request->deptid);
        
            //Storage::disk('public')->delete('myimages/items/'.$item->img);


            //$mitems=DB::select("select mr.* from moreitems mr where mr.item_id=".$item->id." order by mr.created_at DESC");
        $mitems= $item->moreitems;
            
            foreach($mitems as $mit){

                foreach($mit->imgs as $img){
//                    $imgpath="myimages/moreitemsphoto/".$img;
  //          if(File::exists($imgpath)){
               // return 'yse is Exssit';
    //            File::delete($imgpath);
      //      }

    //Storage::disk('public')->delete('myimages/moreitemsphoto/'.$img);




                }

                $mit->delete();

            }

    //        return 0;
            
           // $dele=DB::delete('delete moreitems where item_id= ?', [$item->id]);
        
            $item->delete();
        return  back()->with('stat','ok')->with('message','Deleted Secucessful');



        }
    }
}
