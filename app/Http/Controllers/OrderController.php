<?php

namespace App\Http\Controllers;

use App\Jobs\SendNotfiyToAdmins;
use App\Notifications\AcceptOrderNot;
use App\Notifications\DenyOrderEmailNotification;
use App\Notifications\OrderEmailNot;
use App\Order;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Swift_TransportException;

class OrderController extends Controller
{
    //


    public function addOrder(Request $request)
    {
        # code...

    

        $request->validate([

            'c_city' => ['required'],
            'c_st' => ['required'],
            'c_count' => ['required'],
            'pro_id' => ['required'],
            'pro_price' => ['required'],

        ]);

        $order =new Order();
        if(isset($request->c_loc))
        $order->c_loc=$request->c_loc;
        else
        $order->c_loc='0';
        $order->c_city=$request->c_city;
        $order->c_st=$request->c_st;
        $order->c_count=$request->c_count;
        $order->moreitem_id=$request->pro_id;
        $order->user_id=$request->user()->id;
        $order->statt=false;
        
        $mess='';
        if(isset($request->c_message)){
            $order->c_message=$request->c_message;
        $mess.=$request->c_message;
        }

        $details=['u_name'=>$request->user()->name
        ,'mess'=>'شكرا عزيزنا العميل للتعامل معنا . طلبك تحت المعالجة',
        'urll'=>route('deatils',['id'=>$request->pro_id]),

    
    ];

    $mailalz=env('MAIL_FROM_ADDRESS');
    
        
        $details=[
            'u_name'=>$request->user()->name
        ,'mess'=>'لديك طلب جديد من ',
        'pro_name'=>$order->moreitem->name,
        'count'=>$request->c_count,
        'price'=>$request['c_count']*$request['pro_price'],
        'urll'=>route('deatils',['id'=>$request->pro_id]),
        'phone'=>$request->user()->phone
        ,'email'=>$request->user()->email
        ,'loc'=>$order->c_loc,
        'mess'=>$mess
    
    
    ];



//    return (new OrderEmailNot($details))->toMail(null);

            dispatch((new SendNotfiyToAdmins($details)));
            




    $order->save();

    try{
Artisan::call('schedule:run',[]);
    }catch(Exception $e){

        return $e->getMessage();
    }






        return $data=Array('stat'=>'ok');
        

    }

    public static function getOrders(Request $request)
    {
        # code...



        $count=$request['count'];

        $tek=0;
        $skip=0;

        $size=0;
        $stat='';


        if($count==0)
        {
            $tek=8;
        $skip=0;
        $count=8;
        }
        else{
        $tek=5;
        $skip=$count;
    }
        if(isset($request['size'])==false)
        $size=Order::count();
        else
        $size=$request['size'];

        if($request->has('Ajax')){
        $orders=Order::orderBy('updated_at', 'desc')->skip($skip)->take($tek)->get();
    
        $count+=5;
    }
        else
        {$orders=Order::orderBy('updated_at', 'desc')->take($count)->get();

            
        }
        if($count>$size)
        $count=$size;
        if($count==$size)
        $stat='No';
        else
        $stat='Yes';


        if(isset($request['noAjax']))
        {

            return view('layouts.Admin.ordertable',Array('orders'=>$orders,'count'=>$count,'size'=>$size,'stat'=>$stat));
        }

        if(isset($request['Ajax'])){

            $rows='';
            $rows.=view('layouts.Admin.roworder',Array('orders'=>$orders));
    
            return $data=Array('rows'=>$rows,'count'=>$count,'size'=>$size,'stat'=>$stat);
    
        }




    }

    public static function AcceptOrder(Request $request)
    {
        # code...
        $order=Order::find($request['id']);

        $data=[
            'uname'=>$order->user->name,
            'ad_email'=>$request->user()->email,
            'ad_phone'=>$request->user()->phone,
            'pro_name'=>$order->moreitem->name,
            'urll'=>route('deatils',['id'=>$order->moreitems_id]),


        ];

        try{
            $order->user->notify(new AcceptOrderNot($data));
            }catch(Exception $ex){
        
                return $data=Array('error_code'=> $ex->getCode(),'stat'=>'error',
            'error_mess'=>$ex->getMessage());
            }
            //    Mail::to($order->user->email)->send(new DenyOrderMail($data));
                $order->statt=true;
                $order->save();
                return $data=Array('stat'=>'ok');
        
        
    }
    public static function denyOrder(Request $request)
    {
        # code...
        $order=Order::find($request['id']);

        $data=[
            'uname'=>$order->user->name,
            'ad_mail'=>$request->user()->email,
            'ad_phone'=>$request->user()->phone,
            'pro_name'=>$order->moreitem->name,
            'urll'=>route('order',['proid'=>$order->id]),


        ];
        
       // return new DenyOrderMail($data);

      // return new DenyOrderEmailNotification($data);    
    try{
    $order->user->notify(new DenyOrderEmailNotification($data));
    }catch(Exception $ex){

        return $data=Array('error_code'=> $ex->getCode(),'stat'=>'error',
    'error_mess'=>$ex->getMessage());
    }
    //    Mail::to($order->user->email)->send(new DenyOrderMail($data));
        $order->delete();
        return $data=Array('stat'=>'ok');

    }

    public static function myorders(Request $request)
    {
        # code...
        
        $count=$request['count'];

        $tek=0;
        $skip=0;

        $size=0;
        $stat='';


        if($count==0)
        {
            $tek=8;
        $skip=0;
        $count=8;
        }
        else{
        $tek=5;
        $skip=$count;
    }
        if(isset($request['size'])==false)
        $size=$request->user()->orders->count();
        else
        $size=$request['size'];

        if($request->has('Ajax')){
        $orders=$request->user()->orders()->orderBy('updated_at', 'desc')->skip($skip)->take($tek)->get();
    
        $count+=5;
    }
        else 
        {$orders=$request->user()->orders()->orderBy('updated_at', 'desc')->take($count)->get();

            
        }
        if($count>$size)
        $count=$size;
        if($count==$size)
        $stat='No';
        else
        $stat='Yes';


        if(isset($request['noAjax']))
        {

            return view('layouts.ordertable',Array('orders'=>$orders,'count'=>$count,'size'=>$size,'stat'=>$stat,'user'=>'yes'));
        }

        if(isset($request['Ajax'])){

            $rows='';
            $rows.=view('layouts.roworder',Array('orders'=>$orders,'user'=>'yes'));
    
            return $data=Array('rows'=>$rows,'count'=>$count,'size'=>$size,'stat'=>$stat);
    
        }
        return $orders;




    }

    public static function deleteOrderFromUser(Request $request)
    {
        # code...
        $order=Order::find($request['id']);
        $order->delete();
        //$order->ex

        return $data=Array('stat'=>'ok');


    }
}
