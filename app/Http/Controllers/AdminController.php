<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Page;

class AdminController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth', ['except' => 
            [
                'login',
                'loginAction',
                'register',
                'registerAction'
            ]
        ]);
    }

    // Métodos para autenticação

    public function login(Request $request)
    {
        return view('admin/login', [
            'error' => $request->session()->get('error')
        ]);
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials))
        {
            return redirect('/admin');
        }

        $request->session()->flash('error', 'E-mail e/ou senha não conferem!');
        return redirect('/admin/login');
    }

    public function register(Request $request)
    {
        return view('admin/register', [
            'error' => $request->session()->get('error')
        ]);
    }

    public function registerAction(Request $request) 
    {
        $credencials = $request->only('email', 'password');

        $hasEmail = User::where('email', $credencials['email'])->count();

        if ($hasEmail === 0) {

            $newUser = new User();

            $newUser->email = $credencials['email'];
            $newUser->password = password_hash($credencials['password'], PASSWORD_DEFAULT);
            $newUser->save();

            Auth::login($newUser);
            return redirect('/admin');

        }

        $request->session()->flash('error', 'Já existe um usuário com este e-mail!');
        return redirect('/admin/register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }

    // Telas
    public function index()
    {

        $user = Auth::user();

        // Páginas que pertencem ao usuário
        $pages = Page::where('id_user', $user->id)->get();

        return view('admin/index', [
            'pages' => $pages
        ]);
    }

}
