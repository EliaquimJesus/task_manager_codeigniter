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
        $data = [];

        // Check for validation error (getFlashdata é um mecanismo do codeigniter)
        $validation_error = session()->getFlashdata('validation_errors');
        if($validation_error){
            $data['validation_error'] = $validation_error;
        }

        return view('login_frm', $data);
    }

    public function login_submit()
    {   
        // Form validation
        $validation = $this->validate([
            // Validation rules
            [
                'text_utilizador' => 'required',
                'text_password' => 'required'
            ],
            // Validation errors
            [
                'text_utilizador' => [
                    'required' => 'O campo utilizador é obrigatório'
                ],
                'text_password' => [
                    'required' => 'O campo password é obrigatório'
                ]
            ]
        ]);

        if(!$validation){
            return redirect()->to('login')->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        // get form data
        $user = $this->request->getPost('text_utilizador');
        $passwrd = $this->request->getPost('text_password');
    }
}
