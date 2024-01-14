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
        // Utilizadores Model
        $userModel = new UtilizadoresModel();
        $users = $userModel->findAll();
        
        //dd($users);
        echo '<pre>';
        print_r($users);

        // Tasks Model
        $taskModel = new TasksModel();
        $tasks = $taskModel->findAll();

        //dd($tasks);
        echo '<pre>';
        print_r($tasks);
    }
}
