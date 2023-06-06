<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js'])
    <title>Trendy Suppliers</title>




    <!-- Additional CSS Files -->
    
 
 
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-sixteen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">

  </head>
  <style>
 

.profile {
    display: flex;
    gap: 2px;
}

.profile img {
    height: 40px;
    width: 40px;
    object-fit: cover;
    border-radius: 50%;
}

  </style>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="background-header">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{ route('home') }}"><h2>Trendy <em>Suppliers</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav " style="margin-left :auto;">

              <li @if (Request::is('/')) class="nav-item active" @endif>
                <a class="nav-link" href="{{ route('home') }}">Home</a>
              </li> 

              <li @if (Request::is('Products')) class="nav-item active" @endif>
                <a class="nav-link" href="{{ route('Products') }}">Our Products</a>
              </li>

              <li @if (Request::is('About')) class="nav-item active" @endif>
                <a class="nav-link" href="{{ route('About') }}">About Us</a>
              </li>

              <li @if (Request::is('ContactUs')) class="nav-item active" @endif>
                <a class="nav-link" href="{{ route('ContactUs') }}">Contact Us</a>
              </li>
            </ul>
           @if(session()->has('CloginId'))
                    <div class="profile" style="margin: auto;">
                        @if ($data->ProfileImg === 'default.png')
                            <img src="{{ asset('default/default.png') }}" alt="404 not found">
                        @else
                            <img src="{{ asset('default/' . $data->ProfileImg) }}" alt="404 not found">
                        @endif
                        <div class="dropdown" id="signup-dropdown">
                            <a class="btn dropdown-toggle" href="javascript:void(0)" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false" id="click-signup-dropdown"
                                style="background-color:transparent;color:black">
                                {{ ucfirst($data->name) }}
                            </a>

                            <ul class="dropdown-menu" id="drop-menu" style="width:12rem">
                                <li><i class="uil uil-user"></i><a class="dropdown-item"
                                        href="">Profile</a></li>
                                <hr class="mb-2">
                                <li> <i class="uil uil-signout"></i><a class="dropdown-item"
                                        href="{{route('logout')}}">Logout</a></li>
                            </ul>
                        </div>
                    </div>
           @else
                    
            <div class="butn" style="margin:auto;margin-top: 8px;">
                        <a href="{{ route('loginPage') }}" id="login" class="login btn border border-light-subtle">Login</a>
                        <a href="{{ route('signUp') }}" id="signUp" class="signUp btn border border-danger-subtle">SignUp</a>
            </div>
            @endif

          </div>
        </div>
      </nav>
    </header>
    @yield('content')

   
	<!-- Remove the container if you want to extend the Footer to full width. -->
<div class=" mt-5 w-100">

<footer class="text-white text-center text-lg-start bg-light" style="border: 1px solid #d0010f4a;">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row mt-4">
      <!--Grid column-->
      <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-4" style="color:#f33f3f">About company</h5>

        <p>
          At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
          voluptatum deleniti atque corrupti.
        </p>

        <p>
          Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
          molestias.
        </p>

        <div class="mt-4">
          <!-- Facebook -->
          <a type="button" class="btn btn-floating btn-light btn-lg" style="background-color: #f33f3f;"><i class="fab fa-facebook-f"></i></a>
          <!-- Dribbble -->
          <a type="button" class="btn btn-floating btn-light btn-lg" style="background-color: #f33f3f;"><i class="fab fa-dribbble"></i></a>
          <!-- Twitter -->
          <a type="button" class="btn btn-floating btn-light btn-lg" style="background-color: #f33f3f;"><i class="fab fa-twitter"></i></a>
          <!-- Google + -->
          <a type="button" class="btn btn-floating btn-light btn-lg" style="background-color: #f33f3f;"><i class="fab fa-google-plus-g"></i></a>
          <!-- Linkedin -->
        </div>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-4 pb-1" style="color:#f33f3f">Search something</h5>

        <div class="form-outline form-white mb-4">
          <input type="text" id="formControlLg" class="form-control form-control-lg" />
          <label class="form-label text-black" for="formControlLg">Search</label>
        </div>

        <ul class="fa-ul" style="margin-left: 1.65em;">
          <li class="mb-3">
            <span class="fa-li"><i class="fas fa-home" style="color: #f33f3f;"></i></span><span class="ms-2 text-black">Warsaw, 00-967, Poland</span>
          </li>
          <li class="mb-3">
            <span class="fa-li"><i class="fas fa-envelope" style="color: #f33f3f;"></i></span><span class="ms-2 text-black">contact@example.com</span>
          </li>
          <li class="mb-3">
            <span class="fa-li"><i class="fas fa-phone" style="color: #f33f3f;"></i></span><span class="ms-2 text-black">+ 48 234 567 88</span>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4 col-md-6 ">
        <h5 class="text-uppercase mb-4" style="color:#f33f3f">Opening hours</h5>

        <table class="table text-center text-black">
          <tbody class="fw-normal">
            <tr>
              <td>Mon - Thu:</td>
              <td>8am - 9pm</td>
            </tr>
            <tr>
              <td>Fri - Sat:</td>
              <td>8am - 1am</td>
            </tr>
            <tr>
              <td>Sunday:</td>
              <td>9am - 10pm</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: #f33f3f;">
   Trendy Suppliers
  </div>
  <!-- Copyright -->
</footer>

</div>
<!-- End of .container -->
  

    <!-- Additional Scripts -->
    <script src="{{ asset('/js/custom.js') }}"></script>
    <script src= "{{ asset('/js/owl.js') }}"></script>
    <script src="{{ asset('/js/slick.js') }}"></script>
    <script src="{{ asset('/js/isotope.js') }}"></script>
    <script src="{{ asset('/js/accordions.js') }}"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>
  </body>

</html>
