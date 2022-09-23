<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'jobtitle' => 'required',
            'role' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        // auth()->login($user);

        return redirect()->back()->with('success', 'User created and logged in');
    }

    // Show Edit Form
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    // Update report data
    public function update(Request $request, User $user)
    {
        // // Make sure logged in user is owner
        // if($report->user_id != auth()->id()) {
        //     abort(403, 'Unauthorized Action');
        // }

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'jobtitle' => 'required',
            'role' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

       

        $user->update($formFields);


        return redirect("/")->with('success',  ' Report Updated Successfully!');
        // return back()->with('success', 'Report updated successfully!');
    }
    
    

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out!');
    }

    // Show login Form
    public function login() {
        return view('users.login');
    }
    
    public function loginUser(Request $request)
    {   
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->role == 'admin') 
            {
              return redirect()->route('reports.manage');
            //   return redirect('/');
            }
            else if (auth()->user()->role == 'editor') 
            {
              return redirect('/');
            }
            else
            {
              return redirect('/');
            }
        }
        else
        {
            return redirect()
            ->route('login')
            ->with('error','Incorrect email or password!.');
        }
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Welcome Back!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    // Delete report
    public function destroy(User $user)
    {
        // // Make sure logged in user is owner
        // if($report->user_id != auth()->id()) {
        //     abort(403, 'Unauthorized Action');
        // }

        if($user->user_id == auth()->id()) {
            abort(403, 'You are the Super Admin');
        }

        
        $user->delete();
        return redirect()->back()->with('success','User deleted successfully');
    }

    
}
