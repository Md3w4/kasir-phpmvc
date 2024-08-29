<?php

class AuthController extends BaseController
{
    protected $authModel;

    public function __construct()
    {
        $this->authModel = $this->model('AuthModel');
    }

    public function showLogin()
    {
        $data = [
            'title' => 'Login',
        ];
        $this->view('authentication/login', $data);
    }

    public function login()
    {
        $fields = [
            'identifier' => 'string|required|min:3|max:100',
            'password' => 'string|required|min:8|max:64'
        ];

        $messages = [
            'identifier' => [
                'required' => 'Username, Email, atau No HP diperlukan',
                'min' => 'Identifier harus memiliki setidaknya %d karakter',
                'max' => 'Identifier harus kurang dari %d karakter',
            ],
            'password' => [
                'required' => 'Password diperlukan',
                'min' => 'Password harus memiliki setidaknya %d karakter',
                'max' => 'Password harus kurang dari %d karakter',
            ]
        ];

        [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

        if ($errors) {
            Message::setFlash('error', 'Login Gagal', $errors[0], $inputs);
            $this->redirect('login');
        }

        $user = $this->authModel->findByIdentifier($inputs['identifier']);

        if (!$user || !password_verify($inputs['password'], $user['password'])) {
            Message::setFlash('error', 'Login Gagal', 'Username, Email, No HP atau Password salah');
            $this->redirect('login');
        }

        $_SESSION['user'] = $user;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        $this->redirect('index');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        $this->redirect('login');
    }

    public function showRegister()
    {
        $data = [
            'title' => 'Register',
        ];
        $this->view('authentication/register', $data);
    }

    public function register()
    {
        $fields = [
            'nama' => 'string|required|min:3|max:50',
            'no_hp' => 'string|required|min:10|max:15',
            'username' => 'string|required|min:3|max:50',
            'email' => 'string|required|email|max:100',
            'password' => 'string|required|min:8|max:64'
        ];

        $messages = [
            // Messages similar to the login
        ];

        [$inputs, $errors] = $this->filter($_POST, $fields, $messages);

        if ($errors) {
            Message::setFlash('error', 'Registration Gagal', $errors[0], $inputs);
            $this->redirect('register');
        }

        $inputs['password'] = password_hash($inputs['password'], PASSWORD_BCRYPT);

        $created = $this->authModel->createUser($inputs);

        if ($created) {
            Message::setFlash('success', 'Registration Sukses', 'Anda bisa login sekarang');
            $this->redirect('login');
        } else {
            Message::setFlash('error', 'Registration Gagal', 'Terjadi kesalahan, coba lagi');
            $this->redirect('register');
        }
    }
}
