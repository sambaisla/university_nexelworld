<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\course;

Route::get('/', function () {

    $courses = course::select('course_id')
                        ->distinct()
                        ->get();
                    
    // echo "<pre>";print_r($courses);die;
    return view('welcome',compact('courses'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', 'HomeController@test')->name('test');
Route::post('/test', 'HomeController@test')->name('test');


Route::get('/full_course_details-{course_id}','Courses@full_course_details')->name('full_course_details');

Route::get('/chapter_tutorial-{course_id}-{chapter_id}','Courses@chapter_tutorial')->name('chapter_tutorial')->middleware('auth');

Route::post('/user_answers','Courses@user_answers')->name('user_answers');

Route::post('/buy_course','PaymentController@createRequest')->name('buy_course')->middleware('auth');
Route::get('/buy_course','PaymentController@createRequest')->name('buy_course')->middleware('auth');

Route::get('/course_from_dashboard-{course_id}','HomeController@course_from_dashboard')->name('course_from_dashboard');

Route::get('/user_chapter-{course_id}-{chapter_id}','HomeController@user_chapter')->name('user_chapter');

Route::post('/user_answer_for_chapter_questions','HomeController@user_answer_for_chapter_questions')->name('user_answer_for_chapter_questions');

Route::get('/edit_profile-{user_id}','HomeController@edit_profile')->name('edit_profile');

Route::post('/user_edit_profile','HomeController@user_edit_profile')->name('user_edit_profile');

Route::get('/custom_logout', function () {

    Auth::logout();
    return redirect('/');
});

Route::get('/buy_course_custom_login','PaymentController@buy_course_custom_login')->name('buy_course_custom_login');

Route::post('/custom_login','PaymentController@custom_login')->name('custom_login');

Route::get('/password_reset', function () {

    return view('password_reset');
})->name('password_reset');


Route::post('/email_for_password_change','Courses@email_for_password_change')->name('email_for_password_change');

Route::get('/password_reset_filter-{email}', function ($email) {

    return view('password_reset_filter',compact('email'));
})->name('password_reset_filter');

Route::post('/postChangePassword','Courses@postChangePassword')->name('postChangePassword');

Route::get('/index',function(){
    return view('index');
});
Route::get('/user_subscription','PaymentController@user_subscription')->name('user_subscription');

Route::get('/subscription', 'PaymentController@subscription')->name('subscription');
Route::post('/subscription', 'PaymentController@subscription')->name('subscription');

Route::get('/refer_friend', 'HomeController@refer_friend')->name('refer_friend');

Route::get('/user_reference/{user_id}/{reference_number}', 'PaymentController@user_reference')->name('user_reference');

Route::post('/reference_join_post', 'PaymentController@reference_join_post')->name('reference_join_post');

Route::get('/user_watched_courses-{course_id}', 'Courses@user_watched_courses')->name('user_watched_courses');

Route::get('/course_chapters-{course_id}',function($course_id){
    $course_details=\App\course::where('course_id',$course_id)
                    ->get();

                    $other_courses=\App\course::select('course_id')
                    ->distinct()
                    ->where('course_id','!=',$course_id)
                    ->get();
    
    return view('course_chapters',compact('course_id','course_details','other_courses'));
})->name('course_chapters');

Route::get('/user_watching_chapter-{course_id}-{chapter_id}',function($course_id,$chapter_id){
 
    $user_id=Auth::User()->id;
    $other_courses=\App\course::select('course_id')
    ->distinct()
    ->where('course_id','!=',$course_id)
    ->get();
   
    $selected_chapter_details=\App\course::where('course_id',$course_id)
    ->where('chapter_id',$chapter_id)
    ->get();

    $course_watched_count = \App\chapters_completed_user_details::where('user_id',$user_id)
    ->where('course_id',$course_id)
    ->count();

    

    if($course_watched_count==1){
                $user_last_record=DB::table('chapters_completed_user_details')
                ->where('user_id',$user_id)
                ->where('course_id',$course_id)
                ->orderBy('id', 'desc')
                ->first();

                $last_watched_chapter_id=$user_last_record->chapter_id;
                $chapter_id_next=$last_watched_chapter_id;

                if($chapter_id!=$chapter_id_next)
                {
                    return Redirect::route('course_chapters',$course_id);

                }
                else{
                    return view('user_chapter',compact('course_id','other_courses','selected_chapter_details','chapter_id'));

                }
    }
    elseif($course_watched_count==2)
    {
        $user_last_record=DB::table('chapters_completed_user_details')
        ->where('user_id',$user_id)
        ->where('course_id',$course_id)
        ->orderBy('id', 'desc')
        ->first();

        // echo "<pre>";print_r($course_watched_count);die; 
        $last_watched_chapter_id=$user_last_record->chapter_id;
        $chapter_id_next=$last_watched_chapter_id;

        if($chapter_id!=$chapter_id_next)
        {
            return Redirect::route('course_chapters',$course_id);

        }
        else{
            return view('user_chapter',compact('course_id','other_courses','selected_chapter_details','chapter_id'));

        }
    }
    elseif($course_watched_count>2)
    {
            $user_last_record=DB::table('chapters_completed_user_details')
            ->where('user_id',$user_id)
            ->where('course_id',$course_id)
            ->orderBy('id', 'desc')
            ->first();

            $last_watched_chapter_id=$user_last_record->chapter_id;
            $chapter_id_next=$last_watched_chapter_id;

            if($chapter_id!=$chapter_id_next)
            {
                return Redirect::route('course_chapters',$course_id);

            }
            else{
                return view('user_chapter',compact('course_id','other_courses','selected_chapter_details','chapter_id'));

            }
          

    }



})->name('user_watching_chapter');

Route::get('/my_courses', 'Courses@my_courses')->name('my_courses');

Route::get('/launchpad',function(){
    return view('launchpad');
});




Route::get('/lp_invite-{reference_number}', 'PaymentController@lp_invite')->name('lp_invite');
Route::get('/invite_registration_form/{real_reference_number}',function($real_reference_number){
    
    // echo $real_reference_number;die;
    return view('invite_registration_form',compact('real_reference_number'));
})->name('invite_registration_form');


Route::post('/post_invite_register', 'PaymentController@post_invite_register')->name('post_invite_register');

Route::get('/lp_invite_dashboard',function(){

    $course=\App\course::select('course_id')
    ->distinct()
    ->get();
    return view('home',compact('course'));
});
