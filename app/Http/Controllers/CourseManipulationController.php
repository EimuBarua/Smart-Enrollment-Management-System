<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSession;
use App\Models\Course;
use App\Models\Offered_Subject;
use DB;
class CourseManipulationController extends Controller
{
    public function assign_course($id){
        $semester = DB::select('SELECT DISTINCT semester
        FROM courses;');
        return view('admin.pages.assignCourse',compact('semester','id'));
    }
    public function addsession_courses(Request $r,$id){
        
        
        foreach ($r->course_id as $c) 
        {
            $os= new Offered_Subject();
            $os->session_id=$id;
            $os->course_id=$c;
            $os->save();
        }
        return redirect('display-subjects/'.$id);

    }
    public function display_offered_subjecs($id){
        // $oSub = DB::select('SELECT * FROM (SELECT T.id AS id,T.course_title AS course_title ,T.semester AS semester,T.course_code AS course_code,T.credit AS credit,T.session_id AS session_id, T.course_id AS course_id,sessions.session AS session,T.created_at AS created_at,T.updated_at AS updated_at  FROM (SELECT O.id AS id,C.ctitle AS course_title,C.semester AS semester,C.ccode AS course_code,C.credit AS credit,O.session_id AS session_id,O.course_id AS course_id,O.created_at AS created_at ,O.updated_at AS updated_at FROM courses AS C INNER JOIN offered__subjects As O ON O.course_id=C.id) AS T INNER JOIN sessions ON T.session_id=sessions.id) AS F WHERE F.session_id='.$id.';');

        $oSub = DB::select('SELECT * FROM (SELECT T.id AS id,T.course_title AS course_title ,T.semester AS semester,T.course_code AS course_code,T.credit AS credit,T.session_id AS session_id, T.course_id AS course_id,user_sessions.session AS session,T.created_at AS created_at,T.updated_at AS updated_at  FROM (SELECT O.id AS id,C.ctitle AS course_title,C.semester AS semester,C.ccode AS course_code,C.credit AS credit,O.session_id AS session_id,O.course_id AS course_id,O.created_at AS created_at ,O.updated_at AS updated_at FROM courses AS C INNER JOIN offered__subjects As O ON O.course_id=C.id) AS T INNER JOIN user_sessions ON T.session_id=user_sessions.id) AS F WHERE F.session_id='.$id.';');

        $sessions = DB::select('SELECT * FROM user_sessions  WHERE id ='.$id.';');
        $s=$sessions[0]->session;
        
        // echo $s;
        return view('admin.pages.disOfferedSub',compact('oSub','id','s'));
    }
}



