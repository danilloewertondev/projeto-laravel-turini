<?php namespace estoque\Http\Controllers;

use estoque\Http\Requests;
use estoque\Http\Controllers\Controller;

use Auth;
use Request;

class LoginController extends Controller {

    public function login()
    {
        $credenciais = Request::only('email', 'password');

        if(Auth::attempt($credenciais)) {
            return "Usuário NOME logado com sucesso";
        }

        return "As credencias não são válidas";
    }

    public function Logout(){
            Auth::logout();
        return view('auth.login'); //redireciona o usuario para a pagina inicial
        }


}