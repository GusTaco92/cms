<?php
class Google_login_model extends CI_Model
{
    function Is_already_register($id,$email)
    {
        // $this->db->where('login_oauth_uid', $id);
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        
        return $query;
        // return ($query->num_rows() > 0) ? true : false;

        // if($query->num_rows() > 0)
        // {
        //     return true;
        // }
        // else
        // {
        //     return false;
        // }
    }

    function Update_user_data($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    function Insert_user_data($data)
    {
        $this->db->insert('users', $data);
    }
}
?>