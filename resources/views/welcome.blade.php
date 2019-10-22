<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Brand Samosa Academy</title>
    <link rel="icon" href="theme/img/logo (3).png">
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

    <!--Font Awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{url('/')}}"> <img src="theme/img/logo (3).png" alt="Brand samosa" width="100" height="100"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="#learning_part">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#popular_courses">Courses</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="#footer">Contact</a>
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

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>Your gateway to Social Branding</h5>
                            <h1>Build your Brand, Sell More and Grow your Influence</h1>
                            <p>Welcome to Brand Samosa Academy. Explore and join practical and customized courses to help you build and grow your brand. Each course comes with highly practical action points with a super helpful support team.</p>
                            <a href="#popular_courses" class="btn_1">View Courses </a>
                            <a href="{{route('register')}}" class="btn_2">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->


    <!-- learning part start-->
    <section class="learning_part" id="learning_part">
        <div class="container">
            <div class="row align-items-sm-center align-items-lg-stretch">
                <div class="col-md-6 col-lg-6">
                    <div class="learning_img">
                        <img src="theme/img/learning_img.png" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="learning_member_text">
                        <h6 style="text-transform:uppercase;color:#888888;">One subscription to everything you ever needed</h6>
                        <h3>Learn everything about Branding, Marketing, Sales and Social Media from industry experts</h3>
                        <p>Get unlimited access to courses, e-books, webinars, events and much more!!    </p>
                            <p><b>Register now at &#8377; 79/- per month.</b></p>
                            <ul style="list-style-type:none;font-size:16px;">You will get:
                            <li><i class="fa fa-check"></i> Learning in Branding, Sales, Marketing and Social Media from industry experts.</li>
                            <li><i class="fa fa-check"></i> 30+ hours of video content.</li><br>
                            <li><i class="fa fa-check"></i> 20+ e-books and case studies</li><br>
                            <li><i class="fa fa-check"></i> FREE entry into webinars</li><br>
                            <li><i class="fa fa-check"></i> Discounted entry into events</li><br>
                            <li><i class="fa fa-check"></i> Full access to the exclusive community</li><br>
                            <li> and much more...</li>

                            </ul>
                       
                     
                            <a href="{{route('register')}}" class="btn_2">Subscribe</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- learning part end-->

    <!--::review_part start::-->
    <section class="special_cource padding_top" id="popular_courses">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>popular courses</p>
                        <h2>Special Courses</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($courses as $course)

                <?php 
                $course_details = App\course::where('course_id',$course->course_id)->get();
                // echo "<pre>";print_r($course_details);die;
                ?>
                 <a href="{{url('/full_course_details-'.$course->course_id)}}">
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                       
                        <img src="theme/img/{{$course_details[0]->course_photo}}" class="special_img" alt="">
                       
                        <div class="special_cource_text">
                        {{-- <a href="{{url('/full_course_details')}}" class="btn_4">{{$courses->course_name}}</a> --}}

                       
                            <a href="{{url('/full_course_details-'.$course->course_id)}}"><h3>{{$course_details[0]->course_name}}</h3></a>
                            {{-- <h4>{{$courses->course_fee}}</h4> --}}
                            <p><?php 
                            $value = str_limit($course_details[0]->course_description, 200);

                            ?>
                            </p>
                        <p>{{$value}}</p>
                            <div class="author_info">
                                <div class="author_img">
                                    <img src="theme/img/author/trainer.jpg" alt="" style="border-radius:50%;">
                                    <div class="author_info_text">
                                        <p>Conducted by:</p>
                                    <h5><a target="blank" href="https://www.linkedin.com/in/sambaisla">{{$course_details[0]->trainer_name}}</a></h5>
                                    </div>
                                </div>
                             
                            </div>
                        </div>

                    </div>
                </div>
                 </a>
                @endforeach
            </div>
           
       
       
        </div>
    </section>
    <!--::blog_part end::-->



    <!-- footer part start-->
    <footer class="footer-area" id="footer">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-4 col-xl-4">
                        <div class="single-footer-widget footer_1">
                                <a href="https://brandsamosa.com"> <img src="theme/img/logo (3).png" alt="" height="80" width="80"> </a>
                             <p>We build brands that “SELL”.
We help Small Businesses, Startups and Professionals win in the digital world by providing Affordable, Customised and Innovative Social Branding & Sales solutions. Build your Brand, Improve Sales and Leverage Social Media for Business Growth.</p>
                        
                        <a href="https://brandsamosa.com" style="text-decoration:none;color:#888888;">Get it touch with us for a FREE business consultation about your business or brand.</p>
                         </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Follow us</h4>
                        <p>Stay tuned with our latest updates about industry trends, actionable tips, detailed case studies, client testimonials, events and webinars and much more.

                        </p>
                        
                        <div class="social_icon">
                            <a href="https://www.facebook.com/brandsamosa/?modal=admin_todo_tour"> <i class="ti-facebook" style="color:#3B5998;font-size:25px;"></i> </a>
                            <a href="https://twitter.com/BrandSamosa"> <i class="ti-twitter-alt" style="color:#1DA1F2;font-size:25px;"></i> </a>
                            <a href="https://www.linkedin.com/uas/login?session_redirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2Fbrandsamosa%2Fabout"> <i class="ti-linkedin" style="color:#007DA9;font-size:25px;"></i> </a>
                           
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Contact us</h4>
                        <div class="contact_info">
                            <p><span> Address :</span>  New Delhi, India | Chicago, USA  </p>
                            <p><span> Phone :</span> +91 9971 5656 00</p>
                            <p><span> Email : </span>hello@brandsamosa.com </p>
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
    <!-- particles js -->
    <script src="theme/js/owl.carousel.min.js"></script>
    <script src="theme/js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="theme/js/slick.min.js"></script>
    <script src="theme/js/jquery.counterup.min.js"></script>
    <script src="theme/js/waypoints.min.js"></script>
    <!-- custom js -->
    <script src="theme/js/custom.js"></script>
</body>

</html>