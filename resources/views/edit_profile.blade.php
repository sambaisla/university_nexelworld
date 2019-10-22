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

</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                {{-- <div class="logo-src"></div> --}}
                <a href="{{url('/')}}"><img src="theme/img/logo (3).png" class="img-fluid" alt="Brand samosa" width="75px" height="23px"></a>
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
     <div class="app-header__content">
              
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                         
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        Alina Mclourd
                                    </div>
                                    Analytics Dashboard
                                    <div class="widget-subheading">
                                        VP People Manager
                                    </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>        
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
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Welcome {{Auth::User()->name}}
                                    </a>
                                </li>
                        

                                    {{-- for purchased courses --}}

                                    @if(count($user_payment_details)>0)

                                    <li class="app-sidebar__heading">My Courses</li>

                                    <li>

                                        @foreach($user_payment_details as $val)
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
                                                                {{$chapter->chapter_name}}
                                                            </a>
                                                        </li>
                                                @endforeach 
                                            </ul>



                                    @endforeach            
                                    </li>
                                    @endif
                       
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
                                   
                                  <div>  <b>Edit your profile</b>
                                       
                                    </div>
                                </div>

                                   

                               
                                <div class="page-title-actions">
  
                                    <div class="d-inline-block dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
                                            </span>
                                            Actions
                                        </button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a href="{{url('home')}}" class="nav-link">
                                                        <i class="nav-link-icon lnr-inbox"></i>
                                                        <span>
                                                         Go to dashboard
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



                        
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title"></h5>
                                        <form method="POST" action="{{ route('user_edit_profile') }}">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleEmail11" class="">NAME </label>
                                                        <input name="name"  value="{{ Auth::User()->name }}" id="" placeholder="{{ Auth::User()->name }}" type="text" class="form-control"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="examplePassword11" class="">E-Mail Address</label>
                                                        <input name="email" value="{{ Auth::User()->email }}" type="email" id="exampleEmail11" placeholder="{{ Auth::User()->email }}" 
                                                                                                               class="form-control"></div>
                                                </div>

                                            </div>


                                            <div class="form-row">
                                                <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="exampleAddress" class="">Mobile number</label>
                                                <input type="tel" value="{{ Auth::User()->mobile_number }}" name="mobile_number" id="examplenumber" placeholder="{{ Auth::User()->mobile_number }}"  class="form-control"></div>
                                           
                                            </div>
                                           

                                           
                                                <div class="col-md-6">

                                                        <div class="position-relative form-group"><label for="exampleSelect" class="">Profession
                                                            </label><select name="profession" id="exampleSelect" class="form-control">
                                                                <option hidden value=""></option>
                                                                @if(Auth::User()->profession=='Entrepreneur/Founder/CEO/CMO/CXO')
                                                                <option  selected value="Entrepreneur/Founder/CEO/CMO/CXO">Entrepreneur/Founder/CEO/CMO/CXO</option>
                                                                <option value="Professional/Job">Professional/Job</option>
                                                                <option  value="Consultant/Coach/Trainer">Consultant/Coach/Trainer</option>
                                                                <option value="Student">Student</option>
                                                                @elseif(Auth::User()->profession=='Professional/Job')
                                                                <option   value="Entrepreneur/Founder/CEO/CMO/CXO">Entrepreneur/Founder/CEO/CMO/CXO</option>
                                                                <option selected value="Professional/Job">Professional/Job</option>
                                                                <option  value="Consultant/Coach/Trainer">Consultant/Coach/Trainer</option>
                                                                <option value="Student">Student</option>
                                                                @elseif(Auth::User()->profession=='Consultant/Coach/Trainer')
                                                                <option   value="Entrepreneur/Founder/CEO/CMO/CXO">Entrepreneur/Founder/CEO/CMO/CXO</option>
                                                                <option  value="Professional/Job">Professional/Job</option>
                                                                <option  selected value="Consultant/Coach/Trainer">Consultant/Coach/Trainer</option>
                                                                <option value="Student">Student</option>


                                                                @elseif(Auth::User()->profession=='Student')
                                                                <option   value="Entrepreneur/Founder/CEO/CMO/CXO">Entrepreneur/Founder/CEO/CMO/CXO</option>
                                                                <option  value="Professional/Job">Professional/Job</option>
                                                                <option   value="Consultant/Coach/Trainer">Consultant/Coach/Trainer</option>
                                                                <option selected value="Student">Student</option>
                                                                @endif




                                                            </select></div>

                                                </div>
                                                </div>
                                                          
                                          
                                            <button type="submit" class="mt-2 btn btn-primary">Edit</button>
                                        </form>
                                    </div>
                                </div>
                        </div>









            
                            

     
       



       







                  
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="bsa_dashboard/architectui-html-free/assets/scripts/main.js"></script></body>
</html>


