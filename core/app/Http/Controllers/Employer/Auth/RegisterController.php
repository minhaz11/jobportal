<?php

namespace App\Http\Controllers\Employer\Auth;

use App\User;
use App\Admin;
use App\Employer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;
class RegisterController extends Controller
{
    use RedirectsUsers;
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

   

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/employer/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:employer');
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
            'cname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employers'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
            'website' => ['required', 'string'],
            'slogan' => ['required', 'string'],
            'description' => ['required', 'string', 'max:400'],
            'logo' => ['image', 'max:2048 '],
            'cover' => ['image', 'max:4096 '],
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
       
        $employer = new Employer ();
        $employer->company_name = $data['cname'];
        $employer->username = $data['username'];
        $employer->email = $data['email'];
        $employer->address = $data['address'];
        $employer->phone = $data['phone'];
        $employer->website = $data['website'];
        $employer->slogan = $data['slogan'];
        $employer->description = $data['description'];
        $employer->password = Hash::make($data['password']);
        if($data['logo']){
           $name = $data['cname'].'.'.$data['logo']->extension();
           $path = 'assets/employer/images';
           $img = Image::make($data['logo']);
           $img->save( $path.'/'.$name);
           $employer->logo = $name;
        }
        if($data['cover']){
           $cover_name = $data['cname'].rand(2,500).'.'.$data['logo']->extension();
           $path = 'assets/employer/images';
           $img = Image::make($data['cover']);
           $img->save( $path.'/'.$cover_name);
           $employer->cover_photo = $cover_name;
        }
        $employer->save();
        return $employer;
    }
   

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('employer.auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        session()->flash('success','Registered successfully');
        return $request->wantsJson()
                    ? new Response('', 201)
                    : redirect($this->redirectPath());

    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('employer');
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {

    }
}
