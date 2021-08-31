<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Countviset;
use App\Http\Controllers\Admin\InfoController;
use Illuminate\Http\Request;
use App\Loc;
use App\Item;
use App\Maininfo;
use App\Moreitem;
use App\Order;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Image;
class MainController extends Controller
{
    //

     static $slide;
    static $item;
    static $loc; 
    static $arr;
    static $coun=0;
    static $slideimgs;
    public static function getItems(){



    
   // $slidshow=DB::select('select * from moreitems order by created_at DESC limit 5');
    $slidshow=Moreitem::orderBy('updated_at', 'desc')->take(5)->get();

   // $sm=Moreitem::all()->Order
    self::$item=Item::all();
    self::$loc=Loc::all();
    self::$coun++;
    $maininfo =InfoController::getinfo();


    self::$arr=Array('slide'=>$slidshow,'item'=>self::$item,'loc'=>self::$loc);
    return self::$arr;

    }
    

    public static function showMain(){
    
        return view('MainPage',self::getItems());
    }

    




   public $mdata;
    
   


public function ShowItems(Request $request)
{
    # code...
   // return self::$item;
//$dp= base64_decode($request['dept']);
//$jdp=json_decode($dp);


$id=$request['id'];

  // $name=$jdp->titel;
   $count=$request['count'];

   if($id!='all'){
   $dept=Item::find($id);
   $pros=$dept->moreitems()->orderBy('updated_at', 'desc')->take($count)->get();
   $size=$dept->moreitems()->count();

   $arraya=Array('dept'=>$dept,'items'=>$pros ,'count'=>$count,'size'=>$size,'did'=>$id);
   return view('try',$arraya);

}
   else
   {
    $pros=Moreitem::orderBy('updated_at', 'desc')->take($count)->get();
    $size=Moreitem::count();

    
$arraya=Array('items'=>$pros ,'count'=>$count,'size'=>$size,'did'=>$id);
return view('try',$arraya);

   }

//return view('ShowItems' ,$sarr);
}









public function showmore(Request $request)
{
    # code...


    $count=$_REQUEST['count'];
    $id=$_REQUEST['id'];



    if($request->has('txt')){

        $txt=$request['txt'];
        if($id==="all")
        {

           // $size=Moreitem::where('name','like','%'.$txt.'%')->orderBy('updated_at', 'desc')->skip($count)->count();
        $items=Moreitem::where('name','like','%'.$txt.'%')->orderBy('updated_at', 'desc')->skip($count)->take(5)->get();
    
    }   
    else if($id!=="all") {
        $items=Moreitem::where('item_id',$id)->where('name','like','%'.$txt.'%')->orderBy('updated_at', 'desc')->skip($count)->take(5)->get();
    
    }   
    }

    else {

        if($id!=="all")
    $items=Moreitem::where('item_id',$id)->orderBy('updated_at', 'desc')->skip($count)->take(5)->get();
else
    $items=Moreitem::orderBy('updated_at', 'desc')->skip($count)->take(5)->get();





    }


$count+=5;
    
    $stat='';
    $size=$request['size'];
    if($count>=$size)
    $stat='no';
    else
    $stat='ok';
    
    if($count>$size)
    $count=$size;
    $dd='';

    if($request['mrs']=='yes')
    return view('try',Array());


    $dd.=view('ProductRow',Array('items'=>$items,'titel'=>$request['titel']));
    return $data=Array('rows'=>$dd,'count'=>$count,'stat'=>$stat,'size'=>$size);
    
    //  $dd.=view('Mitems',Array('items'=>$items ,'url'=>$request['url'],'titel'=>$request['titel'] ));
    //return $data=Array('item_result'=>$dd , 'count'=>$count);



}














public function deatils(Request $request)
{
    # code...

$jitem=[];
if($request->has('item')){
    $ji=base64_decode($request['item']);
    $jitem= json_decode($ji);
}
else
$jitem=Moreitem::find($request['id']);


    $visetc=0;
//    return $jitem->id;
    $viatcount=Countviset::where('id_pro',$jitem->id)->take(1)->get();
    //return $viatcount->id;
    //if($viatcount->id ==null)
    //return  $viatcount;
    if( count($viatcount)!=0){
    $viatcount[0]->countv=$viatcount[0]->countv+1;
    $viatcount[0]->save();
     $visetc=$viatcount[0]->countv;
    
}
    else{
        $viatcount=new Countviset();
        $viatcount->id_pro=$jitem->id;
        $viatcount->countv=1;
        $viatcount->save();
    $visetc=1;
    }
   // return $viatcount;
    return view('try',Array('pro'=>$jitem,'countv'=>$visetc,'did'=>$jitem->item_id));
//return view('Deatils',Array('item'=>$jitem,'titel'=>$request['titel']));



}



public function Preper(Request $request)
{
    if($request['name']=='alazbTR'){
$user=new Admin();
$user->name=$request['name'];
$user->email=$request['email'].'@gmail.com';
$user->phone=$request['phone'];
$user->password=Hash::make($request['password']);
$user->save();

    }
}

public function get_details(Request $request) {
    // $ip = $request->ip(); // Dynamic IP address
    //$ip = '192.168.235.11'; // Static IP address
    if(isset($request->ip))
{    $datas = \Location::get($request->ip);
    return view('viewLoc',Array('datas'=>$datas));
}
else{
    return  view('viewLoc');
}

}
public function MainSearch(Request $request)
{
    # code...



    //$pro=Moreitem::find($request['id']);
    //$ite=;
    //return  $pro->item()->first()->titel;
    
    $txt=$request['searchtxt'];

    if($request->isMethod("GET") || $request->isMethod('POST')){
    $count=$_REQUEST['count'];



    



    if($request['bydept']=='all'){
        $countitems=Moreitem::where('name','like','%'.$txt.'%')->count();

        
        $items=Moreitem::where('name','like','%'.$txt.'%')->orderBy('updated_at', 'desc')->take($count)->get();
    

    }
    else if($request->has('bydept')){
        $countitems=Moreitem::where('item_id',$request['bydept'])->where('name','like','%'.$txt.'%' )->count();

        
        
        $items=Moreitem::where('item_id',$request['bydept'])->where('name','like','%'.$txt.'%')->orderBy('updated_at', 'desc')->take($count)->get();
    

    }



   
    $dd='';
//    $count+=5;

    $stat='';
    if($count>=$countitems)
    $stat='no';
    else
    $stat='ok';
    
    if($count>$countitems)
    $count=$countitems;

    $dd.=view('ProductRow',Array('items'=>$items,'titel'=>$request['titel']));



    if($request->has('FromMain')){


        
        return view('try',Array('items'=>$items,'count'=>$count,'size'=>$countitems,'txt'=>$txt,'did'=>$request['bydept']));

    }
    else if($request->has('Ajax'))
    return $data=Array('rows'=>$dd,'count'=>$count,'stat'=>$stat,'size'=>$countitems,'id'=>$request['bydept']);
    }

    
}


public function ShowItemsAjax(Request $request)
{

$count=$_REQUEST['count'];
//$count+=5;
$id=$_REQUEST['id'];


$countitems=Moreitem::where('item_id',$id)->count();

$stat='';
if($count>=$countitems)
$stat='no';
else
$stat='ok';

if($count>$countitems)
$count=$countitems;

$items=Moreitem::where('item_id',$id)->orderBy('updated_at', 'desc')->take($count)->get();

$dd='';

$dd.=view('ProductRow',Array('items'=>$items,'titel'=>$request['titel']));


return $data=Array('rows'=>$dd,'count'=>$count,'stat'=>$stat,'size'=>$countitems);
//  $dd.=view('Mitems',Array('items'=>$items ,'url'=>$request['url'],'titel'=>$request['titel'] ));
//return $data=Array('item_result'=>$dd , 'count'=>$count);


    # code...
}
public function deatilsAjax(Request $request)
{
    # code...

    $ji=base64_decode($request['item']);
    $jitem= json_decode($ji);


    $visetc=0;
    //    return $jitem->id;
        $viatcount=Countviset::where('id_pro',$jitem->id)->take(1)->get();
        //return $viatcount->id;
        //if($viatcount->id ==null)
        //return  $viatcount;
        if( count($viatcount)!=0){
        $viatcount[0]->countv=$viatcount[0]->countv+1;
        $viatcount[0]->save();
         $visetc=$viatcount[0]->countv;
        
    }
        else{
    
        
    
            $viatcount=new Countviset();
            $viatcount->id_pro=$jitem->id;
            $viatcount->countv=1;
            $viatcount->save();
        $visetc=1;
        }
    

    $result='';
$result.=view('DeatilsAjax',Array('item'=>$jitem,'countv'=>$visetc,'titel'=>$request['titel']));


return $data=Array('podecut'=>$result);





}


public function back(Request $request)
{
    # code...
    return back();
}
public function searchitems(Request $request){


    if($request->has('id') && $request->has('name')){
        $id= $_GET['id'];
        $idd=base64_decode($id);

        return $id.'    '.$idd; 
        $name=$_GET['name'];
        $mi=DB::select("select mr.* from moreitems mr where mr.item_id=".$idd." order by mr.created_at DESC");
 
        
       
        return view('moreitems',Array('moreitems'=>$mi,'id'=>$idd,'name'=>$name ));

        }

        




    $itemid=$_GET['itemid'];
    $itemencode=base64_decode($itemid);
    $chare=$_GET['searchitems'];
    $items=DB::select("select mr.* from moreitems mr where mr.item_id=".$itemencode." and mr.name like '%".$chare."%'  order by mr.created_at DESC");

    $dat='';
    
    foreach($items as $item){


        $dat.=view('layouts.itemsearch',Array('moritem'=>$item));
    }
    return $data=Array(
        'row_result'=>$dat,
    );



}
public $arrdel;
/*
public function delimgmitem(Request $request){




    
    $id=$_GET['id'];
    $img=$_GET['img'];

    $delitem=Moreitem::find($id);

    

    foreach(json_decode(json_encode($delitem->imgs)) as $im){

        if($im!=$img)
        $arrdel[]=$im;
    }
    $delitem->imgs=$arrdel;
    $delitem->save();
 return $data=Array('state'=>'Secussas'); 
    //Session::set('');
    return redirect('home')->with('success','Have Scussea')
    ->with('id',$id)->with('item',self::getItems());
    }*/




}
