<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
class SuperdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('SuperAdmin.dashboard');
    }
    public function showCompany()
    {
        
        $admins=User::where('role', 'admin')
    ->where('status', 'active')
    ->get();
    $companies= Company::with(['owner','creator'])->paginate(2);
        return view('SuperAdmin.campanypage.campany',compact('admins','companies'));
    }
    public function companyInfons()
    {
        return view('SuperAdmin.campanypage.companyinfo');
    }
    public function userpage()

    {
        $users = User::latest()->paginate(2);
        return  view('SuperAdmin.user_create',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function addCompany(Request $request)
    {
        
    $request->validate([
        'company_name' => 'required|string|max:255',
        'license_no'   => 'nullable|string|max:255',
        'tin_no'          => 'nullable|string|max:255',
        'vat_no'       => 'nullable|string|max:255',
        'owner_user_id'=> 'required|exists:users,id',
    ]);

    
    $exists = Company::where('company_name', $request->company_name)->first();

    if ($exists) {
        return back()->with('errors', 'Company already exists!');
    }

  
   $company = Company::create([
        'company_name'   => $request->company_name,
        'license_no'     => $request->license_no,
        'tin'            => $request->tin_no,
        'vat_no'         => $request->vat_no,
        'status'         => 'active',
        'owner_user_id'  => $request->owner_user_id,
        'created_by'     => Auth::id(),
    ]);
      User::where('id', $request->owner_user_id)
        ->update([
            'company_id' => $company->id,
            
        ]);

    return back()->with('success', 'Company created successfully!');
    }
    public function deleteCompany( int $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

    return redirect()->back()->with('success', 'Company deleted successfully!');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
      
    
    //   $request->validate([
    //         'name'        => 'required|string|max:255',
    //         'email'       => 'required|email|unique:users,email',
    //         'phone' => 'required|string|unique:users,phone',
    //         'address' => 'required|string',
    //         'password'    => 'required|min:6|confirmed',  
    //         'role'        => 'required',
    //     ], [
    //         'password.confirmed' => 'Passwords do not match!'
    //     ]);

        
    //     // $exists = User::where('email', $request->email)->where('name',$request->name)->exists();

    //     // if ($exists) {
            
    //     //     return redirect()->back()->with('error', 'User already exists.');
    //     // }
    //     // if ($request->password !== $request->password_confirmation) {
    //     //     return redirect()->back()->with('errors', 'Passwords do not match!');
    //     // }
    //     User::create([
    //         'name'     => $request->name,
    //         'email'    => $request->email,
    //         'phone' => $request->phone,
    //         'address' => $request->address,
    //         'password' => Hash::make($request->password),
    //         'role'   => $request->role,
    //         'created_by'  => Auth::user()->id
    //     ]);

    
    //     return redirect()->back()->with('success', 'User added successfully.');



    // }



    public function store(Request $request)
{
//     $request->validate([
//         'name'     => 'required|string|max:255',
//         'email'    => 'required|email|unique:users,email',
//         'phone'    => 'required|string|unique:users,phone',
//         'address'  => 'required|string',
//         'password' => 'required|min:6|confirmed',
//         'role'     => 'required',
//     ]);
// if ($request->password !== $request->password_confirmation) {
//     return redirect()->back()->with('errors', 'Passwords do not match');
// }


  
    if (
        empty($request->name) ||
        empty($request->email) ||
        empty($request->phone) ||
        empty($request->address) ||
        empty($request->password) ||
        empty($request->password_confirmation) ||
        empty($request->role)
    ) {
        return redirect()->back()
            ->withInput()
            ->with('errors', 'All fields are required');
    }

   
    if (User::where('email', $request->email)->exists()) {
        return redirect()->back()
            ->withInput()
            ->with('errors', 'Email already taken');
    }

   
    if (strlen($request->password) < 6) {
        return redirect()->back()
            ->withInput()
            ->with('errors', 'Your password must be at least 6 characters');
    }

   
    if ($request->password !== $request->password_confirmation) {
        return redirect()->back()
            ->withInput()
            ->with('errors', 'Passwords do not match');
    }


    if (!preg_match('/[0-9]/', $request->password)) {
        return redirect()->back()
            ->withInput()
            ->with('errors', 'Your password is weak. Add at least one number');
    }

  
    if (!preg_match('/[@$!%*#?&]/', $request->password)) {
        return redirect()->back()
            ->withInput()
            ->with('errors', 'Your password is weak. Add at least one symbol');
    }
    if (!preg_match('/^(06|07)[0-9]{8}$/', $request->phone)) {
    return redirect()->back()
        ->withInput()
        ->with('errors', 'Phone number must start with 06 or 07 and be exactly 10 digits');
}

if (User::where('email', $request->email)->exists()) {
    return redirect()->back()->with('errors', 'Email already taken');
}
    User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'phone'    => $request->phone,
        'address'  => $request->address,
        'password' => Hash::make($request->password),
        'role'     => $request->role,
        'created_by' => Auth::id(),
    ]);

    return redirect()->back()->with('success', 'User added successfully.');
}

    public function deleteUser( int $id)
    {
         $user = User::findOrFail($id);
         $user->delete();

    return redirect()->back()->with('success', 'User deleted successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
