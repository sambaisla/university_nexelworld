<!DOCTYPE html>
<html>
<head>
    <title>Famore</title>
  <meta name='viewport' content="width=device-width, initial-scale=1" />
  {{-- <link href="{{ URL::asset('css/login.css') }}" rel="stylesheet"> --}}
  <link rel="icon" type="image/png" href="../assets1/img/famore_favicon.png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--Font Awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<style>
    body{
        background-color: #ffb999;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg %3E%3Cpolygon fill='%23ebaf9c' points='1600 160 0 460 0 350 1600 50'/%3E%3Cpolygon fill='%23d8a5a0' points='1600 260 0 560 0 450 1600 150'/%3E%3Cpolygon fill='%23c49aa3' points='1600 360 0 660 0 550 1600 250'/%3E%3Cpolygon fill='%23b190a7' points='1600 460 0 760 0 650 1600 350'/%3E%3Cpolygon fill='%239d86aa' points='1600 800 0 800 0 750 1600 450'/%3E%3C/g%3E%3C/svg%3E");
background-attachment: fixed;
background-size: cover;
    }
    
section.pricing {
  /* background: #007bff;
  background: linear-gradient(to right, #0062E6, #33AEFF); */
}

.pricing .card {
  border: none;
  border-radius: 1rem;
  transition: all 0.2s;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.pricing hr {
  margin: 1.5rem 0;
}

.pricing .card-title {
  margin: 0.5rem 0;
  font-size: 0.9rem;
  letter-spacing: .1rem;
  font-weight: bold;
}

.pricing .card-price {
  font-size: 3rem;
  margin: 0;
}

.pricing .card-price .period {
  font-size: 0.8rem;
}

.pricing ul li {
  margin-bottom: 1rem;
}

.pricing .text-muted {
  opacity: 0.7;
}

.pricing .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  opacity: 0.7;
  transition: all 0.2s;
}

/* Hover Effects on Card */

@media (min-width: 992px) {
  .pricing .card:hover {
    margin-top: -.25rem;
    /* margin-bottom: .25rem; */
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
  }
  .pricing .card:hover .btn {
    opacity: 1;
  }
}
</style>

{{-- put cotent here  --}}
<br>
<div class="container">
<h4 class="text-center" style="text-shadow:2px 2px #ffffcc;">Get access to unlimited courses at an effective price of <i class="fa fa-rupee"></i> 79/month.
</h4>
</div>
<section class="pricing py-5">
    <div class="container">
      <div class="row justify-content-center align-items-center">
    
    
        <!-- Pro Tier -->
        <div class="col-lg-4 my-auto">
          <div class="card">
            <div class="card-body">
              <!-- <h5 class="card-title text-muted text-uppercase text-center">Subscribe to package</h5> -->
              <h6 class="card-price text-center"><i class="fa fa-rupee"></i>948<span class="period">Annual subscription</span></h6>
              <hr>
              <ul class="fa-ul">
              <h4>What you will get:</h4>
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Access to unlimited courses</li>
               
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Free access to E-books, PDFs and videos</li>
          
                <li><span class="fa-li"><i class="fa fa-check"></i></span>Detailed coverage of topics</li>

              

              
              </ul>
              <a href="{{url('/user_subscription')}}" class="btn btn-block btn-primary text-uppercase">Buy</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

{{-- end of content --}}

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>


