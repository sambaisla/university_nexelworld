
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
     <div class="app-header__content">
              
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                         
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        Alina Mclourd
                                    </div>Analytics Dashboard
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
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a href="{{url('/home')}}" class="mm-active">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Welcome {{Auth::User()->name}}
                                    </a>
                                </li>
                                
                       
                                
                                @if(Auth::User()->course_ids!=NULL)

                                <li class="app-sidebar__heading">My Courses</li>

                                <?php
                                $course_ids=Auth::User()->course_ids;
                                $exploded_course_id=explode(',',$course_ids);
                                
                                
                                ?>

                                @foreach($exploded_course_id as $course_id)
                                        <li>
                                            <a href="{{url('course_from_dashboard-'.$course_id)}}">
                                                <i class="metismenu-icon pe-7s-study">
                                                </i>
                                                <?php
                                                $course_details=\App\course::where('course_id',$course_id)
                                                ->first();
                                                
                                                ?>
                                                {{$course_details->course_name}}
                                            </a>
                                        </li>
                                @endforeach
                             
                                @endif
                            </ul>

                            
                        </div>
                    </div>
                </div>    <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                  <div>  <b> Welcome to your dashboard </b>
                                        <div class="page-title-subheading">Here you will get all details.
                                        </div>
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
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-inbox"></i>
                                                        <span>
                                                            Edit Profile
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                      document.getElementById('logout-form').submit();">
                                                         {{ __('Logout') }}
                                                     </a>
                                                     
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                         @csrf
                                                     </form>
                                                </li>
                                             
                                            </ul>                                        </div>
                            </div>
                        </div>  
                      </div>
                     </div>           


                    
                @if (session('success'))
                <div class="alert alert-success">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                </div>
                
            



               @endif                                      
                           

                     <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">{{$selected_course_details[0]->course_name}}
                                  
                                </div>
                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Chapter name</th>
                                           
                                            <th class="text-center">Start</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                          @foreach($selected_course_details as $val)
                                          <?php $i++; ?>  
                                                    <tr>
                                                        <td class="text-center text-muted">{{$i}}</td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left mr-3">
                                                                        <div class="widget-content-left">
                                                                            <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">{{$val->chapter_name}}</div>
                                                                        <div class="widget-subheading opacity-7">{{$val->chapter_details}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                       
                                                        <td class="text-center">
                                                                <?php
                                                                $data = DB::table("courses")
                                                                        ->where('course_id',$val->course_id)
                                                                        ->where('chapter_id',$val->chapter_id)
                                                                        ->whereRaw("find_in_set('".Auth::User()->id."',course_completed_by)")
                                                                        ->first();  
                                                                    
                                                                $data1 = DB::table("courses")
                                                                        ->where('course_id',$val->course_id)
                                                                       
                                                                        ->whereRaw("find_in_set('".Auth::User()->id."',course_completed_by)")
                                                                        ->get();         
                                                                    //  echo "<pre>";print_r(count($data1));   
                                                                    
                                                                ?>

                                                          @if(count($data1)==0)              
                                                                 
                                                                  @if($i==1)
                                                                  <a href="{{url('user_chapter-'.$val->course_id.'-'.$val->chapter_id)}}" id="PopoverCustomT-1" class="btn btn-primary btn-sm">See</a>

                                                                  @else 

                                                                  <button  id="PopoverCustomT-1" class="btn btn-warning btn-sm">Locked</a>

                                                                  @endif


                                                          @else 

                                                                    @if($data)
                                                                    <a href="{{url('user_chapter-'.$val->course_id.'-'.$val->chapter_id)}}" id="PopoverCustomT-1" class="btn btn-primary btn-sm">See</a>


                                                                    @else
                                                                    
                                                                    {{'NA'}}

                                                                    @endif

                                                         @endif   
                                                      
           










                                                        </td>
                                                    </tr>
                                        @endforeach

                                 
                                     
                                    
                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>




                  
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="bsa_dashboard/architectui-html-free/assets/scripts/main.js"></script></body>
</html>


