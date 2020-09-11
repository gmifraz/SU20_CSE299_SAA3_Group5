<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|integer',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $User = new User;
        $User->name = $data['name'];
        $User->email = $data['email'];
        $User->password = Hash::make($data['password']);
        
        $Role = Role::find($data['role']);
        $Role->users()->save($User);
        
        return $User;
        
    }
    
    public function showRegistrationForm()
    {
        $Roles = Role::all();
        
        $RoleOptions = array();
        if(count($Roles) >= 1){
	        foreach($Roles as $Role){
		        $RoleOptions[$Role->id] = $Role->name;
	        }
        } else{
	        $RoleOptions[0] = 'No Roles Found';
        }
        
        return view('auth.register')->with('RoleOptions', $RoleOptions);
    }
}