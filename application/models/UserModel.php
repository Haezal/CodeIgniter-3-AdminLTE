<?php
class UserModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserList() {

        return $this->db->get('users')->result_array();

    }

    public function getUser($id) {
        $this->db->where('id', $id);
        return $this->db->get('users')->row_array();
    }
}