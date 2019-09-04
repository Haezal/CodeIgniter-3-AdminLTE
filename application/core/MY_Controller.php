<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class MY_Controller extends CI_Controller {
	
	// declare property 
	public $content_view;
	public $_title;
	public $_subTitle;
	

	function __construct(){
        parent::__construct();

        // load libraries
        // $this->load->library('url');

        define('CONTROLLER', $this->uri->rsegment(1));
        define('METHOD', $this->uri->rsegment(2));

        if (file_exists(dirname(APPPATH).'/application/views/'.CONTROLLER.'/'.METHOD.'.php')) 
        {
        	$this->content_view = CONTROLLER.'/'.METHOD;
        } 
        else
        {
//        	show_error('View file not found. Please create application/views/'.CONTROLLER.'/'.METHOD.'.php',404);
        }

    } // end function 

    // load render page
    public function _render_page($data = [])
    {
    	$this->load->view('layouts/main', $data);
    }
} // end class