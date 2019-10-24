<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nexel World Academy</title>
    <link rel="icon" href="theme/img/favicon.jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="theme/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="theme/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="theme/css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="theme/css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="theme/css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="theme/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="theme/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="theme/css/style.css">
</head>

<body>

    <!--::header part start::-->
    <header class="main_menu single_page_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand logo_1" href="{{url('/')}}" > <img src="theme/img/logo (2).png" alt="logo" > </a>
                        <a class="navbar-brand logo_2" href="{{url('/')}}" > <img src="theme/img/logo.png" alt="logo" > </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                             
                                <li class="nav-item">
                                <a class="nav-link" href="{{'/#learning_part'}}">About</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="{{'/#popular_courses'}}">Courses</a>
                                </li>

                                <li class="nav-item">
                                <a class="nav-link" href="{{'/#footer'}}">Contact</a>
                                    </li>
                                @guest
                                        @if (Route::has('login'))
                                                
                                                    @auth
                                                

                                                    @else
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                                    </li>
                                
                                                        @if (Route::has('register'))
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="{{ route('register') }}">Subscribe</a>
                                                        </li>
                                                        @endif
                                                    @endauth
                                            
                                            @endif
                                @else

                                                <li class="nav-item dropdown">
                                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            {{ Auth::user()->name }} <span class="caret"></span>
                                                        </a>
                        
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                                                <a class="dropdown-item" href="{{ route('home') }}">
                                                                    {{ __('My Dashboard') }}
                                                                </a>
                                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }}
                                                            </a>
                        
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </li>



                                @endguest

                            
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Header part end-->

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Course Details</h2>
                            <p>Home<span>/</span>Course Details</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

   


    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">
        <div class="container">


                @if (session('success'))
                <div class="alert alert-success">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                </div>
               @endif

<style>

.intro_image{
    width:80%;
}
</style>
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="intro_image" src="{{$chapter_details[0]->thumbnail}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <!-- <img class="img-fluid" src="theme/img/single_cource.png" alt=""> -->
                    </div>
                    <div class="content_wrapper">
                        <h4 class="title_top">Course Details</h4>
                        <div class="content">
                        {{$chapter_details[0]['course_description']}}
                          
                           
                        </div>


                        <h3 class="title">Lessons:</h3>
                        <div class="content">
                            <ul class="course_list">

                                @foreach($chapter_details as $chapter)
                                <li>
                                    <h4>{{$chapter->chapter_name}}</h4>
                                    <p>{{$chapter->chapter_details}}</p>
                                    {{-- <a class="btn_2 text-uppercase" href="{{url('/chapter_tutorial-'.$chapter->course_id.'-'.$chapter->chapter_id)}}">View Details</a> --}}
                                    
                                </li>
                               
                                @endforeach
                           
                            </ul>
                        </div>



                    </div>
                </div>


                <div class="col-lg-4 right-contents">
                    <div class="sidebar_top">
                        <ul>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p style="color:black;font-weight:bold;font-size:18px;">Course</p>
                                    <span class="color">{{$chapter_details[0]['course_name']}}</span>
                                </a>
                            </li>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p style="color:black;font-weight:bold;font-size:18px;">Trainer’s Name</p>
                                    <span>{{$chapter_details[0]['trainer_name']}}</span>
                                </a>
                            </li>
                           
                            
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p style="color:black;font-weight:bold;font-size:18px;">Estimated time</p>
                                    <span>{{$chapter_details[0]['course_duration']}}</span>
                                </a>
                            </li>

                            <li>
                                    <a class="justify-content-between d-flex" href="#">
                                        <p style="color:black;font-weight:bold;font-size:18px;">Course Fee</p>
                                        <span><strike style="color:red;">Rs 2999</strike></span>
                                    </a>
                                </li>

                                <li>
                                        <a class="justify-content-between d-flex" href="#">
                                            <p style="color:black;font-weight:bold;font-size:18px;">Member Fee</p>
                                            <span>Free</span>
                                        </a>
                                    </li>

                        </ul>

         

                        @if (Auth::guest())

                                     
                                    {{-- <a href="{{url('buy_course_custom_login')}}" class="btn_1 d-block">Buy Course</a> --}}

                                    <a href="{{url('register')}}" class="btn_1 d-block">Subscribe</a>
  

                        @endif

                      
                    </div>



{{-- start of recomended courses --}}

<br>
<hr>

<div class="mt-10 text-left">
    <h3>All courses</h3>
</div>

              @if(count($all_courses)>0)
                        @foreach($all_courses as $all_cou)

                        <?php
                        $all_courses=\App\course::
                        where('course_id',$all_cou->course_id)
                        ->first();

                        ?>
                            <div class="comments-area mb-30">
                                <div class="comment-list">
                                    <div class="single-comment single-reviews justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/cource/cource_1.png" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="{{url('full_course_details-'.$all_cou->course_id)}}">{{$all_courses->course_name}}</a>
                                                </h5>
                                            
                                                <p class="comment">
                                                {{ Str::words($all_courses->course_description, 25)}}
                                            
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                @endif
{{-- end of recomended courses --}}
                
                </div>
                
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->
    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-4 col-xl-4">
                <div class="single-footer-widget footer_1">
                                <a href="https://nexelworld.com"> <img src="theme/img/logo.png" alt=""> </a>
                             <p>We are inspiring and empowering next generation entrepreneurs and leaders of the world. Our mission is to help them create a better world and solve critical problems.</p>
                        
                         </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Follow us</h4>
                        <p>Stay tuned with our latest updates about industry trends, actionable tips, detailed case studies, client testimonials, events and webinars and much more.

                        </p>
                        
                        <div class="social_icon">
                            <a href="https://www.facebook.com/groups/nexelworld/"> <i class="ti-facebook" style="color:#3B5998;font-size:25px;"></i> </a>
                            <a href="https://nexelworld.com"> <i class="ti-twitter-alt" style="color:#1DA1F2;font-size:25px;"></i> </a>
                            <a href="https://www.linkedin.com/groups/10359513/"> <i class="ti-linkedin" style="color:#007DA9;font-size:25px;"></i> </a>
                            <a href="https://www.instagram.com/nexelworld/"> <i class="ti-instagram" style="color:#E03B65;font-size:25px;"></i> </a>
                            <a href="https://www.youtube.com/channel/UC2mmOqGZHw7f5m8clDtO4xg/featured?disable_polymer=1"> <i class="ti-youtube" style="color:#CC0000;font-size:25px;"></i> </a>


                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Contact us</h4>
                        <div class="contact_info">
                            <p><span> Address :</span> India | Africa | UAE </p>
                           
                            <p><span> Email : </span>support@nexelworld.com </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="footer-text m-0">
                                    Copyright &copy; 2019. All rights reserved.
                                </p> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="theme/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="theme/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="theme/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="theme/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="theme/js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="theme/js/masonry.pkgd.js"></script>
    <script src="theme/js/jquery.nice-select.min.js"></script>
    <!-- particles js -->
    <script src="theme/js/owl.carousel.min.js"></script>
    <!-- swiper js -->
    <script src="theme/js/slick.min.js"></script>
    <script src="theme/js/jquery.counterup.min.js"></script>
    <script src="theme/js/waypoints.min.js"></script>
    <!-- custom js -->
    <script src="theme/js/custom.js"></script>
</body>

</html>