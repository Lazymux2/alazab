<?php

namespace App\Http\Controllers;

use App\Moreitem;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        
        return view(MainController::showMain());

        
    }

    public function order(Request $request){

        //return redirect($request['urll']);

        if($request->has('proid')){
        $pro=Moreitem::find($request['proid']);

        return view('order',Array('pro'=>$pro));
        }
        else
        return back();
    }
    public function myorders(Request $request)
    {
        # code...
      //  $request->user()
        return OrderController::myorders($request);
    }

    public function deleteOrderFromUser(Request $request)
    {
        # code...
        if($request->has('id'))
        
        return OrderController::deleteOrderFromUser($request);
        else
        return $data=Array('Error'=>'Error');
    }

}
