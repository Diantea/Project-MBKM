<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $user = User::where('npm', request('npm'))->first();

        return view('auth.register', compact('user'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['type'] === 'new') {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        } else {
            return Validator::make($data, [
                'semester' => ['required'], 
                'category_id' => 'required',
            ]);
        } 
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = User::where('npm', $data['npm'])->first();
                
        if($user) {  
            $data['npm'] = $user->npm;
            $data['name'] = $user->name;
            $data['phone'] = $user->phone;
            $data['gender'] = $user->gender;
            $data['address'] = $user->address;
            $data['email'] = $user->email;
            $data['password'] = $user->password;
            $data['category_id'] = $data['category_id'];
            $data['semester'] = $data['semester'];
            $data['role'] = 'student';
            $data['status'] = 'inactive';
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        return User::create([
            'name' => $data['name'],
            'npm' => $data['npm'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => 'student',
            'status' => 'inactive',
            'category_id' => $data['category_id'],
            'semester' => $data['semester'],
        ]);
    }
}
