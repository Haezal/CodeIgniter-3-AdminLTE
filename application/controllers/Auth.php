<?php
class Auth extends MY_Controller {
    function login () {

        $this->load->view('auth/login');
    }
}