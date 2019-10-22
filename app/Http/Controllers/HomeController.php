<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;
use App\Mail\ConfirmationMail;
use Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // echo "ddd";die;

        $course=\App\course::select('course_id')->distinct()->get();
        // echo "<pre>";print_r($course_details[0]->course_name);die;
        $user_payment_details=\App\user_payment_details::select('course_id')
                    ->where('user_id',Auth::User()->id)
                    ->whereNotNull('payment_id')
                    ->get();

        $email=Auth::User()->email;
        $name=Auth::User()->name;
          $payment_id=Auth::User()->payment_id;

        if($payment_id==NULL)
        {
            return view('payment_screen',compact('name','email'));

        }
        else{
          
            return view('home',compact('course'));

        }
    }

    public function course_from_dashboard($course_id)
    {
        $selected_course_details=\App\course::where('course_id',$course_id)->get();
        // echo "<pre>";print_r($course_details[0]->course_name);die;
        return view('user_dashboard_for_courses',compact('course_id','selected_course_details'));
    }

    public function user_chapter($course_id,$chapter_id)
    {
        // echo "<pre>";print_r($course_id);die;
        $selected_course_details=\App\course::select('course_id')->distinct()->where('course_id',$course_id)->get();
        $cr_id=$course_id;
        $user_payment_details=\App\user_payment_details::select('course_id')
        ->where('user_id',Auth::User()->id)
        ->whereNotNull('payment_id')
        ->get();

        $selected_chapter_details=\App\course::where('course_id',$course_id)->where('chapter_id',$chapter_id)->get();
        // echo "<pre>";print_r($course_details[0]->course_name);die;
        return view('user_chapter',compact('user_payment_details','cr_id','selected_course_details','selected_chapter_details','chapter_id'));
    }



    public function user_answer_for_chapter_questions(Request $request)
    {
          $data=$request->all();
          $validatedData = $request->validate([
            'question_1' => 'required',
            'question_2' => 'required',
        ]);

         $question_1_ans=$data['question_1'];
         $question_2_ans=$data['question_2'];
         $course_id=$data['course_id'];
         $chapter_id=$data['chapter_id'];
         $user_id=Auth::User()->id;
      
        

         $course_details_for_copletion= DB::table('courses')
         ->select('course_completed_by')
         ->where('course_id', $course_id)
         ->where('chapter_id',$chapter_id)
         ->get()
         ->toArray();
 
        $course_completed_by=$course_details_for_copletion[0]->course_completed_by;
 
 
         if($course_completed_by==NULL)
         {
             $course_completed_by=$user_id;
         }
         else{
             $array=array($course_completed_by);
             array_push($array,$user_id);
             $course_completed_by=implode(',',$array);
 
         }
         $update = DB::table('courses')
             ->where('course_id', $course_id)
             ->where('chapter_id', $chapter_id)
             ->update(['course_completed_by' => $course_completed_by]);

             
//update user table for earned credits 
         $user_available_credits=Auth::User()->credits;

        //  echo "<pre>";print_r($user_available_credits);die;
                $update = DB::table('users')
                ->where('id', $user_id) 
                ->update(['credits' => $user_available_credits+10]);

                
             DB::table('user_answer')->insert(
                [
                    'user_id' => $user_id,
                     'course_id' => $course_id,
                     'chapter_id'=>$chapter_id,
                     'question_id'=>1,
                     'question_name'=>'Top 3 things you learned from this lesson:',
                     'user_answer'=>$question_1_ans

                ]
            );

            DB::table('user_answer')->insert(
                [
                    'user_id' => $user_id,
                     'course_id' => $course_id,
                     'chapter_id'=>$chapter_id,
                     'question_id'=>2,
                     'question_name'=>'What actions/Steps are you going to take now ?',
                     'user_answer'=>$question_2_ans

                ]
            );






             return Redirect::route('home')->with('success', 'Congrats !! you have earned 10 credits. Next chapter is unlocked !!');

          
    }
    
    
     public function test(Request $request)
    {
        $data=$request->all();
       
        $course_ids=Auth::User()->course_ids;
        $explode=explode(',',$course_ids);
        $end_course_id=end($explode);
        
        $user_id=Auth::User()->id;
        $payment_id=$data['payment_id'];
        $payment_status=$data['payment_status'];
        $payment_request_id=$data['payment_request_id'];
        
          $update = DB::table('users')
             ->where('id', $user_id)
             
             ->update(['payment_id' => $payment_id,'payment_status'=>$payment_status,'payment_request_id'=>$payment_request_id]);
        

             $update = DB::table('user_payment_details')
             ->where('user_id', $user_id)
             ->where('course_id', $end_course_id)
             ->update(['payment_id' => $payment_id,'payment_status'=>$payment_status,'payment_request_id'=>$payment_request_id]);

        return redirect('home');
       // return Redirect::route('/home');
        
    }

    public function edit_profile($user_id)
    {
        $course=\App\course::select('course_id')->distinct()->get();
        // echo "<pre>";print_r($course_details[0]->course_name);die;
        $user_payment_details=\App\user_payment_details::select('course_id')
                    ->where('user_id',Auth::User()->id)
                    ->whereNotNull('payment_id')
                    ->get();


        return view('edit_profile',compact('course','user_payment_details'));
    }



    public function user_edit_profile(Request $request)
    {
          $data=$request->all();
          $user_id=Auth::User()->id;
        //   echo "<pre>";print_r($data);die;
          DB::table('users')
            ->where('id', $user_id)
            ->update(['name' => $data['name'],'email'=>$data['email'],'mobile_number'=>$data['mobile_number'],'profession'=>$data['profession']]);

            return redirect('home');


    }


    public function refer_friend()
    {
        
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $reference_code = '';
        for ($i = 0; $i < 20; $i++) {
            $reference_code .= $characters[rand(0, $charactersLength - 1)];
        }

        
        $id=DB::table('reference_details')->insertGetId(
            ['user_id' => Auth::User()->id,'reference_number'=>$reference_code]
        );
        
        $reference_details=\App\reference_details::where('user_id',Auth::User()->id)
        ->first();

        // echo "<pre>";print_r($reference_details);die;
     
        $reference_url="http://academy.brandsamosa.com/user_reference/".Auth::User()->id.'/'.$reference_details->reference_number;

       
        $course=\App\course::select('course_id')
        ->distinct()
        ->get();
        return view('refer_page',compact('course','reference_code','reference_url'));


    }
  





}
