<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

Class UserController extends Controller {

    function login(Request $req)
    {
        $user = User::where(['email' => $req-> email])
        ->where(['password' => $req-> password])
        ->first();

        if ($user==true) 
        {
            $req-> session()-> put('user', $user);
            return redirect('?success=true');
            
        }
        else 
        {
            return redirect('?success=false');
        }
    }

    function register(Request $req)
    {
        //return $req->input();
        try 
        {
        DB::insert('INSERT INTO users(name, email, password, gender, created_at) VALUES (?,?,?,?,?)',[$req->fullname, $req->email,$req->password,$req->gender, now()]);

        return redirect ('/?success=registered');    
        }
        catch (\Exception) {
        return redirect ('/?success=failed'); 
        }
     

    }

    function search(Request $req)
    {
        //return view('userlist', ['listofuser'=>DB::table('users')->paginate(2)]);
        return view('userlist', ['listofuser'=>DB::table('users')
        ->select(DB::raw('id, name, email, password, gender, created_at, updated_at'))
        ->where('email','like','%'.$req->q.'%')
        ->orWhere('email','like','%'.$req->q.'%')
        ->paginate(5)]);
    }

    function deleteuser(Request $req)
    {
        DB::table('users')
        ->where('id', $req->rid)
        ->delete();
        return redirect ('/userlist?success=deleted'); 
    }

    function getuser(Request $req)
    {
        $data = DB::table('users')
        //->join('table_2', 'table_2.id', '='. 'users.id');
        ->where('id', $req->rid)
        ->first();
        return view('useredit',['users'=>$data]);
    }

    function edituser(Request $req)
    {
        $data = DB::table('users')
        ->where('id', $req->rid)
        ->update(array(
            'name'=> $req->fullname,
            'password'=> $req->password,
            'email'=> $req->email,
            'gender'=> $req->gender,
            //'updated_at'=> now(); this is laravel's time, below is database time
            'updated_at'=> DB::raw('now()')
        ));
        return redirect('/userview?rid='.$req->rid.'&success=1'); 
    }

    function viewuser(Request $req)
    {
        $data = DB::table('users')
        ->where('id', $req->rid)
        ->first();
        return view('userview',['users'=>$data]);
    }



}

