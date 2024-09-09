<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile_number' => ['required', 'string', 'max:15'],
            'room_number' => ['required', 'string', 'max:10'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:4096'], // Validate the photo
            'country' => ['required', 'in:Bangladesh,India,Nepal'],
            'address' => ['required', 'string', 'max:255'],
            'religion' => ['required', 'in:Muslim,Hindu,Boddho,Cristan'],
            'gender' => ['required', 'in:Male,Female'],
            'date_of_birth' => ['required', 'date'],
            'course_type' => ['required', 'in:Language,BSC,MSC,PHD'],
            'department' => ['required', 'in:Automobile,Forestry,Mechanical,Computer Science and Technology,Economics'],
            'course_year' => ['required', 'in:1st Year,2nd Year,3rd Year,Final Year'],
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request)));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create($request)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
        $photoPath = null;
        if ($request->hasFile('photo')) {
            // Store the file in the 'public/photos' directory
            $photoPath = $request->file('photo')->store('photos', 'public');
        }
        
        $user = new user();
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->mobile_number = $request->mobile_number;
        $user->room_number = $request->room_number;
        $user->photo = $photoPath;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->religion = $request->religion;
        $user->date_of_birth = $request->date_of_birth;
        $user->course_type = $request->course_type;
        $user->department = $request->department;
        $user->course_year = $request->course_year;
        $user->gender = $request->gender;
        $user->save();
        return $user;
    }
}
