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

	public function create() {
        $this->_title = 'User';
        $this->_subTitle = 'Create';

        $data = array(
            'name' => '',
            'email' => '',
            'password' => ''
        );

        $this->load->library('form_validation');
        $this->load->model('UserModel');

        $rules = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
            $this->UserModel->insert($data);

            redirect('/user');
        }

	    $this->_render_page($data);
    }

    public function update($id) {
        $this->_title = 'User';
        $this->_subTitle = 'Update';

        $this->load->model('UserModel');
        $data = $this->UserModel->get_by_id($id);

        $this->load->library('form_validation');
        $this->load->model('UserModel');

        $rules = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
            );
            $this->UserModel->update($id, $data);

            redirect('/user');
        }

        $this->_render_page($data);
    }

	public function view($id) {
	    $user = $this->UserModel->getUser($id);

	    $this->_render_page([
	        'user' => $user
        ]);
    }
}
