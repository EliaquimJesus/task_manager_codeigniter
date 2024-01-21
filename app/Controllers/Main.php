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
        $data = [];

        // load data from database with the user in session
        $task_model = new TasksModel();
        $data['tasks'] = $task_model->where('id_user', session()->id)->findAll();
        $data['datatables'] = true;

        // Crate main page
        return view('main', $data);
    }

    public function login()
    {
        // Check if there is an active session
        if(session()->has('id')){
            return redirect()->to('/');
        }

        $data = [];

        // Check for validation error (getFlashdata é um mecanismo do codeigniter)
        $validation_errors = session()->getFlashdata('validation_errors');
        if ($validation_errors) {
            $data['validation_errors'] = $validation_errors;
        }

        // check for login error
        $login_error = session()->getFlashdata('login_error');
        if ($login_error) {
            $data['login_error'] = $login_error;
        }

        return view('login_frm', $data);
    }

    public function login_submit()
    {
        // Form validation
        $validation = $this->validate(
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
        );

        if (!$validation) {
            return redirect()->to('/login')->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        // get form data
        $user = $this->request->getPost('text_utilizador');
        $passwrd = $this->request->getPost('text_password');

        // Check if login is valid
        $utilizadores_model = new UtilizadoresModel();
        $user_data = $utilizadores_model->where('utilizador', $user)->first();

        // If usuario is not found
        if (!$user_data) {
            return redirect()->to('/login')->withInput()->with('login_error', 'Utilizador ou password inválidos.');
        }

        // If password is not valid
        if (!password_verify($passwrd, $user_data->passwrd)) {
            return redirect()->to('/login')->withInput()->with('login_error', 'Utilizador ou password inválidos.');
        }

        // login is valid
        $session_data = [
            'id' => $user_data->id,
            'utilizador' => $user_data->utilizador
        ];
        session()->set($session_data);

        // redirect to home page
        return redirect()->to('/');
    }

    /**
     *  Function New task
     */
    public function new_task()
    {
        $data = [];

        // Check for validation error (getFlashdata é um mecanismo do codeigniter)
        $validation_errors = session()->getFlashdata('validation_errors');
        if ($validation_errors) {
            $data['validation_errors'] = $validation_errors;
        }

        return view('new_task_frm', $data);
    }

    /**
     *  Function New task submit
     */
    public function new_task_submit()
    {
        // Form validation
        $validation = $this->validate([
            'text_tarefa' => [
                'label' => 'Nome da tarefa',
                'rules' => 'required|min_length[5]|max_length[200]',
                'errors' => [
                    'required' => 'O campo {field} é obrigatório.',
                    'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres.',
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres.'
                ]
            ],
            'text_descricao' => [
                'label' => 'Descricao',
                'rules' => 'max_length[500]',
                'errors' => [
                    'max_length' => 'O campo {field} deve ter no máximo {param} caracteres.'
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        // Get form data
        $title = $this->request->getPost('text_tarefa');
        $description = $this->request->getPost('text_descricao');

        // Save data
        $task_model = new TasksModel();
        $task_model->insert([
            'id_user' => session()->id,
            'task_name' => $title,
            'task_description' => $description,
            'task_status' => 'new'
        ]);

        // redirect to homepage
        return redirect()->to('/');
    }

    /**
     *  Edit task
     */
    public function edit_task($enc_id)
    {
        // decrypt task id
        $task_id = decrypt($enc_id);
        if (!$task_id) {
            return redirect()->to('/');
        }

        $data = [];

        $validation_errors = session()->getFlashdata('validation_errors');
        if ($validation_errors) {
            $data['validation_errors'] = $validation_errors;
        }

        // load task data
        $task_model = new TasksModel();
        $task_data = $task_model->where('id', $task_id)->first();
        if (!$task_data) {
            return redirect()->to('/');
        }

        // check if task belong to the user in the session
        if ($task_data->id_user != session()->id) {
            return redirect()->to('/');
        }

        $data['tasks'] = $task_data;

        return view('edit_task_frm', $data);
    }

    public function edit_task_submit()
    {
        //
        $validations = $this->validate(
            //rules
            [
                'id_task' => [
                    'label' => 'id da tarefa',
                    'rules' => 'required',
                    'errors' => ['required' => 'O campo {field} é obrigatório.']
                ],
                'text_tarefa' => [
                    'label' => 'Nome da tarefa',
                    'rules' => 'required|min_length[5]|max_length[200]',
                    'errors' => [
                        'required' => 'O campo {field} é obrigatório.',
                        'min_length' => 'O campo {field} deve ter no mínimo {param} caracteres.',
                        'max_length' => 'O campo {field} deve ter no máximo {param} caracteres.'
                    ]
                ],
                'text_descricao' => [
                    'label' => 'Descricao',
                    'rules' => 'max_length[500]',
                    'errors' => [
                        'max_length' => 'O campo {field} deve ter no máximo {param} caracteres.'
                    ]
                ],
                'select_status' => [
                    'label' => 'Status',
                    'rules' => 'required',
                    'errors' => ['required' => 'O campo {field} é obrigatório.']
                ]
            ]
        );

        if (!$validations) {
            return redirect()->back()->withInput()->with('validation_errors', $this->validator->getErrors());
        }

        // Get form data
        $id = decrypt($this->request->getPost('id_task'));
        if (!$id) {
            return redirect()->to('/');
        }
        $title = $this->request->getPost('text_tarefa');
        $description = $this->request->getPost('text_descricao');
        $status = $this->request->getPost('select_status');

        // load task data
        $task_model = new TasksModel();
        $task_data = $task_model->where('id', $id)->first();
        if (!$task_data) {
            return redirect()->to('/');
        }

        // check if task belong to the user in the session
        if ($task_data->id_user != session()->id) {
            return redirect()->to('/');
        }

        // Update task in DB
        $task_model->update($id, [
            'task_name' => $title,
            'task_description' => $description,
            'task_status' => $status
        ]);

        // redirect to homepage
        return redirect()->to('/');
    }

    /**
     * Method to delete tasks
     */
    public function delete_task($enc_id)
    {
        // decrypt task id
        $id_task = decrypt($enc_id);
        if (!$id_task) {
            return redirect()->to('/');
        }

        $data = [];

        //load data from database
        $task_model = new TasksModel();
        $task_data = $task_model->where('id', $id_task)->first();
        if(!$task_data){
            return redirect()->to('/');
        }

        // check if task belong to the user in the session
        if($task_data->id_user != session()->id){
            return redirect()->to('/');
        }

        $data['tasks'] = $task_data;

        return view('delete_task', $data);

    }

    /**
     *  Method to submit delete task
     */
    public function delete_task_confirm($enc_id)
    {
        //decrypt id
        $id = decrypt($enc_id);

        // check if id
        if(!$enc_id){
            return redirect()->to('/');
        }

        // load task data
        $task_model = new TasksModel();
        $task_data = $task_model->where('id', $id)->first();

        // check if task belong to the user in the session
        if($task_data->id_user != session()->id){
            return redirect()->to('/');
        }

        $task_model->delete(['id' => $id]);

        // redirect to main page
        return redirect()->to('/');
        
    }

    /**
     *  Method to task details
     */

     public function task_details($enc_id){

        // decrypt id
        $id = decrypt($enc_id);
        if(!$id){
            return redirect()->to('/');
        }

        $data = [];

        $task_model = new TasksModel();
        $task_data = $task_model->where('id', $id)->first();
        if(!$task_data){
            return redirect()->to('/');
        }

        // check if task belong to the user in the session
        if($task_data->id_user != session()->id){
            return redirect()->to('/');
        }

        $data['tasks'] = $task_data;

        // open details page
        return view('task_details', $data);
     }

    /**
     *  Method to search
     */
    public function search()
    {
        $data = [];

        //Get search item
        $search_term = $this->request->getPost('text_search');

        //
        $task_model = new TasksModel();
        $data['tasks'] = $task_model->where('id_user', session()->id)->like('task_name', $search_term)->findAll();
        $data['datatables'] = true;

        return view('main', $data);
    }

    /**
     *  Function to filter tasks
     */
    public function filter($status)
    {
        $data = [];

        // Load tasks from user and with status
        $task_model = new TasksModel();

        if ($status == 'all') {
            $data['tasks'] = $task_model->where('id_user', session()->id)->findAll();
        } else {
            $data['tasks'] = $task_model->where('id_user', session()->id)->where('task_status', $status)->findAll();
        }

        $data['datatables'] = true;
        $data['status'] = $status;

        return view('main', $data);
    }

    /**
     * Function Logout
     */
    public function logout()
    {
        // Destroy the session
        session()->destroy();

        //redirect to login
        return redirect()->to('/');
    }
}
