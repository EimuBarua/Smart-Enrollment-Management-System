<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Image;
use DB;
class AuthController extends Controller
{
    //
    public function register(){
        return view('website.pages.register');
    }
    public function storeRegister(Request $req){
        $fname=$req->fname;
        $stdId=$req->stdId;
        $email=$req->email;
        $dob=$req->dob;
        $address=$req->address;
        $pass=$req->pass;
        $confpass=$req->confpass;
        $gender=$req->gender;

        $x=time();
        $originalImage= $req->file('filename');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path().'/thumbnail/';
        $originalPath = public_path().'/images/';
        $thumbnailImage->save($originalPath.$x.$originalImage->getClientOriginalName());
        $thumbnailImage->resize(150,150);
        $thumbnailImage->save($thumbnailPath.$x.$originalImage->getClientOriginalName()); 

        $usermodel= new UserModel();
        $usermodel->stu_id=$stdId;
        $usermodel->fullname=$fname;
        $usermodel->email=$email;
        $usermodel->dob=$dob;
        $usermodel->address=$address;
        $usermodel->filename=$x.$originalImage->getClientOriginalName();
        $usermodel->password=md5($pass);
        $usermodel->gender=$gender;
        $usermodel->role='student';
        $usermodel->isactive=FALSE;
        if($pass == $confpass){
            if($usermodel->save()){
                return redirect('login')->with('message', 'Your account has been created successfully.');  
            }
        }else{
            return redirect()->back()->with('message', 'Password and Confirm Password are not equal.');
        }



        // return 'fullname: '.$fname.' '.$stdId.' '.$email.' '.$dob.' '.'address= '.$address.' '.'filename:= '.$filename.' '.'Pass= '.$pass.' '.'confPass= '.$confpass.' '.$gender;
        
        // dd($req);
    }
    public function login(){
        return view('website.pages.login');
    }
    public function dashboard(){

        return view('admin.pages.dashboard');
    }
    public function storeLogin(Request $req){
      
        $stdId=$req->stdId;
        
        $pass=$req->pass;
        echo $stdId.' '.$pass;
        $find=UserModel::where('stu_id','=',$stdId)
        ->where('password','=',md5($pass))
        ->first();
        if(!$find){
            return redirect('login')->with('message','Email or pass is invalid');
        }else{
            $req->session()->put('username',$find->fullname);
            $req->session()->put('userid',$find->id);
            $req->session()->put('useremail',$find->email);
            $req->session()->put('userrole',$find->role);
            return redirect('dashboard'); 
        }
        
    }
    public function logout(Request $request){
        $request->session()->forget(['username', 'userrole', 'useremail']);
        return redirect('login');
    }

}
