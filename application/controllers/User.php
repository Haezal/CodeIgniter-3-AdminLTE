<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('UserModel');
	}

	public function index()
	{
	    $this->_title = 'User';
	    $this->_subTitle = 'List';

        $users = $this->UserModel->getUserList();

		$this->_render_page([
		    'users' => $users
        ]);
		//render_page($data);
	}

	public function view($id) {
	    $user = $this->UserModel->getUser($id);

	    $this->_render_page([
	        'user' => $user
        ]);
    }
}
