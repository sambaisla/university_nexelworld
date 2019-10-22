<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>My Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
  
<link href="bsa_dashboard/architectui-html-free/main.css" rel="stylesheet">
<style>
        .course_video{
            width:100%;
        }
        </style> 
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                {{-- <div class="logo-src"></div> --}}
                <a href="{{url('/')}}"><img src="theme/img/logo.png" class="img-fluid" alt="Brand samosa" width="75px" height="23px"></a>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
  
        </div>        
             
        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">



                                <ul class="vertical-nav-menu">
                                        <li class="app-sidebar__heading"></li>
                                        <li>
                                            <a href="{{url('/home')}}" class="mm-active">
                                                <i class="metismenu-icon pe-7s-id"></i>
                                                Welcome {{Auth::User()->name}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('/refer_friend')}}" class="">
                                                <i class="metismenu-icon pe-7s-paper-plane"></i>
                                                Refer your friend
                                            </a>
                                        </li>
                                
                       {{-- for purchased courses --}}

                     

                       <li class="app-sidebar__heading">My Courses</li>

                       <li>

                           @foreach($selected_course_details as $val)
                           <?php
                           $course_details=\App\course::where('course_id',$val->course_id)
                           ->first();

                           $chapter_details=\App\course::where('course_id',$val->course_id)
                                           ->get();
                       
                           
                           ?>
                           <a href="#">
                               <i class="metismenu-icon pe-7s-diamond"></i>
                               
                               
                               {{$course_details->course_name}}
                           
                               <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                           </a>

                               <ul>
                                   @foreach($chapter_details as $chapter)
                                           <li>
                                               <a href="{{url('user_chapter'.'-'.$val->course_id.'-'.$chapter->chapter_id)}}">
                                                   <i class="metismenu-icon"></i>

                                                   {{ Str::words($chapter->chapter_name, 5)}}
                                                   {{-- {{}} --}}
                                               </a>
                                           </li>
                                   @endforeach 
                               </ul>



                       @endforeach            
                       </li>
                   
          
{{-- end of purchased courses --}}                        
                                    </ul>
                        </div>
                    </div>
                </div>    
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    
                                  <div>  <b> Welcome to your dashboard </b>
                                       
                                    </div>
                                </div>
                                <div class="page-title-actions">
  
                                    <div class="d-inline-block dropdown">
                                        
                                        
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                
                                            </span>
                                            {{Auth::User()->name}}

                                            
                                        </button>
                                        
                                        
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a href="{{url('edit_profile-'.Auth::User()->id)}}" class="nav-link">
                                                        <i class="nav-link-icon lnr-inbox"></i>
                                                        <span>
                                                         <!-- Edit Profile -->
                                                        </span>
                                                    </a>
                                                </li>


                                                <li class="nav-item">
                                                 


                                                 <a href="{{ route('password_reset') }}" class="nav-link" style="text-decoration:none;">
                                                        <i class="nav-link-icon lnr-inbox"></i>
                                                        <span>
                                                        Change password
                                                        </span>
                                                    </a>
                                            </li>


                                            <li class="nav-item">
                                                <a href="{{ route('password_reset') }}" class="nav-link" style="text-decoration:none;">
                                                       <i class="nav-link-icon lnr-inbox"></i>
                                                       <span>
                                                      My Wallet-{{Auth::User()->credits}}
                                                       </span>
                                                   </a>
                                           </li>

                                                <li class="nav-item">
                                                 


                                                     <a href="{{ url('custom_logout') }}" class="nav-link">
                                                            <i class="nav-link-icon lnr-inbox"></i>
                                                            <span>
                                                             Logout
                                                            </span>
                                                        </a>
                                                </li>
                                             
                                            </ul> 
                                            
                                            
                                            
                                        </div>
                                    
                                    </div>
                        </div>  

                      </div>

                     </div>           



{{-- main content --}}

<?php

$course_info = DB::table("courses")
    ->where('course_id',$cr_id) 
    ->whereRaw("find_in_set('".Auth::User()->id."',course_completed_by)")
    ->get();
