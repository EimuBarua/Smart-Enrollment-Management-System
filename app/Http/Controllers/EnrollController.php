<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Enrollment;
use Session;
class EnrollController extends Controller
{
    //
    public function enroll(){

        $userid=Session::get('userid');
        $session=DB::table('user_sessions')->latest('created_at')->first();
        $sid=$session->id;
        $ssession=$session->session;

        if (Enrollment::where('student_id', '=', $userid)->where('session_id','=',$sid)->exists()) {
           return redirect()->back()->with('message','Your cannot enroll twice');
        }
        else
        {

            $semester = DB::select('SELECT DISTINCT courses.semester AS semester FROM (SELECT * FROM offered__subjects WHERE session_id ='.$sid.') AS T INNER JOIN courses ON T.course_id=courses.id;');
            return view('website.pages.enrollCourse',compact('semester','sid','ssession'));
        }
        
    }
    public function addEnroll(Request $r,$id,$sid){
        $m=max($r->course_id);
        $semester = DB::select('SELECT *
        FROM courses WHERE id='.$m.';');


        for($i=0;$i<count($r->course_id);$i++){
            $e= new Enrollment();
            $e->semester=$semester[0]->semester;
            $e->student_id=$id;
            $e->course_id=$r->course_id[$i];
            
            if(empty($r->type[$i])){
                $e->type='regular';
            }else{
                $e->type=$r->type[$i];
            }
            $e->session_id=$sid;
            $e->save();
            
        }
        return redirect('dashboard');
        // foreach ($r->course_id as $c) 
        // {
        //     $os= new Offered_Subject();
        //     $os->session_id=$id;
        //     $os->course_id=$c;
        //     $os->save();
        // }
        //;
    }
}
