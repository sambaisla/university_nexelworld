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
                                                            <a class="nav-link" href="{{ route('register') }}">Register</a>
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
                        <h2>{{$chapter_details[0]->chapter_name}}</h2>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================ Start Course Details Area =================-->
    <section class=" section_padding">
        <div class="container">


           

            @if (session('error'))
                <div class="alert alert-danger">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                </div>
            @endif

         <style>
         .video{
             width:100%;
             height:600px;
         }
         </style>

            <div class="row">
                <div class="col-lg-12 course_details_left">
                    <div class="main_image">
                        <iframe class="video img-fluid" src="https://www.youtube.com/embed/o-3_aTo8sTM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        {{-- <img class="img-fluid" src="theme/img/single_cource.png" alt=""> --}}
                    </div>
        
                </div>


            </div>

             
<hr>


             <div class="row">

                    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<?php $i=0; ?>
                @forelse($questions_details as $question)
                <?php $i++; ?>
                                <div class="col-lg-12 right-contents">
                                        <h2>{{$question->question}}</h2>
                                    <div class="sidebar_top">
                                <form method="POST" action="{{url('user_answers')}}">
                                    @csrf
                                    <input name="question_id[]" type="hidden" value="{{$question->question_id}}">
                                    <input name="correct_answer[]" type="hidden" value="{{$question->correct_answer}}">
                                    <input name="question_marks[]" type="hidden" value="{{$question->question_marks}}">


                                        <ul>
                                            <li>
                                                <a class="justify-content-between d-flex" href="#">
                                                    <p>{{$question->choice_1}}</p>
                                                    <span>
                                                        <div class="form-check">
                                                        <input type="checkbox" name="choice[]"  value="{{$question->choice_1}}" class="form-check-input{{$i}}" id="exampleCheck1">
                                                        </div>

                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="justify-content-between d-flex" href="#">
                                                    <p>{{$question->choice_2}}</p>
                                                    <span>
                                                            <div class="form-check">
                                                            <input type="checkbox" name="choice[]" value="{{$question->choice_2}}" class="form-check-input{{$i}}" id="exampleCheck1">
                                                            </div>
    
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="justify-content-between d-flex" href="#">
                                                    <p>{{$question->choice_3}}</p>
                                                    <span>
                                                            <div class="form-check">
                                                            <input type="checkbox" name="choice[]" value="{{$question->choice_3}}" class="form-check-input{{$i}}" id="exampleCheck1">
                                                            </div>
    
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="justify-content-between d-flex" href="#">
                                                    <p>{{$question->choice_4}}</p>
                                                    <span>
                                                            <div class="form-check">
                                                            <input type="checkbox" name="choice[]" value="{{$question->choice_4}}" class="form-check-input{{$i}}" id="exampleCheck1">
                                                            </div>
    
                                                    </span>                                                
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $('.form-check-input'+<?=$i?>).on('change', function() {
                                        $('.form-check-input'+<?=$i?>).not(this).prop('checked', false);  
                                    });


                                </script>


                @empty
                                <div class="col-lg-12 right-contents">
                                        <h2>No Questions Found !!</h2>
                                   
                                </div>
                @endforelse

                <input name="course_id" type="hidden" value="{{$course_id}}">
                <input name="chapter_id" type="hidden" value="{{$chapter_id}}">
                <div class="row mx-auto m-4">
                     <div class="col-md-4">
                        <button type="submit" id="btn" class="btn btn-danger">Submit</button>
                     </div>
                </div>

           
</form>




            </div>
        </div>
    </section>



   



    <!--End Course Details Area -->
    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-4 col-xl-4">
                <div class="single-footer-widget footer_1">
                                <a href="https://nexelworld.com"> <img src="theme/img/logo.png" alt=""> </a>
                             <p>We build brands that “SELL”.
We help Small Businesses, Startups and Professionals win in the digital world by providing Affordable, Customised and Innovative Social Branding & Sales solutions. Build your Brand, Improve Sales and Leverage Social Media for Business Growth.</p>
                        
                        <a href="https://nexelworld.com" style="text-decoration:none;color:#888888;">Get it touch with us for a FREE business consultation about your business or brand.</p>
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
                           
                            <p><span> Email : </span>info@nexelworld.com </p>
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