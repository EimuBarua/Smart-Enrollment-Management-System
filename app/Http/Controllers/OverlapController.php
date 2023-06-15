<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class OverlapController extends Controller
{
    public function overlap(){
        $session = DB::select('SELECT *
            FROM user_sessions;');
        return view('admin.pages.overlap',compact('session'));
    }
}
