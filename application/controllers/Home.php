<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('is_logged_in') !== true) {
		    redirect('/auth/login');
        }
	}

	public function index()
	{
	    $this->_title = 'Home';
	    $this->_subTitle = 'Dashboard';

	    $welcome_message = 'Welcome to CodeIgniter with AdminLTE template';

		$this->_render_page([
		    'welcome_message' => $welcome_message
        ]);
		//render_page($data);
	}
}
