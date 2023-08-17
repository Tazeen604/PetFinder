<?php
namespace App\Http\Controllers;
use App\Models\Owner;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

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
        // Check the security code with your database table (replace 'users' with your actual table name)
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
        $request->session()->flash('security_code_already_exist', false);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

    public function logout() {
        Session::flush();
        return redirect('/');
    }
}
