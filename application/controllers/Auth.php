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
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run()) {

            // get input from html form
            $email      = $this->input->post('email');
            $password   = $this->input->post('password');

            // authenticate user
            $user = $this->UserModel->authenticateUser($email, $password);

            if ($user) {
                // access granted
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('is_logged_in', true);
                redirect('/home');
            }
            else {
                $message = 'Invalid email and password';
            }
        } // end form validation

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