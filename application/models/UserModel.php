<?php 
class UserModel extends CI_Model {

    // get list data
    function getList($limit, $start) {

        $this->db->limit($limit, $start); // set limit and offset
        return $this->db->get('users')->result_array();
    }

    public function getCount() {
        // select count(*) from users
        return $this->db->count_all('users');
    }

    // insert data
    function insert($data) {
        /**
         * insert into users () values ()
         */
        $this->db->insert('users', $data);
    }

    // get data by ID
    function getData($id) {
        $this->db->where('id', $id);
        return $this->db->get('users')->row_array();
    }

    function authenticateUser($email, $password) {
        // select * From users where email = $email and password = $password
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        return $this->db->get('users')->row_array();
    }

    function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    function getUserWithStaff() {
        $this->db->select('users.id as user_id, staff.id as staff_id, users.name as name, staff.name as staff_name, staff.position as staff_position');
        $this->db->join('staff', 'users.id = staff.user_id', 'LEFT');
        return $this->db->get('users')->result_array();
    }
}
?>