<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Pet Finder</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/admin_styles.css') }}">

        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<style>
    .form-group {
    margin-bottom: 15px; /* Add some space between form groups */
}

/* Style for form rows */
.form-row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
</style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-danger">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Admin - Pet Finder</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               Dashboard
                            </a>
                            <a class="nav-link" href="{{ route('allcustomers') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               Customers
                            </a>
                            <a class="nav-link" href="{{ route('viewSecurityCodes') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               View All Security Codes
                            </a>
                        </div>
                    </div>
                </nav>
            </div>




                <div id="layoutSidenav_content">
               
                <main>
                    <div class="container-fluid px-4">
                    
<h3 class="mt-4">Update Customer</h3>

<form method="POST" action="{{ route('updateOwner', ['code' => $owner->security_code]) }}">
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
  <div class="text-center"> <button type="submit" class="btn btn-primary">Update Customer</button></div>
</form>


<!-- Pet Edit Form -->
<form method="POST" action="{{ route('updatePet', ['code' => $owner->security_code]) }}" class="form-detail">
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
						
						
  <div class="text-center mb-5 mt-3">  <button type="submit" class="btn btn-primary">Update Pet</button></div>
</form>

</div>
</main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    
</div></body>
</html>
