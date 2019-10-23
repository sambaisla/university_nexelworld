<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nexel World Academy</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!--Font Awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>



<style>
body{
    background-color: #f4ab3a;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 100 60'%3E%3Cg %3E%3Crect fill='%23f4ab3a' width='11' height='11'/%3E%3Crect fill='%23f4ac3c' x='10' width='11' height='11'/%3E%3Crect fill='%23f3ae3e' y='10' width='11' height='11'/%3E%3Crect fill='%23f3af40' x='20' width='11' height='11'/%3E%3Crect fill='%23f3b142' x='10' y='10' width='11' height='11'/%3E%3Crect fill='%23f2b244' y='20' width='11' height='11'/%3E%3Crect fill='%23f2b346' x='30' width='11' height='11'/%3E%3Crect fill='%23f1b548' x='20' y='10' width='11' height='11'/%3E%3Crect fill='%23f1b64a' x='10' y='20' width='11' height='11'/%3E%3Crect fill='%23f1b74d' y='30' width='11' height='11'/%3E%3Crect fill='%23f1b84f' x='40' width='11' height='11'/%3E%3Crect fill='%23f0ba51' x='30' y='10' width='11' height='11'/%3E%3Crect fill='%23f0bb53' x='20' y='20' width='11' height='11'/%3E%3Crect fill='%23f0bc55' x='10' y='30' width='11' height='11'/%3E%3Crect fill='%23efbe57' y='40' width='11' height='11'/%3E%3Crect fill='%23efbf59' x='50' width='11' height='11'/%3E%3Crect fill='%23efc05b' x='40' y='10' width='11' height='11'/%3E%3Crect fill='%23eec15d' x='30' y='20' width='11' height='11'/%3E%3Crect fill='%23eec25f' x='20' y='30' width='11' height='11'/%3E%3Crect fill='%23eec462' x='10' y='40' width='11' height='11'/%3E%3Crect fill='%23eec564' y='50' width='11' height='11'/%3E%3Crect fill='%23eec666' x='60' width='11' height='11'/%3E%3Crect fill='%23edc768' x='50' y='10' width='11' height='11'/%3E%3Crect fill='%23edc86a' x='40' y='20' width='11' height='11'/%3E%3Crect fill='%23edca6c' x='30' y='30' width='11' height='11'/%3E%3Crect fill='%23edcb6f' x='20' y='40' width='11' height='11'/%3E%3Crect fill='%23edcc71' x='10' y='50' width='11' height='11'/%3E%3Crect fill='%23eccd73' x='70' width='11' height='11'/%3E%3Crect fill='%23ecce75' x='60' y='10' width='11' height='11'/%3E%3Crect fill='%23eccf77' x='50' y='20' width='11' height='11'/%3E%3Crect fill='%23ecd17a' x='40' y='30' width='11' height='11'/%3E%3Crect fill='%23ecd27c' x='30' y='40' width='11' height='11'/%3E%3Crect fill='%23ecd37e' x='20' y='50' width='11' height='11'/%3E%3Crect fill='%23ecd480' x='80' width='11' height='11'/%3E%3Crect fill='%23ebd582' x='70' y='10' width='11' height='11'/%3E%3Crect fill='%23ebd685' x='60' y='20' width='11' height='11'/%3E%3Crect fill='%23ebd787' x='50' y='30' width='11' height='11'/%3E%3Crect fill='%23ebd889' x='40' y='40' width='11' height='11'/%3E%3Crect fill='%23ebd98b' x='30' y='50' width='11' height='11'/%3E%3Crect fill='%23ebda8e' x='90' width='11' height='11'/%3E%3Crect fill='%23ebdb90' x='80' y='10' width='11' height='11'/%3E%3Crect fill='%23ebdc92' x='70' y='20' width='11' height='11'/%3E%3Crect fill='%23ebdd94' x='60' y='30' width='11' height='11'/%3E%3Crect fill='%23ebde97' x='50' y='40' width='11' height='11'/%3E%3Crect fill='%23ebdf99' x='40' y='50' width='11' height='11'/%3E%3Crect fill='%23ebe19b' x='90' y='10' width='11' height='11'/%3E%3Crect fill='%23ebe29d' x='80' y='20' width='11' height='11'/%3E%3Crect fill='%23ebe3a0' x='70' y='30' width='11' height='11'/%3E%3Crect fill='%23ece4a2' x='60' y='40' width='11' height='11'/%3E%3Crect fill='%23ece5a4' x='50' y='50' width='11' height='11'/%3E%3Crect fill='%23ece5a7' x='90' y='20' width='11' height='11'/%3E%3Crect fill='%23ece6a9' x='80' y='30' width='11' height='11'/%3E%3Crect fill='%23ece7ab' x='70' y='40' width='11' height='11'/%3E%3Crect fill='%23ece8ad' x='60' y='50' width='11' height='11'/%3E%3Crect fill='%23ede9b0' x='90' y='30' width='11' height='11'/%3E%3Crect fill='%23edeab2' x='80' y='40' width='11' height='11'/%3E%3Crect fill='%23edebb4' x='70' y='50' width='11' height='11'/%3E%3Crect fill='%23edecb6' x='90' y='40' width='11' height='11'/%3E%3Crect fill='%23eeedb9' x='80' y='50' width='11' height='11'/%3E%3Crect fill='%23EEB' x='90' y='50' width='11' height='11'/%3E%3C/g%3E%3C/svg%3E");
background-attachment: fixed;
background-size: cover;
}


