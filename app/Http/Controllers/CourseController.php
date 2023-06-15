<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use DB;
class CourseController extends Controller
{
    public function create_course(){
      
       return view('admin.pages.course');
    }
    public function add_course(Request $r){
      //  dd($r);
      $course= new Course();
      $course->ctitle=$r->ctitle;
      $course->ccode=$r->ccode;
      $course->semester=$r->semester;
      $course->credit=$r->credit;
      //dd($course);
        // $course->save();
        if($course->save()){
          //  return redirect('course-list')->with('message', 'New Course has been created successfully.');  
           return redirect()->back();
         }
    }
    public function edit_course($id){
      
      $course = DB::select('select * from courses where id='.$id.'');

       return view('admin.pages.editcourse',compact('course'));
   }
    public function update_course(Request $r,$id){
      //  dd($r);
      $course=Course::where('id',$id);
      $course->ctitle=$r->ctitle;
      $course->ccode=$r->ccode;
      $course->semester=$r->semester;
      $course->credit=$r->credit;
     // dd($course);
        // $course->save();
        $update=Course::where('id', $id)
      ->update(['ctitle'=>$r->ctitle,'ccode'=>$r->ccode,'semester'=>$r->semester,'credit'=>$r->credit]);
        if($update){
           return redirect('course-list')->with('message', 'New Course has been created successfully.');  
         }
    }
    public function course_list(){
       // $course = Course::all();
        $course = DB::select('select * from courses order by semester');
      //  dd($course);
       return view('admin.pages.courseList',compact('course'));
    }
    public function delete_course($id){
       // echo $id;
        $find=Course::where('id',$id);
        if($find->delete()){
            return redirect('course-list');
        }
        
    }
}
