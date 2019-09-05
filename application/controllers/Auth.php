<?php
class Auth extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function login () {

        if ($this->session->userdata('is_logged_in') === true) {
            redirect('/home');
        }

        $message = '';
        $this->load->library('form_validation');
        $this->load->model('UserModel');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()) {

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->UserModel->getByEmail($email);

            if ($user['password']== $password) {

                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('is_logged_in', true);

                redirect('/home');

            }
            else {
                $message = 'Invalid email and password';
            }


        }

        $this->load->view('auth/login', [
            'message' => $message
        ]);
    }

    function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('is_logged_in');
        redirect('/auth/login');
    }
}