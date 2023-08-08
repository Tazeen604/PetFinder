<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class PetController extends Controller
{
    public function registerPet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'security_code' => 'required|string',
            'petname' => 'required|string',
            'gender' => 'required|string',
            'age' => 'required|integer',
            'species' => 'required|string',
            'color' => 'required|string',
            'uploadPet' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{
        $data = $validator->validated();

        if ($request->hasFile('uploadPet')) {
            $avatarPath = $request->file('uploadPet')->store('petImages', 'public');
            $data['uploadPet'] = $avatarPath;
        }

        Pet::create($data);

        
        Session::flash('success', 'Congratulations! You have registered your pet successfully.');

        return redirect('/');
    }
    }

}