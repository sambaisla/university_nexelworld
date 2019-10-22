<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\course;
use App\questions;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use Redirect;
use App\User;
use Mail;
use App\Mail\PasswordChange;


class Courses extends Controller
{

    public function email_for_password_change(Request $request){

        $data = $request->all();
    
        if (User::where('email', '=', Input::get('email'))->exists()) {
            return redirect()->route('password_reset_filter', ['email' => Input::get('email')]);
         }
         else {
            return redirect()->back()->with("status","This Email does not exists. Please try again.");
         }
    
      }

      public function postChangePassword(Request $request){

        $data = $request->all();
    
        $this->validate($request, [
    
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
            ]);
    
    
    
     //Change Password
            $update=DB::table('users')
            ->where('email',$data['existing_email'])
            ->update(['password'=>bcrypt($data['password_confirmation'])]);
    
    $existing_email=$data['existing_email'];
    
     Mail::to($existing_email)->send(new PasswordChange());
    
    return redirect('login')->with("status","Password changed successfully !");
    
    }

    public function full_course_details($course_id)
    {
        // echo "<pre>";print_r($course_id);die;
    $chapter_details=course::where('course_id',$course_id)
                    ->get();

                    $all_courses=course::select('course_id')
                    ->distinct()
                  
                    ->get();               
    //   echo "<pre>";print_r($chapter_details[0]['course_description']);die;
      return view('course_details',compact('course_id','chapter_details','all_courses'));

    }


    public function chapter_tutorial($course_id,$chapter_id)
    {
    $chapter_details=course::where('chapter_id',$chapter_id)
                    ->get();

    $questions_details=questions::where('course_id',$course_id)
                    ->where('chapter_id',$chapter_id)
                    ->get();

//   echo "<pre>";print_r($questions_details);die;
      return view('chapter_details',compact('questions_details','chapter_details','course_id','chapter_id'));

    }


   

    

    public function user_answers(Request $request)
    {
          $data=$request->all();

          $questions_count = questions::where('course_id',$data['course_id'])
          ->where('chapter_id',$data['chapter_id'])
          ->count();
          if(Input::has('choice')){
              $choice=$data['choice'];
               $user_choice_count=count($choice);
               if($questions_count==$user_choice_count)
               {
                $question_id=$data['question_id'];
                $correct_answer=$data['correct_answer'];
                $question_marks=$data['question_marks'];
                $user_ans=$data['choice'];
                $marks_obtains=0;
                $user_id=Auth::user()->id;
                        for($i=0;$i<count($question_id);$i++)
                        {
                            if($correct_answer[$i]==$user_ans[$i])
                            {
                                $marks_obtains=$question_marks[$i];
                            }
                            else{
                                $marks_obtains=0;
                            }
                            DB::table('user_answer')->insert(
                                [
                                    'user_id' => $user_id, 
                                    'course_id' => $data['course_id'],
                                    'chapter_id'=>$data['chapter_id'],
                                    'question_id'=>$question_id[$i],
                                    'correct_answer'=>$correct_answer[$i],
                                    'user_answer'=>$user_ans[$i],
                                    'user_score'=>$marks_obtains

                                ]
                            );
                           
                        }
                        return Redirect::route('full_course_details', [$data['course_id']])->with('success', 'marks entered successfully');
                        // return redirect()->back()->with('success', 'marks entered successfully');

               }
               else{
                return redirect()->back()->with('error', 'Please answer all questions.');

               }
            
           }
           else{
            return redirect()->back()->with('error', 'Give answer to all questions.');
           }
          

    }



    public function user_watched_courses($course_id)
    {
        $user_id=Auth::User()->id;
       $course_watched_count = \App\chapters_completed_user_details::where('user_id',$user_id)
       ->where('course_id',$course_id)
       ->count();

                if($course_watched_count==0)
                {
                    DB::table('chapters_completed_user_details')->insert(
                        [
                            'user_id' => $user_id, 
                            'course_id' => $course_id,
                            'chapter_id'=>1,
                        ]
                    );
                }
                return redirect()->route('course_chapters', $course_id);
                           
    }




    public function my_courses()
    {
        $user_id=Auth::User()->id;
        $course=\App\chapters_completed_user_details::
        select('course_id')
        ->distinct()
        ->where('user_id',$user_id)
        ->get();
        return view('my_courses',compact('course'));
 
    }



}
