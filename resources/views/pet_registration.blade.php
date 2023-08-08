<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pet Registration</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="{{ asset('css/petstyle.css') }}"/>
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
	<!-- Main Style Css -->
   
</head>

<body class="form-v2">
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
				<div class="text-center  mt-3">
                <img id="previewImage" src="{{ asset('images/about.jpg') }}" alt="Preview Image" style="max-width: 250px; max-height: 250px; border-radius: 50%;">
				</div>
                <div class="card-body">
                    <h2 class="title">Register Your Pet</h2>
                    <form method="POST" action="{{ route('pet.register') }}" enctype="multipart/form-data">
                        @csrf
					<div class="input-group">
                            <input class="input--style-1" type="text" value="{{ session('petOwnerCode') }}" name="security_code" id="security_code" readonly>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAME" name="petname" id="petname" required>
							@error('petname')
   							 <div class="alert alert-danger">{{ $message }}</div>
 							@enderror
						</div>
						<div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
								<select class="form-select-lg" id="gender" name="gender" required>
                        <option value="" disabled selected>Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                                    </div>
                                </div>

                            </div>
							<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="AGE" name="age" id="age" required>
							@error('age')
   							 <div class="alert alert-danger">{{ $message }}</div>
 							@enderror
						</div>
						<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="SPECIES" name="species" id="species" required>
							@error('species')
   							 <div class="alert alert-danger">{{ $message }}</div>
 							@enderror
						</div>
						<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="COLOR" name="color" id="color" required>
							@error('color')
   							 <div class="alert alert-danger">{{ $message }}</div>
 							@enderror
						</div>
						
						
							<label for="image" class="form-label">Upload Image</label>
                    <input type="file" class="form-control-file" id="uploadPet" name="uploadPet" accept="image/*" required>
					@error('uploadPet')
   							 <div class="alert alert-danger">{{ $message }}</div>
 							@enderror
				</div>
                        <div class="text-center">
                            <button class="btn btn-lg rounded btn-success  mb-5" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>
    $(document).ready(function () {
        // Preview the selected image on change
        $('#uploadPet').change(function () {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#previewImage').attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        });

    });
</script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

</html>