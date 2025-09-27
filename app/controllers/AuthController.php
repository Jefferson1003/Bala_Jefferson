<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('UsersModel');
        $this->call->library('session');
    }

    public function login()
    {
        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');
            $user = $this->UsersModel->findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('username', $user['username']);
                redirect(site_url('/dashboard'));
            } else {
                $data['error'] = 'Invalid username or password.';
                $this->call->view('auth/login', $data);
            }
        } else {
            $this->call->view('auth/login');
        }
    }

    public function register()
    {
        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');
            $password = $this->io->post('password');
            $hashed = password_hash($password, PASSWORD_DEFAULT);

            // Check if username/email exists
            if ($this->UsersModel->findByUsername($username)) {
                $data['error'] = 'Username already exists.';
                $this->call->view('auth/register', $data);
                return;
            }
            if ($this->UsersModel->findByEmail($email)) {
                $data['error'] = 'Email already exists.';
                $this->call->view('auth/register', $data);
                return;
            }

            $this->UsersModel->insert([
                'username' => $username,
                'email' => $email,
                'password' => $hashed,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            redirect(site_url('/login'));
        } else {
            $this->call->view('auth/register');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->destroy();
        redirect(site_url('/login'));
    }
}
