<?php

namespace App\Http\Controllers;
use App\Models\UserSession;
use Illuminate\Http\Request;
use Session;

class SessionController extends Controller
{
    public function create_session(){
        return view('admin.pages.session');
    }
    public function add_session(Request $r){
        $session_year=$r->session_year;
        $session_type=$r->session_type;
        // echo $session_type.' '.$session_year;
        $session= new UserSession();
        $session->session=$session_type.'-'.$session_year;
        if($session->save()){
            return redirect('session-list')->with('message', 'Session has been created successfully.');  
        }
    }
    public function session_list(){
        $sessions = UserSession::all();
        return view('admin.pages.sessionList',compact('sessions'));
    }
    public function delete_session($id){
        echo $id;
        $find=UserSession::where('id',$id);
        if($find->delete()){
            return redirect('session-list');
        }
        
    }
}
