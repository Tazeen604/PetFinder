<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Jquery -->
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('css/loginstyle.css') }}"/>
    <style>
        .form-group {
    position: relative; /* Ensure relative positioning for the container */
}

.form-group i {
    position: absolute;
    top: 30%;
    left: 20px; /* Adjust the left position as needed to align the icon */
    transform: translateY(-50%);
    font-size: 16px;
    color: #2AAA8A; /* Optionally, set the color of the icon */
    pointer-events: none; /* Prevent the icon from interfering with input events */
}

.form-group input {
    padding-left: 50px; /* Ensure enough padding on the left side to accommodate the icon */
}
/* styles.css */

.social-icons {
    display: flex;
    justify-content: center;
    align-items: center;
}

.social-icons a {
    display: inline-block;
    margin: 0 10px;
    font-size: 24px;
    color: #333;
    background-color: #fff;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    transition: background-color 0.3s ease-in-out;
}

.social-icons a:hover {
    background-color:#008000;
}

        </style>
</head>
<body class="form-v2">
<div class="bg-overlay">
	<div class="page-content">
		<div class="form-v2-content">
			<div class="form-left">
				<img src="{{ asset('images/image_5.jpg') }}" width="90%" height="100%"alt="form">
				<div class="text-1">
					<p>Find Your Friend<span>Be Happy</span></p>
				</div>
			</div>
			
      
			<form class="form-detail" action="{{ route('owners') }}" method="post" id="myform">
			@csrf
			<p class="social-icons">Register with</p>
              <hr>
			<div class="social-icons">
            <a href="{{ route('google.signup') }}" class="google-icon"><i class="fab fa-google"></i></a>
          <a href="#" class="facebook-icon"><i class="fab fa-facebook-f"></i></a>
        </div>
			<h2>Create Your Account</h2>
				
				<div class="form-row">
                    <div class="form-group">
					@if(isset($securityCode))
					<input type="text" name="security_code" id="security_code" class="input-text" value="{{ $securityCode }}" readonly>
					@endif
					@error('security_code')
					<span class="text-danger">{{ $message }}</span>
					@enderror('security_code')
				</div>
              </div>
				<div class="form-row">
                    <div class="form-group">
                <i class="fas fa-user"></i>
					<input type="text" name="name" id="name" class="input-text" placeholder=" &nbsp &nbsp &nbsp &nbsp Owner Full Name">
					@error('name')
           			 <span class="text-danger">{{ $message }}</span>
						@enderror('name')
				</div>
              </div>

			  <div class="form-row">
			  <div class="form-group">
                <input type="text"  id="address" name="address"class="input-text" placeholder="Enter address">
				@error('address')
           			 <span class="text-danger">{{ $message }}</span>
            		@enderror
            </div>
			</div>
            <div class="form-row">
			<div class="form-group">
                <div class="col-md-4">
                    <input type="text"  id="phone_no" name="phone_no" class="input-text" placeholder="Enter Phone no">
					@error('phone_no')
           			 <span class="text-danger">{{ $message }}</span>
            		@enderror
                </div>
			</div>
			<div class="form-group">
                <div class="col-md-4">
                    <input type="text" id="zip_code" name="zip_code" class="input-text" placeholder="Enter Zip Code">
					@error('zip_code')
           			 <span class="text-danger">{{ $message }}</span>
            		@enderror
                </div>
			</div>
			</div>
			<div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" id="state" name="state"class="input-text" placeholder="Enter state">
					@error('state')
           			 <span class="text-danger">{{ $message }}</span>
            		@enderror
                </div>
				<div class="form-group col-md-4">
                    <input type="text" id="country" name="country"class="input-text" placeholder="Enter country">
					@error('country')
           			 <span class="text-danger">{{ $message }}</span>
            		@enderror
                </div>
            </div>
            <div class="form-group">
                <input type="text"  id="city" name="city" class="input-text" placeholder="Enter city">
				@error('city')
           			 <span class="text-danger">{{ $message }}</span>
            		@enderror
            </div>

              <div class="form-row">
              <div class="form-group">		
                <i class="fas fa-envelope"></i>
					<input type="email" name="email" id="email" class="input-text" placeholder=" &nbsp &nbsp &nbsp &nbsp Owner Email"required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					@error('email')
           			 <span class="text-danger">{{ $message }}</span>
            		@enderror
				</div>
</div>
				<div class="form-row">
                <div class="form-group">
                <i class="fas fa-lock"></i>
					<input type="password" name="password" id="password" class="input-text" placeholder="&nbsp &nbsp &nbsp &nbsp  Password" required>
					@error('password')
           			 <span class="text-danger">{{ $message }}</span>
            		@enderror
				</div>
</div>
<div class="form-group">
                <input type="text"  id="status" name="status" class="input-text" value="new user" readonly >
            </div>
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Create Your Profile">
                  
				</div>
              
			  <strong>  <a href="" class="social-icons">Already have an account</a></strong>
			</form>
			
		</div>
      
	</div>
</div>

	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	
</body>
</html>