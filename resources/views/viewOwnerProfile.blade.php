<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Owner Profile</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
 <link rel="stylesheet" href="/css/animate.css">
 
 <link rel="stylesheet" href="/css/owl.carousel.min.css">
 <link rel="stylesheet" href="/css/owl.theme.default.min.css">
 <link rel="stylesheet" href="/css/magnific-popup.css">


 <link rel="stylesheet" href="/css/bootstrap-datepicker.css">
 <link rel="stylesheet" href="/css/jquery.timepicker.css">

 <link rel="stylesheet" href="/css/flaticon.css">
 <link rel="stylesheet" href="/css/style.css">
    </head>
       <!-- Wrap above nav -->
       <div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-6 d-flex align-items-center">
						<p class="mb-0 phone pl-md-2">
							<a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +00 1234 567</a> 
							<a href="#"><span class="fa fa-paper-plane mr-1"></span> youremail@email.com</a>
						</p>
					</div>
					<div class="col-md-6 d-flex justify-content-md-end">
						<div class="social-media">
			    		<p class="mb-0 d-flex">
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
			    		</p>
		        </div>
					</div>
				</div>
			</div>
		</div>
<!--Start of Navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-muted" id="ftco-navbar">
	    <div class="container">
	    	<a class="navbar-brand" href="index.html"><span class="flaticon-pawprint-1 mr-2"></span>Pet Finder</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#securityModal">if you have a security code please click here</a></li>
				@if (session('petOwnerCode'))
				<li class="nav-item"><a href="{{ route('view-owner-profile') }}" class="nav-link">View Owner Profile</a></li>
				<li class="nav-item"><a href="{{ route('owner-logout') }}" class="nav-link">Logout</a></li>
				@else
				<li class="nav-item"><a href="{{ route('client-login') }}" class="nav-link">Login</a></li>
				@endif
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Owner Profile</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-6 ftco-animate">
	          <div class="block-7">
	          	<div class="img" style="background-image: url(images/pricing-1.jpg);"></div>
	            <div class="text-center p-4">
	            	<span class="excerpt d-block">Owner Information</span>
		            <ul class="pricing-text mb-5 text-warning">
                    <p>Name: {{ $owner->name }}</p>
    <p>Email: {{ $owner->email }}</p>
    <p>Address: {{ $owner->address }}</p>
    <p>Phone No: {{ $owner->phone_no }}</p> 
    <p>Country {{ $owner->country }}</p> 
    <p>State: {{ $owner->state }}</p> 
    <p>City: {{ $owner->city }}</p> 
    <p>Zip Code: {{ $owner->zip_code }}</p> 
		            </ul>

	            </div>
	          </div>
	        </div>
	        <div class="col-md-6 ftco-animate">
	          <div class="block-7">
              @foreach ($pets as $pet)
	          	<div class="img" style="background-image:url({{ asset($pet->uploadPet) }});"></div>
	            <div class="text-center p-4">
	            	<span class="excerpt d-block">Your Pet</span>     
		            <ul class="pricing-text mb-5 text-warning">
                   
                    <p>Name: {{ $pet->petname }}</p>
        <p>Species: {{ $pet->species }}</p>
        <p>Color: {{ $pet->color }}</p>
        <p>Gender: {{ $pet->gender }}</p>
        <p>Age: {{ $pet->age }}</p>
        @endforeach
		            </ul>
	            </div>
	          </div>
	        </div>
	      </div>
    	</div>
    </section>
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
    <script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>
</html>
