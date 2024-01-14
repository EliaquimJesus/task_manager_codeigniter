<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TasksModel;
use App\Models\UtilizadoresModel;
use CodeIgniter\HTTP\ResponseInterface;

class Main extends BaseController
{
    public function index()
    {
        // index
    }

    public function login()
    {
        return view('login_frm');
    }

    public function login_submit()
    {   
        // get form data
        $user = $this->request->getPost('text_utilizador');
        $passwrd = $this->request->getPost('text_password');

        if(empty($user) || empty($passwrd))
        {
            return redirect()->to('login')->withInput()->with('error', 'Usuário e senha obrigatórios.');
        }

        echo "Utilizador: $user " . "<br>" . "Password: $passwrd";
    }
}
