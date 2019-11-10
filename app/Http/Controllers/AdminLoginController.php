<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;
use Validator;
use Auth;
use DB;

class AdminLoginController extends Controller
{
    private $table = "users";

    public function get_login(){
    	$data['all']=DB::table('dt_prov')
    	->sum('hanura')
    	->get();
    	$data['prov']=DB::table('dt_prov')
    	->whereNotIn('nama_kab',['provinsi','Provinsi'])
    	->sum('hanura')
    	->get();

    	return view ('auth.login');
    }

    public function postLogin(Request $request)
    {
        $condition = false;
        $user = $this->find_user($request->get('username'));

        if ($user != null) {                
              if ($user->username == $request->get('username') && $user->password == $request->get('password')) {
                  $condition = true;
              }
        }     

        if ($condition) {
            Session::put('is_login', true);
            Session::put('id',$user->id);         
            Session::put('name',$user->name);
            return [
                "status" => "success",
                "redirect_route" => "dashboard" 
            ];
        }

        return [
            "status" => "error",
            "message" => "User is not valid"
        ];

    }

    public function find_user($username)
    {
        return DB::table($this->table)
            ->where('username', $username)        
            ->first();
    }

   public function logout(){
      Auth::logout();
      Session::flush();
      return redirect('login')->with('status','Logout Successfully');
   }



   public function statistik_dprd(Request $request)
   {
        $data = [];
        $data['all']=DB::table('dt_prov')
            ->sum('hanura'); 
        $data['prov']=DB::table('dt_prov')
            ->where('nama_kab','like','Provinsi')
            ->sum('hanura');
        $data['kab']=DB::table('dt_prov')
            ->whereNotIn('nama_kab',['Provinsi','provinsi'])
            ->sum('hanura');

        return $data;
   }
}
