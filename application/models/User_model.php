<?php
class User_model extends CI_model
{
    // public function get_user($id_user)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_user');
    //     $this->db->where('id_user',$id_user);
    //     return $this->db->get()->row_array();
    // }

    public function cek_login($where)
    {
        return $this->db->get_where('tbl_user', $where);
    }
}
?>