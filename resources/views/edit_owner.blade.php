<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Jquery -->
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
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
<body class="form-v2 bg-secondary">

<div class="container p-3 d-flex justify-content-center">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 bg-success p-5">   
                    <h3 class="mt-3">Update Customer</h3>
                    
                    <form method="POST" action="{{ route('updateClient', ['code' => $owner->security_code]) }}" id="myform">
                        @method('PUT')
                        @csrf
                                    <div class="form-row">
                                    <div class="col-sm-2 col-lg-2 col-md-2"></div> 
                                    <div class="col-sm-8 col-lg-8 col-md-8">
                                        <div class="form-group">
                                        <label class="form-label">Security Code (You can't change it)</label>
                                        <input type="text" name="security_code" id="security_code" class="input-text" value="{{ $owner->security_code }}" readonly>
                                        </div>
                    </div>
                                  </div>
                                    <div class="form-row">
                                    <div class="col-sm-2 col-lg-2 col-md-2"></div> 
                                    <div class="col-sm-8 col-lg-8 col-md-8">
                                        <div class="form-group">
                                        <label class="form-label">Customer Name</label>
                                        <input type="text" name="name" id="name"  class="form-control form-control-lg" placeholder="Updated Owner NAme" value="{{ $owner->name }}">
                                    
                                    </div>
                    </div>
                                  </div>
                    
                                  <div class="form-row">
                                  <div class="col-sm-2 col-lg-2 col-md-2"></div> 
                                  <div class="col-sm-8 col-lg-8 col-md-8">
                                  <div class="form-group">
                                  <label class="form-label">Customer Address</label>
                                    <input type="text"  id="address" name="address" class="form-control form-control-lg" placeholder="Update Address" value="{{ $owner->address }}">	
                                </div>
                    </div>
                                </div>
                                <div class="form-row">
                                <div class="col-sm-2 col-lg-2 col-md-2"></div> 
                                <div class="col-sm-8 col-lg-8 col-md-8">
                                <div class="form-group">
                                <label class="form-label">Customer Phone No</label>
                                        <input type="text"  id="phone_no" name="phone_no" class="form-control form-control-lg" placeholder="Update Phone No" value="{{ $owner->phone_no }}">
                     </div>
                    </div>
                                </div>
                                <div class="form-row">
                                <div class="col-sm-2 col-lg-2 col-md-2"></div> 
                                <div class="col-sm-8 col-lg-8 col-md-8">
                                <div class="form-group">
                                <label class="form-label">Customer Zip Code</label>
                                        <input type="text" id="zip_code" name="zip_code"  class="form-control form-control-lg" placeholder="Update Zip Code" value="{{ $owner->zip_code }}">
                                
                                    </div>
                    </div>
                                </div>
                                <div class="form-row">
                                <div class="col-sm-2 col-lg-2 col-md-2"></div> 
                                <div class="col-sm-8 col-lg-8 col-md-8">
                                    <div class="form-group ">
                                    <label class="form-label">Customer State</label>
                                        <input type="text" id="state" name="state" class="form-control form-control-lg" placeholder="Update State" value="{{ $owner->state }}">
                                
                                    </div>
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="col-sm-2 col-lg-2 col-md-2"></div> 
                    <div class="col-sm-8 col-lg-8 col-md-8">
                                    <div class="form-group ">
                                    <label class="form-label">Customer Country</label>
                                        <input type="text" id="country" name="country" class="form-control form-control-lg" placeholder="Update country" value="{{ $owner->country }}">
                                
                                    </div>
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="col-sm-2 col-lg-2 col-md-2"></div> 
                    <div class="col-sm-8 col-lg-8 col-md-8">
                                <div class="form-group">
                                <label class="form-label">Customer City</label>
                                    <input type="text"  id="city" name="city"  class="form-control form-control-lg" placeholder="Update city" value="{{ $owner->city }}">
                                
                                </div>
                    </div>
                    </div>
                      <div class="text-center mt-3"> <button type="submit" class="btn btn-danger">Update Customer</button></div>
                    </form>
</div>
<div class="col-sm-6 col-md-6 col-lg-6  bg-primary p-5"> 
                    <!-- Pet Edit Form -->
                    <form method="POST" action="{{ route('updateClientPet', ['code' => $owner->security_code]) }}" class="form-detail">
                        @method('PUT')
                        @csrf
                        <h3>Update Pet</h3>
                        <div class="form-row">
                    <div class="col-sm-2 col-lg-2 col-md-2"></div> 
                    <div class="col-sm-8 col-lg-8 col-md-8">
                                            <label class="form-label">Security Code(It can't be changed)</label>
                                                <input class="form-control form-control-lg" type="text" value="{{  $pet->security_code   }}" name="security_code" id="security_code" readonly>
                    </div>
                    </div>
                                         
                    <div class="form-row">
                    <div class="col-sm-2 col-lg-2 col-md-2"></div> 
                    <div class="col-sm-8 col-lg-8 col-md-8">
                                            <label class="form-label">Update Pet name</label>
                                                <input  class="form-control form-control-lg" type="text" placeholder="Update Your Pet name" name="petname" id="petname" value="{{ $pet->petname }}">
                                            
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="col-sm-2 col-lg-2 col-md-2"></div> 
                    <div class="col-sm-8 col-lg-8 col-md-8">
                                                <label class="form-label">Update Pet Age</label>
                                                <input  class="form-control form-control-lg" type="text" placeholder="Update Your Pet Age" name="age" id="age" value="{{ $pet->age}}">
                    </div>
                    </div>
                                                <div class="form-row">
                    <div class="col-sm-2 col-lg-2 col-md-2"></div> 
                    <div class="col-sm-8 col-lg-8 col-md-8">
                                            
                                            <label class="form-label">Update Pet Color</label>
                                                <input  class="form-control form-control-lg" type="text" placeholder="Update COLOR" name="color" id="color" value="{{ $pet->color }}">
                    </div>
                    </div>
                                            
                                            
                      <div class="text-center mb-5 mt-3">  <button type="submit" class="btn btn-danger">Update Pet</button></div>
                    </form>
                    
                    </div>
</div>
</div>


                    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>
</html>

	