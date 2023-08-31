<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/line-awesome/css/line-awesome.min.css">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/loginstyle.css"/>
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
				<img src="images/img.jpg" width="90%" height="100%"alt="form">
				<div class="text-1">
					<p>Find Your Friend<span>Be Happy</span></p>
				</div>
			</div>
			<form class="form-detail" action="#" method="post" id="myform">
				<h2>Login</h2>
              <div class="form-row">
              <div class="form-group">
				
					<input type="email" name="your_email" id="your_email" class="input-text" placeholder=" &nbsp &nbsp &nbsp &nbsp Owner Email"required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
				</div>
</div>
				<div class="form-row">
                <div class="form-group">
                <i class="fas fa-lock"></i>
					<input type="password" name="password" id="password" class="input-text" placeholder="&nbsp &nbsp &nbsp &nbsp  Password" required>
				</div>
</div>
					<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Login">
                  
				</div>
               <p class="social-icons">Login with</p>
              <hr>
        <div class="social-icons">
            <a href="#" class="google-icon"><i class="fab fa-google"></i></a>
          <a href="#" class="facebook-icon"><i class="fab fa-facebook-f"></i></a>
        </div>
        Don't have an account <strong>  <a href="" class="social-icons"> Click Here</a></strong>
			</form>
          
		</div>
      
	</div>>
</div>

	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script>
		// just for the demos, avoids form submit
		jQuery.validator.setDefaults({
		  	debug: true,
		  	success:  function(label){
        		label.attr('id', 'valid');
   		 	},
		});
		$( "#myform" ).validate({
		  	rules: {
		    	password: "required",
		    	confirm_password: {
		      		equalTo: "#password"
		    	}
		  	},
		  	messages: {
		  		full_name: {
		  			required: "Please provide an username"
		  		},
		  		your_email: {
		  			required: "Please provide an email"
		  		},
		  		password: {
	  				required: "Please provide a password"
		  		},
		  		confirm_password: {
		  			required: "Please provide a password",
		      		equalTo: "Wrong Password"
		    	}
		  	}
		});
	</script>
</body>
</html>