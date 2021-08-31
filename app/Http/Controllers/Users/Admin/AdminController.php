<?php

namespace App\Http\Controllers\Users\Admin;

use App\Admin;
use App\Http\Controllers\Admin\DeptController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\LocController;
use App\Http\Controllers\Admin\MoreitemController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('layouts.Admin.Home');
    }





    
    public function locadd(Request $request)
    {
        # code...
       return LocController::Locadd($request); 
    }
    public function deleteloc(Request $request)
    {
        # code...
        return LocController::Deletloc($request);
    }
    public function getlocinfo(Request $request)
    {
        # code...
        return LocController::getlocinfo($request);
    }
    public function show(Request $request)
    {
        # code...
        return InfoController::show($request);
    }
    
    public function addnewMitem(Request $request)
    {
        # code...

        return MoreitemController::addnew($request);
    }



    public function deptadd(Request $request)
    {
        # code...
        return DeptController::deptadd($request);
    }

    public function deldept(Request $request)
    {
        # code...
        return DeptController::deldept($request);
    

    }
    public function getitemsfordept(Request $request)
    {
        # code...
        return DeptController::getitemsfordept($request);
    }

    public function delmitem(Request $request)
    {
        # code...
        return MoreitemController::delmitem($request);
    }

    public function delimg(Request $request)
    {
        # code...
        return MoreitemController::delimg($request);
    }
    public function getAllMitems(Request $request)
    {
        # code...
        return MoreitemController::getAllMitems($request);
    }

    public function  getOrders(Request $request){

        return OrderController::getOrders($request);




}
public function register(Request $request)
{
    # code...



    
    if($request->isMethod('POST')){

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'phone'=>['required', 'string','min:9','max:14'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $request['password'] = Hash::make($request->password);
        Admin::create($request->all());
        return back()->with('stat','ok')->with('message','Add The Admin Seccusfuly');


    }
    return view('auth.admin-register');
    
}
public function denyOrder(Request $request)
{
    # code...
    return OrderController::denyOrder($request);
}

public function AcceptOrder(Request $request)
{
    # code...
    return OrderController::AcceptOrder($request);
}
/*
public function Logout(Request $request)
{
    $request->user()->Logout();
    # code...
}*/
}