<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\user;
use Mail;
use App\Mail\ConfirmationMail;
use Illuminate\Support\Facades\Hash;
class PaymentController extends Controller
{
    public function createRequest(request $request)
    {
       $form_input_post_data=$request->all();
        // echo "<pre>";print_r($form_input_post_data);die;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:c6027ca57843c6df6773feffb9d172bf",
                        "X-Auth-Token:28b84625dff412bc70a61ca631751145"));
                        
                   
        
        $payload = Array(
            'purpose' => 'NEXEL Academy Subscription',
            'amount' => '998',
            'phone' => $request->phone,
            'buyer_name' => $request->username,
            'course_id' => $request->course_id,
            'redirect_url' => 'https://acad.nexelworld.com/test',
            'send_email' => false,
            'webhook' => 'https://acad.nexelworld.com/webhook/',
            'send_sms' => false,
            'email' => $request->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 
        
        $course_ids = Auth::user()->course_ids;
        $user_id = Auth::user()->id;
        // echo "<pre>";print_r($form_input_post_data['course_id']);die;
        if($course_ids==NULL)
        {
            $course_bought=$form_input_post_data['course_id'];
        }
        else{
            $exploded_course_bought=explode(',',$course_ids);
            // $array=array($course_bought);
           
            $er=array_push($exploded_course_bought,$form_input_post_data['course_id']);
            
            
            $course_bought=implode(',',array_unique($exploded_course_bought));

        }

       

        $update = DB::table('users')
            ->where('id', $user_id)
            ->update(['course_ids' => $course_bought]);
        // 
        DB::table('user_payment_details')->insert(
            ['user_id' => $user_id, 'course_id' => $form_input_post_data['course_id']]
        );

   
// echo $course_bought;die;
        $data = json_decode($response, true);

        
        return redirect($data['payment_request']['longurl']);
    }


    public function buy_course_custom_login()
    {
        return view('buy_course_custom_login');

          
    }

    public function custom_login(request $request)
    {
        $data=$request->all();
        $email=$data['email'];
        $password=$data['password'];
       

        $this->validate($request, [
            'email'=>'required|email',
            'password' => 'required',
           
            ]);

            $userdata = array(
                'email' => $data['email'],
                'password' => $data['password'],
              );

              if (Auth::attempt($userdata))
              {
                return redirect('home');
              }
              else
              {
                return redirect()->back()->with('danger', 'Invalid Input. Please try again !!');          
              }

       
          
    }

    public function user_subscription(request $request)
    {
        $data=$request->all();
        // echo "<pre>";print_r($data);die;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:c6027ca57843c6df6773feffb9d172bf",
                        "X-Auth-Token:28b84625dff412bc70a61ca631751145"));
                        
                   
        
        $payload = Array(
            'purpose' => 'NEXEL Academy Subscription',
            'amount' => '948',
            'phone' => Auth::user()->mobile_number,
            'buyer_name' => Auth::user()->name,
            'redirect_url' => 'https://acad.nexelworld.com/subscription',
            'send_email' => false,
            'webhook' => 'https://acad.nexelworld.com/webhook/',
            'send_sms' => false,
            'email' => Auth::user()->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 

        $data = json_decode($response, true);

        
        return redirect($data['payment_request']['longurl']);
        // echo "<pre>";print_r($response);die;
        
    }

    public function subscription(request $request)
    {
        $data = $request->all();
        $user_id=Auth::User()->id;
        $payment_id=$data['payment_id'];
        $payment_status=$data['payment_status'];
        $payment_request_id=$data['payment_request_id'];
 
        $course=\App\course::select('course_id')->distinct()->get();
        DB::table('users')
             ->where('id', $user_id)
             ->update(['payment_id' => $payment_id,'payment_status'=>$payment_status,'payment_request_id'=>$payment_request_id,'credits'=>1000]);
         
             $email=Auth::User()->email;
             $name=Auth::User()->name;
             Mail::to($email)->send(new ConfirmationMail($name));
 
  $refered_by_details=\App\User::where('id',Auth::User()->refered_by_user_id)
             ->first();
             $available_credits=$refered_by_details->credits;
     
             DB::table('users')
             ->where('id', Auth::User()->refered_by_user_id)
             ->update(['credits'=>$available_credits+100]);
 
         return view('home',compact('course'));
    }


    public function user_reference($user_id,$reference_number)
    {
        return view('reference_join_page',compact('user_id','reference_number'));
    
    }

    public function reference_join_post(request $request)
    {
        $data = $request->all();

        $validatedData = $request->validate([
            'email' => 'unique:users',
            
        ], [
    
                'email.unique' => 'Email already exists.',
     
    
            ]);

        $user_id=DB::table('users')->insertGetId(
            ['reference_number'=>$data['reference_code'],'referred_by'=>$data['refered_by_user_id'],'name' => $data['name'],'email'=>$data['email'],'mobile_number'=>$data['mobile_number'],'profession'=>$data['profession'],'password'=>Hash::make($data['password'])]
        );
    
        
        $user = \App\User::where('id','=',$user_id)->first();
        Auth::login($user);
        // echo "<pre>";print_r($data);die;
        $email=Auth::User()->email;
        $name=Auth::User()->name;
       
      

      

       
        return view('payment_screen',compact('name','email'));

        


 
    }

    public function lp_invite($reference_number)
    {
     $real_reference_number='erT45bnYuiOp';
        if($real_reference_number==$reference_number)
        {
            return view('lp_invite',compact('real_reference_number'));
        }
        else{
            return redirect('/');          
        }

     
    }

    public function post_invite_register(request $request)
    {
        $data = $request->all();
        $reference_code=$data['real_reference_number'];
        $name=$data['name'];
        $email=$data['email'];
        $mobile_number=$data['mobile_number'];
        $password=$data['password'];
        $password_confirmation=$data['password_confirmation'];


 $validatedData = $request->validate([
        'email' => 'unique:users',
        
    ], [
            'email.unique' => 'Email already exists.',     
        ]);

        $user_id=DB::table('users')->insertGetId(
            ['lp_invite_ref_code'=>$data['real_reference_number'],'credits'=>0,'name' => $data['name'],'email'=>$data['email'],'mobile_number'=>$data['mobile_number'],'password'=>Hash::make($data['password'])]
        );
     
        $user = \App\User::where('id','=',$user_id)->first();
        Auth::login($user);

        return redirect('lp_invite_dashboard');          

    }
       


}