</style>
<body>
<div class="container card col-md-9" style="margin-top:20px;margin-bottom:20px;background:#ffffff;border-radius:10px;padding:10px;box-sizing:border-box;box-shadow: 5px 5px 8px #e6e6e6;">
<h4 class="text-center" style="font-size:1.3rem;">Get unlimited access for a FULL YEAR to courses, e-books, webinars, events and much more!!</h4>
<h5 style="color:green;text-shadow:0 0 2px green;text-indent: 55px;
">Register now at &#8377;<i>79/- per month</i></h5>
<ul style="list-style-type:none;text-indent:15px;"><b>You will get:</b>
<li><i class="fa fa-check"></i>  Learn about Preparing Business Plan, Go to Market Strategy, Bootstrapping, Growth and Expansion, Fund-raising, and everything else from industry experts.</li>
<li><i class="fa fa-check"></i> 30+ hours of video content.</li>
<li><i class="fa fa-check"></i> 20+ e-books and case studies</li>
<li><i class="fa fa-check"></i> FREE entry into webinars</li>
<li><i class="fa fa-check"></i> Discounted entry into events</li>
<li><i class="fa fa-check"></i> Full access to the exclusive community</li>
<li> and much more...</li>

</ul>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color:#a04655;">
               <b> <div class="card-header text-center" style="font-size:25px;color:#ffffff;">{{ __('Register') }}</div></b>

                <div class="card-body" style="background-color:#EBD199; font-size:18px;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile_number" class="col-md-4 col-form-label text-md-right">{{ __('Mobile number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile_number" type="tel" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ old('mobile_number') }}" required autocomplete="mobile_number">

                                @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="profession" class="col-md-4 col-form-label text-md-right">{{ __('Profession') }}</label>

                            <div class="col-md-6">
                                    <select id="profession" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" required autocomplete="profession">
                                            <option hidden value=""></option>
                                            <option value="Entrepreneur/Founder/CEO/CMO/CXO">Entrepreneur/Founder/CEO/CMO/CXO</option>
                                            <option value="Professional/Job">Professional/Job</option>
                                            <option value="Consultant/Coach/Trainer">Consultant/Coach/Trainer</option>
                                            <option value="Student">Student</option>
                                    </select>
                                {{-- <input id="profession" type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" required autocomplete="profession"> --}}

                                @error('profession')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>






                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 mr-auto">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Register') }}
                                </button>

                                <a class="btn btn-link" style="color:#9B4352;" href="{{ route('login') }}"> Already have an account? Login.</a>

                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
</body>
</html>