?>


   
              @if(count($course_info)==0)

                  @if($chapter_id==1)
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <iframe class="course_video" height="400" src="{{$selected_chapter_details[0]->course_youtube_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>       
                                            </div>                             
                                    </div>                          
                                </div>                                       
                            </div>
                            <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        
                                        <p style="color:red;font-weight:bold;font-size:16px;">NOTE: All questions are compulsory to unlock next chapter.</p>
                                    
                                        <form method="POST" action="{{url('user_answer_for_chapter_questions')}}">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail11" class="" style="font-size:16px;">Top 3 things you learned from this lesson : <span style="font-weight:bold;font-size:16px;">(Max. 250 characters)</span></label>
                                                        <textarea name="question_1" class="form-control" maxlength="250" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <label for="examplePassword11" class="" style="font-size:16px;">What actions/Steps are you going to take now ? <span style="font-weight:bold;font-size:16px;">(Max. 250 characters)</span></label>
                                                        <textarea name="question_2" class="form-control" maxlength="250" rows="3" required></textarea>
                                                        {{-- <input name="password" id="examplePassword11" placeholder="Question no. 2" type="password" class="form-control"> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <input name="course_id" type="hidden" value="{{$cr_id}}">
                                            <input name="chapter_id" type="hidden" value="{{$chapter_id}}">
                                            <button class="mt-2 btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                              @endif  
                        @else
                          
                        @endif

{{-- end if main content --}}










@if(count($course_info)==1)

@if($chapter_id==2)
          <div class="row">
                  <div class="col-md-12">
                      <div class="main-card mb-3 card">
                          <div class="card-body">
                              <iframe class="course_video" height="400" src="{{$selected_chapter_details[0]->course_youtube_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>       
                          </div>                             
                  </div>                          
              </div>                                       
          </div>
          <div class="main-card mb-3 card">
                  <div class="card-body">
                      
                      <p style="color:red;font-weight:bold;font-size:16px;">NOTE: All questions are compulsory to unlock next chapter.</p>
                  
                      <form method="POST" action="{{url('user_answer_for_chapter_questions')}}">
                          @csrf
                          <div class="form-row">
                              <div class="col-md-12">
                                  <div class="position-relative form-group">
                                      <label for="exampleEmail11" class="" style="font-size:16px;">Top 3 things you learned from this lesson : <span style="font-weight:bold;font-size:16px;">(Max. 250 characters)</span></label>
                                      <textarea name="question_1" class="form-control" maxlength="250" rows="3" required></textarea>
                                  </div>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-md-12">
                                  <div class="position-relative form-group">
                                      <label for="examplePassword11" class="" style="font-size:16px;">What actions/Steps are you going to take now ? <span style="font-weight:bold;font-size:16px;">(Max. 250 characters)</span></label>
                                      <textarea name="question_2" class="form-control" maxlength="250" rows="3" required></textarea>
                                      {{-- <input name="password" id="examplePassword11" placeholder="Question no. 2" type="password" class="form-control"> --}}
                                  </div>
                              </div>
                          </div>
                          <input name="course_id" type="hidden" value="{{$cr_id}}">
                          <input name="chapter_id" type="hidden" value="{{$chapter_id}}">
                          <button class="mt-2 btn btn-primary">Submit</button>
                      </form>
                  </div>
              </div>
            @endif  
      @else
              
      @endif

{{-- end if main content --}}







@if(count($course_info)==2)

@if($chapter_id==3)
          <div class="row">
                  <div class="col-md-12">
                      <div class="main-card mb-3 card">
                          <div class="card-body">
                              <iframe class="course_video" height="400" src="{{$selected_chapter_details[0]->course_youtube_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>       
                          </div>                             
                  </div>                          
              </div>                                       
          </div>
          <div class="main-card mb-3 card">
                  <div class="card-body">
                      
                      <p style="color:red;font-weight:bold;font-size:16px;">NOTE: All questions are compulsory to unlock next chapter.</p>
                  
                      <form method="POST" action="{{url('user_answer_for_chapter_questions')}}">
                          @csrf
                          <div class="form-row">
                              <div class="col-md-12">
                                  <div class="position-relative form-group">
                                      <label for="exampleEmail11" class="" style="font-size:16px;">Top 3 things you learned from this lesson : <span style="font-weight:bold;font-size:16px;">(Max. 250 characters)</span></label>
                                      <textarea name="question_1" class="form-control" maxlength="250" rows="3" required></textarea>
                                  </div>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-md-12">
                                  <div class="position-relative form-group">
                                      <label for="examplePassword11" class="" style="font-size:16px;">What actions/Steps are you going to take now ? <span style="font-weight:bold;font-size:16px;">(Max. 250 characters)</span></label>
                                      <textarea name="question_2" class="form-control" maxlength="250" rows="3" required></textarea>
                                      {{-- <input name="password" id="examplePassword11" placeholder="Question no. 2" type="password" class="form-control"> --}}
                                  </div>
                              </div>
                          </div>
                          <input name="course_id" type="hidden" value="{{$cr_id}}">
                          <input name="chapter_id" type="hidden" value="{{$chapter_id}}">
                          <button class="mt-2 btn btn-primary">Submit</button>
                      </form>
                  </div>
              </div>
            @endif  
      @else
              
      @endif










      @if(count($course_info)==3)

@if($chapter_id==4)
          <div class="row">
                  <div class="col-md-12">
                      <div class="main-card mb-3 card">
                          <div class="card-body">
                              <iframe class="course_video" height="400" src="{{$selected_chapter_details[0]->course_youtube_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>       
                          </div>                             
                  </div>                          
              </div>                                       
          </div>
          <div class="main-card mb-3 card">
                  <div class="card-body">
                      
                      <p style="color:red;font-weight:bold;font-size:16px;">NOTE: All questions are compulsory to unlock next chapter.</p>
                  
                      <form method="POST" action="{{url('user_answer_for_chapter_questions')}}">
                          @csrf
                          <div class="form-row">
                              <div class="col-md-12">
                                  <div class="position-relative form-group">
                                      <label for="exampleEmail11" class="" style="font-size:16px;">Top 3 things you learned from this lesson : <span style="font-weight:bold;font-size:16px;">(Max. 250 characters)</span></label>
                                      <textarea name="question_1" class="form-control" maxlength="250" rows="3" required></textarea>
                                  </div>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-md-12">
                                  <div class="position-relative form-group">
                                      <label for="examplePassword11" class="" style="font-size:16px;">What actions/Steps are you going to take now ? <span style="font-weight:bold;font-size:16px;">(Max. 250 characters)</span></label>
                                      <textarea name="question_2" class="form-control" maxlength="250" rows="3" required></textarea>
                                      {{-- <input name="password" id="examplePassword11" placeholder="Question no. 2" type="password" class="form-control"> --}}
                                  </div>
                              </div>
                          </div>
                          <input name="course_id" type="hidden" value="{{$cr_id}}">
                          <input name="chapter_id" type="hidden" value="{{$chapter_id}}">
                          <button class="mt-2 btn btn-primary">Submit</button>
                      </form>
                  </div>
              </div>
            @endif  
      @else
              
      @endif














      @if(count($course_info)==4)

      @if($chapter_id==5)
                <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <iframe class="course_video" height="400" src="{{$selected_chapter_details[0]->course_youtube_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>       
                                </div>                             
                        </div>                          
                    </div>                                       
                </div>
                <div class="main-card mb-3 card">
                        <div class="card-body">
                            
                            <p style="color:red;font-weight:bold;font-size:16px;">NOTE: All questions are compulsory to unlock next chapter.</p>
                        
                            <form method="POST" action="{{url('user_answer_for_chapter_questions')}}">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail11" class="" style="font-size:16px;">Top 3 things you learned from this lesson : <span style="font-weight:bold;font-size:16px;">(Max. 250 characters)</span></label>
                                            <textarea name="question_1" class="form-control" maxlength="250" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword11" class="" style="font-size:16px;">What actions/Steps are you going to take now ? <span style="font-weight:bold;font-size:16px;">(Max. 250 characters)</span></label>
                                            <textarea name="question_2" class="form-control" maxlength="250" rows="3" required></textarea>
                                            {{-- <input name="password" id="examplePassword11" placeholder="Question no. 2" type="password" class="form-control"> --}}
                                        </div>
                                    </div>
                                </div>
                                <input name="course_id" type="hidden" value="{{$cr_id}}">
                                <input name="chapter_id" type="hidden" value="{{$chapter_id}}">
                                <button class="mt-2 btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                  @endif  
            @else
                    
            @endif









            @if(count($course_info)==5)

            @if($chapter_id==6)
                      <div class="row">
                              <div class="col-md-12">
                                  <div class="main-card mb-3 card">
                                      <div class="card-body">
                                          <iframe class="course_video" height="400" src="{{$selected_chapter_details[0]->course_youtube_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>       
                                      </div>                             
                              </div>                          
                          </div>                                       
                      </div>
                      <div class="main-card mb-3 card">
                              <div class="card-body">
                                  
                                  <p style="color:red;font-weight:bold;font-size:16px;">NOTE: All questions are compulsory to unlock next chapter.</p>
                              
                                  <form method="POST" action="{{url('user_answer_for_chapter_questions')}}">
                                      @csrf
                                      <div class="form-row">
                                          <div class="col-md-12">
                                              <div class="position-relative form-group">
                                                  <label for="exampleEmail11" class="" style="font-size:16px;">Top 3 things you learned from this lesson : <span style="font-weight:bold;font-size:16px;">(Max. 250 characters)</span></label>
                                                  <textarea name="question_1" class="form-control" maxlength="250" rows="3" required></textarea>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-row">
                                          <div class="col-md-12">
                                              <div class="position-relative form-group">
                                                  <label for="examplePassword11" class="" style="font-size:16px;">What actions/Steps are you going to take now ? <span style="font-weight:bold;font-size:16px;">(Max. 250 characters)</span></label>
                                                  <textarea name="question_2" class="form-control" maxlength="250" rows="3" required></textarea>
                                                  {{-- <input name="password" id="examplePassword11" placeholder="Question no. 2" type="password" class="form-control"> --}}
                                              </div>
                                          </div>
                                      </div>
                                      <input name="course_id" type="hidden" value="{{$cr_id}}">
                                      <input name="chapter_id" type="hidden" value="{{$chapter_id}}">
                                      <button class="mt-2 btn btn-primary">Submit</button>
                                  </form>
                              </div>
                          </div>
                        @endif  
                  @else
                          
                  @endif







                  @if(count($course_info)==6)

                  @if($chapter_id==7)
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <iframe class="course_video" height="400" src="{{$selected_chapter_details[0]->course_youtube_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>       
                                            </div>                             
                                    </div>                          
                                </div>                                       
                            </div>
                            <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        
                                        <p style="color:red;font-weight:bold;font-size:16px;">NOTE: All questions are compulsory to unlock next chapter.</p>
                                    
                                        <form method="POST" action="{{url('user_answer_for_chapter_questions')}}">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail11" class="" style="font-size:16px;">Top 3 things you learned from this lesson : <span style="font-weight:bold;font-size:16px;">(Max. 250 characters)</span></label>
                                                        <textarea name="question_1" class="form-control" maxlength="250" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <label for="examplePassword11" class="" style="font-size:16px;">What actions/Steps are you going to take now ? <span style="font-weight:bold;font-size:16px;">(Max. 250 characters)</span></label>
                                                        <textarea name="question_2" class="form-control" maxlength="250" rows="3" required></textarea>
                                                        {{-- <input name="password" id="examplePassword11" placeholder="Question no. 2" type="password" class="form-control"> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <input name="course_id" type="hidden" value="{{$cr_id}}">
                                            <input name="chapter_id" type="hidden" value="{{$chapter_id}}">
                                            <button class="mt-2 btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                              @endif  
                        @else
                                
                        @endif








                          
       
        </div>
    </div>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="bsa_dashboard/architectui-html-free/assets/scripts/main.js"></script>
</body>
</html>


