<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class userModel extends CI_Model {
    
        public function getUsers()
        {
            return $this->db->get_where('users',array('status' => 'active'))->result();
        }

        public function showUser($id)
        {
            return $this->db->get_where('users', array('id_user' => $id))->result();
        }

        public function getPendingUsers()
        {
            return $this->db->get_where('users',array('status' => 'inactive'))->result();
        }

        public function activateUser($id)
        {
            $this->db->where('id_user', $id);
            $this->db->update('users', array('status' => 'active'));
        }

        public function storeUser()
        {
            $data = array(
                'fullname' => $this->input->post('varName',true),
                'email' => $this->input->post('varEmail',true),
                'username' => $this->input->post('varUsername',true),
                'password' => md5($this->input->post('varPassword',true)),
                'role' => $this->input->post('varRole'),
                'status' => $this->input->post('varStatus'),
            );
            $this->db->insert('users', $data);
        }

        public function registerUser()
        {
            $data = array(
                'fullname' => $this->input->post('varName',true),
                'email' => $this->input->post('varEmail',true),
                'username' => $this->input->post('varUsername',true),
                'password' => md5($this->input->post('varPassword',true)),
                'role' => 'user',
                'status' => 'inactive',
            );
            $this->db->insert('users', $data);
        }

        public function editUser($id)
        {
            $data = array(
                'fullname' => $this->input->post('varName',true),
                'email' => $this->input->post('varEmail',true),
                'username' => $this->input->post('varUsername',true),
                'password' => md5($this->input->post('varPassword',true)),
                'role' => $this->input->post('varRole',true)
            );

            $this->db->where('id_user', $id);
            $this->db->update('users', $data);
        }

        public function destroyUser($id)
        {
            $this->db->where('id_user', $id);
            $this->db->delete('users');
        }
    
    }
    
    /* End of file userModel.php */
    
?>