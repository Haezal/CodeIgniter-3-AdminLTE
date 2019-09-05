<?php

class Hello extends MY_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
    }

    function index() {
        $this->session->set_userdata('previous_url', current_url());

        // add here
        $config = array();
        $config["base_url"] = site_url('/hello/index');
        $config["total_rows"] = $this->UserModel->getCount();
        $config["per_page"] = 3;
        // $config["uri_segment"] = 3; //
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
        $this->pagination->initialize($config); // initialize config

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; // get page
        $links = $this->pagination->create_links(); // create pagination links
        
        // limit, offset
        $data = $this->UserModel->getList($config["per_page"], $page); 

        $this->_render_page( array(
            'data' => $data,
            'links' => $links, // pass the pagination link here
        ) );
    }

    function create() {

        // declar
        // $data = array(
        //     'name' => '', 
        // );

        $this->load->library('form_validation');
        $rules = array(
            array(
                'field' => 'name',
                'label' => 'Name', 
                'rules' => 'required'
            ), // name
            array(
                'field' => 'email',
                'label' => 'Email', 
                'rules' => 'required|valid_email'
            ), // email
            array(
                'field' => 'password',
                'label' => 'Password', 
                'rules' => 'required'
            ), // password 
        );
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            // if validation pass

            // fetch data from html form
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
            $this->UserModel->insert($data);
            redirect('/hello'); // sama macam Header('Location: hello.php')
        }

        $this->_render_page();
    } // end function insert

    function update($id) {

        $data = $this->UserModel->getData($id);
        // echo '<pre>';print_r($data);exit;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()) {
            // if validation pass

            // fetch data from html form
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
            
            $this->UserModel->update($id, $data);
//            redirect('/hello'); // sama macam Header('Location: hello.php')
            redirect($this->session->userdata('previous_url'));
        }

        $this->_render_page($data);
    } // end function insert

    function view($id) {
        $data = $this->UserModel->getData($id);
        $this->_render_page($data);
    }

    function delete($id) {
        $this->UserModel->delete($id);
        redirect('/hello');
    }

}

?>