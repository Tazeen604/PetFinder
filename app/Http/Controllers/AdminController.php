<?php
namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin; // Assuming you have an Admin model to interact with the 'admin' table

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.create'); // Render the form view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:admin,name',
            'password' => 'required|min:6',
        ]);

        $data = [
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
        ];

        Admin::create($data); // Insert data into the 'admin' table
        Session::flash('success', 'Admin Created Successfully');
        return redirect()->route('admin')->with('success', 'Admin created successfully');
    }
}

?>