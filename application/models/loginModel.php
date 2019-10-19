<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class loginModel extends CI_Model {
    
        public function auth($uname, $pass)
        {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('username',$uname);
            $this->db->where('password',$pass);
            $this->db->where('status', 'active');
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                return false;
            } else {
                return $query->result();
            }
        }
    
    }
    
    /* End of file loginModel.php */
    