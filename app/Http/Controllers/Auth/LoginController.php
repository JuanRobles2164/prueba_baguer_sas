<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $instance_repo;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    //Es necesario sobreescribir la función de inicio de sesión para evitar una exception
    //con la autenticación
    
    public function login(Request $request){
        $this->instance_repo = UserRepository::GetInstance();
        $data_array_to_auth = [
            'username' => $request->username,
            'password' => $request->password
        ];
        $response = $this->instance_repo->authenticate($data_array_to_auth);
        if($response != null && $response != false){
            $usuario = $this->instance_repo->getByUsername($request->username);
            Auth::loginUsingId($usuario->id);
            $request->session()->regenerate();
            $request->session()->put('user', $usuario);
            return view('home');
        }else{
            return back()->withErrors(['username' => 'Credenciales no válidas', 'password' => 'Credenciales no válidas']);
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
