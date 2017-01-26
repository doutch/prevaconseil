<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Repositories\RoleRepository;    //ajout

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
    protected $roleGestion; //ajout


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(RoleRepository $roleGestion)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->roleGestion = $roleGestion;  //ajout
    }




    /**
     * Show the application registration form.
     *Utilisation de l'héritage de cette méthode
     *Ajouté par moi pour ajouter le champ du rôle
     * Utilisation du trait AuthenticatesAndRegistersUsers qui se trouve dans Illuminate\Foundation\Auth\RegistersUsers 
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }

        //ajout
        $listeRoles = $this->roleGestion->getListeRolesSansAdmin();

        //Récupération des roles
        return view('auth.register',['listeRoles'=> $listeRoles]);
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
            'role' => 'required|integer',   //ajout
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
        //$this->redirectTo = '/post_register';

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'id_role' => $data['role'], //ajout
        ]);
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
     
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
     
        $this->create($request->all());
     
        return redirect(route('auth.success')); // Change this route to your needs
    }


   public function success()
    {
        return view('auth.success');
    }
}
