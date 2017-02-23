<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Repositories\User\UsersRepository;
use App\Http\Requests\RegisterRequest;
use Auth;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UsersRepository $userRepository)
    {
        $this->middleware('guest');
        $this->userRepository = $userRepository;
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $confirmationCode = str_random(config('common.user.confirmation_code.length'));
        $input = [
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
            'confirmed' => config('common.user.confirmed.not_confirm'),
            'confirmation_code' => $confirmationCode,
        ];
        $sendMailData = [
            'email' => $request->email,
            'name' => $request->name,
            'confirmation_code' => $confirmationCode,
        ];
        try {
            $user = $this->userRepository->create($input, $sendMailData);
        } catch (Exception $e) {
            return redirect()->route('home')->withError($e->getMessage());
        }

        return redirect()->back()->withErrors(trans('message.register_active'));
    }
    
    public function confirm($confirmationCode)
    {
        try {
            $user = $this->userRepository->updateConfirm($confirmationCode);
            Auth::login($user);

            return redirect()->route('home');
        } catch (Exception $e) {
            return redirect()->route('home')->withError($e->getMessage());
        }
    }
}
