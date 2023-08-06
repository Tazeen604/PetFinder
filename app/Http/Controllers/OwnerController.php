<?php
namespace App\Http\Controllers;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'security_code' => 'required|string|min:8',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_no' => 'required|string|max:20',
            'zip_code' => 'required|string|max:10',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'email' => 'required|string|email|unique:owners|max:255',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|string|max:100',
            
        ]);
dd($request);
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
       dd($owner); 
        return redirect()->route('pet_registration', ['token' => $owner->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
