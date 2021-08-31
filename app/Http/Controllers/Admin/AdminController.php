<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\AdminUser;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function home(Request $request){
        {

            return redirect('home');
            }




        }

public function login(Request $request){
    $this->validate( $request ,[
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string', 'min:8'],
    ]);







}
public static function rigest(Request $request){


    if($request->method()=='GET'){
        return view('auth.register');
    }

    else if($request->method()=='POST'){


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        

        ]);

        $user=new User();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->password=Hash::make($request['password']);
        
        //$user->save();

        
        $user->save();
        return redirect(route('home',false));



    }

    }


}







