<?php 
class UserModel extends CI_Model {

    // get list data
    function getList($limit, $start) {
        $this->db->limit($limit, $start);
        return $this->db->get('users')->result_array();
    }


    public function getCount() {
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

    function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }
}
?>