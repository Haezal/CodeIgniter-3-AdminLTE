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

        $this->session->set_userdata('previous_url', current_url());

        $config = array();
        $config["base_url"] = site_url('/user/index');
        $config["total_rows"] = $this->UserModel->getCount();
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        $users = $this->UserModel->getList($config["per_page"], $page);

		$this->_render_page([
		    'users' => $users,
            'links' => $links
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
        $data = $this->UserModel->getData($id);

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

            redirect($this->session->userdata('previous_url'));
        }

        $this->_render_page($data);
    }

	public function view($id) {
	    $user = $this->UserModel->getData($id);

	    $this->_render_page([
	        'user' => $user
        ]);
    }

    function delete($id) {
        $this->UserModel->delete($id);
        redirect($this->session->userdata('previous_url'));
    }

    function report() {

        $data = $this->UserModel->getUserWithStaff();

        // echo '<pre>';print_r($data);
        $arr = array();

        foreach ($data as $key => $item) {
            $arr[$item['user_id']]['user_id'] = $item['user_id'];
            $arr[$item['user_id']]['name'] = $item['name'];
            $arr[$item['user_id']]['staffs'][$key] = $item;
        }

        // echo '<pre>';print_r($arr);exit;

        ksort($arr, SORT_NUMERIC);
//        echo '<pre>';print_r($arr);

        $this->_render_page(array(
            'arr' => $arr,
        ));
    }
}
