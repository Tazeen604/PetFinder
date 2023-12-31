<?php
namespace App\Http\Controllers;
use App\Models\Owner;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
//Check security code
    public function checkSecurityCode(Request $request)
    {
        $securityCode = $request->input('security_code');
        $matched = \DB::table('pet_qr_code')->where('security_code', $securityCode)->exists();
        $matchedOwners = \DB::table('owners')->where('security_code', $securityCode)->exists();
        if(!$matchedOwners){
        if ($matched) {
            // Redirect to the full registration form with the readonly security code field
            session(['securityCodeOwner' => $securityCode]);
            return redirect()->route('register', ['securityCode' => $securityCode]);
        } else {
            // Show a message that the security code does not match
            $request->session()->flash('security_code_match', false);
        return back();
        }
     } else{
        
        $request->session()->flash('security_code_exist', false);
        return back();
    }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //dd($request->all());
        $request->validate([
            'security_code' => 'required|string|min:8|unique:owners',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_no' => 'required|string|max:20',
            'zip_code' => 'required|string|max:10',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'email' => 'required|string|email|unique:owners|max:255',
            'password' => 'required|string|min:8',
            'status' => 'required|string|max:100',
            
        ]);
//dd($request);
        $owner = Owner::create([
            'security_code' => $request->input('security_code'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone_no' => $request->input('phone_no'),
            'zip_code' => $request->input('zip_code'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => $request->input('status'),
        ]);
      // dd($owner->id); 
      session(['petOwnerCode' => $owner->security_code]);
      session(['petOwnerName' => $owner->name]);

        $message = 'Registration successful! Now you have to register your pet..You can register as many pets as you can';
       
        session()->flash('success', $message);
          return redirect()->route('pet_registration', ['token' => $owner->id]);
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOwner()
    { //dd(session()->all());

            $securityCode = session('petOwnerCode');
            
            if ($securityCode) {
                $owner = Owner::where('security_code', $securityCode)->first();
                
                if ($owner) {
                    $pets = Pet::where('security_code', $securityCode)->get();
                    return view('viewOwnerProfile', compact('owner', 'pets'));
                }
            }
            
            return redirect('/');
      

}


//View ALL Customers
public function viewAllCustomers()
{ //dd(session()->all());
 // Get all owners (customers)
     $owners = Owner::all();
     // Get all pets
     $pets = Pet::all();
     // Use Laravel Collection methods to filter and combine data based on security code
    $combinedData = $owners->filter(function ($owner) use ($pets) {
        return $pets->contains('security_code', $owner->security_code);
    })->map(function ($owner) use ($pets) {
        $matchedPet = $pets->firstWhere('security_code', $owner->security_code);
        return [
            'owner' => $owner,
            'pet' => $matchedPet,
        ];
    });

    return view('/admin/customers_pets', compact('combinedData'));
  

}
// Edit view for customers
    public function editCustomers($code)
    {
        $owner = Owner::where('security_code', $code)->firstOrFail();
        $pet = Pet::where('security_code', $code)->first();
    
        return view('/admin/edit_customer', compact('owner', 'pet'));
    }

    /**
     * Update Customers .
     *
     */
    public function updateOwner(Request $request, $code)
    {
        $owner = Owner::where('security_code', $code)->firstOrFail();
     
        // Update Owner fields

        $owner->name = $request->input('name');
        $owner->address = $request->input('address');
        $owner->country = $request->input('country');
        $owner->state = $request->input('state');
        $owner->phone_no = $request->input('phone_no');
        $owner->zip_code = $request->input('zip_code');
        $owner->city = $request->input('city');
        $owner->save();
        return redirect()->route('allcustomers')->with('success', 'Profile updated successfully.');
    }
    
        // Update Pet fields
        public function updatePet(Request $request, $code)
        {
    $pet = Pet::where('security_code', $code)->firstOrFail();
        $pet->petname = $request->input('petname');
        $pet->age = $request->input('age');
        $pet->color = $request->input('color');
        $pet->save();
        return redirect()->route('allcustomers')->with('success', 'Profile updated successfully.');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCustomers($code)
    {
        // Find owner and associated pet by security code
        $owner = Owner::where('security_code', $code)->first();
        $pet = Pet::where('security_code', $code)->first();
    
        if ($owner && $pet) {
            // Delete owner and associated pet
            $owner->delete();
            $pet->delete();
    
            return redirect()->back()->with('deletedSuccess', 'Record deleted successfully.');
        }
    
        return redirect()->back()->with('deletederror', 'Record not found.');
    }
    

    public function ownerLogin(Request $request)
    {
        $request->validate([
            'security_code' => 'required',
            'password' => 'required',
        ]);

        $yourCode = $request->input('security_code');
        $pw = $request->input('password');

        // Get the user by name
        $owner = Owner::where('security_code', $yourCode)->first();
        if ($owner && \Hash::check($pw, $owner->password) ) {
            // Authentication passed, log in the user
            session(['petOwnerCode' => $owner->security_code]);
            return redirect()->route('view-owner-profile'); // Replace 'admin.dashboard' with your desired route
        } else {
            // Authentication failed, redirect back to login page with an error message
            return redirect()->route('client-login');
        }
    }



    // edit view for owners
    // Edit view for customers
    public function editOwners($code)
    {
        $owner = Owner::where('security_code', $code)->firstOrFail();
        $pet = Pet::where('security_code', $code)->first();
    
        return view('/edit_owner', compact('owner', 'pet'));
    }

//Update Owner and PEt
public function updateClient(Request $request, $code)
{
    $owner = Owner::where('security_code', $code)->firstOrFail();
 
    // Update Owner fields

    $owner->name = $request->input('name');
    $owner->address = $request->input('address');
    $owner->country = $request->input('country');
    $owner->state = $request->input('state');
    $owner->phone_no = $request->input('phone_no');
    $owner->zip_code = $request->input('zip_code');
    $owner->city = $request->input('city');
    $owner->save();
    return redirect()->route('view-owner-profile')->with('success', 'Profile updated successfully.');
}

    // Update Pet fields
    public function updateClientPet(Request $request, $code)
    {
$pet = Pet::where('security_code', $code)->firstOrFail();
    $pet->petname = $request->input('petname');
    $pet->age = $request->input('age');
    $pet->color = $request->input('color');
    $pet->save();
    return redirect()->route('view-owner-profile')->with('success', 'Profile updated successfully.');
}



    public function logout() {
        Session::flush();
        return redirect('/');
    }
}
