<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use DB;
class AllApiController extends Controller
{
    //
    public function semester_subjects($id){
        $course=DB::select('SELECT * from courses WHERE semester='.$id.'');
        return response()->json([
           'data'=>$course,
           'message'=>$course? 'course found' : 'course not found'
        ]);
    }


    public function offered_sub(Request $request){
        // $data = $request->all();
        // print_r($data);
        $semester=$request->semester;
        $session_id=$request->session_id;
        // echo $semester.' '.$session_id;
        $course=DB::select('SELECT courses.id AS id ,courses.ctitle As ctitle FROM (SELECT * FROM offered__subjects WHERE session_id ='.$session_id.') AS T INNER JOIN courses ON T.course_id=courses.id AND courses.semester='.$semester.';');
        return response()->json([
           'data'=>$course,
           'message'=>$course? 'course found' : 'course not found'
        ]);
    }


    public function session_semester($id){
        $course=DB::select(' select DISTINCT semester from offered__subjects join courses on offered__subjects.course_id=courses.id where offered__subjects.session_id='.$id.'');
       
        return response()->json([
           'data'=>$course,
           'message'=>$course? 'course found' : 'course not found'
        ]);
    }
    public function session_subject($session,$semester){
      
        $course=DB::select('select ctitle,ccode from offered__subjects join courses on offered__subjects.course_id=courses.id where offered__subjects.session_id='.$session.' and semester='.$semester.'');
      // dd($course);
        return response()->json([
           'data'=>$course,
           'message'=>$course? 'course found' : 'course not found'
        ]);
    }
    
    public function overlap($session){
        $course=DB::select('SELECT max(semester)as sem,student_id as st from enrollments where session_id='.$session.' group by(student_id);');
        // return response()->json([
        //    'data'=>$course,
        //    'message'=>$course? 'course found' : 'course not found'
        // ]);
       // dd('hhh');
     //dd($course);
       $problem= array(array());
       $real=array(array(array()));
       foreach($course as $c)
       {
       // $over=DB::select('select * from enrollments where session_id='.$session.' and semester!='.$c->sem.' and student_id='.$c->st.'');
        $over=DB::select('SELECT * FROM enrollments join courses on enrollments.course_id=courses.id where session_id='.$session.' and student_id='.$c->st.' and courses.semester!='.$c->sem.';');
        foreach($over as $ov)
        {
            if(!isset($problem[$c->sem][$ov->course_id]))
            $problem[$c->sem][$ov->course_id]=0;
            $problem[$c->sem][$ov->course_id]=$problem[$c->sem][$ov->course_id]+1;
            //echo $c->sem.' '.$ov->course.'<br>';
        }
       }
      // dd($problem);
   for($i=0;$i<10;$i++)
  {
    for($j=0;$j<1000;$j++)
    {
        if(isset($problem[$i][$j]))
        {
            $over=DB::select('select * from courses where id='.$j.'');
            $s=$over[0]->ctitle.'#'.$over[0]->ccode."#".$over[0]->credit;
            if(!isset( $real[$problem[$i][$j]][$s][$i]))
            $real[$problem[$i][$j]][$s][$i]=0;
            $real[$problem[$i][$j]][$s][$i]++;
        }
       
    }
  }
 // krsort($real);
//dd($real);
  return response()->json([
    'data'=>$real,
    'message'=>$course? 'course found' : 'course not found'
 ]);
 
       
      
    }
}
