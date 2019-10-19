<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class adminModel extends CI_Model {
    
        public function countUser()
        {
            return $this->db->count_all('users');
        }

        public function countProduct()
        {
            return $this->db->count_all('products');
        }

        public function countCategories()
        {
            return $this->db->count_all('categories');
        }

        public function countTransaction()
        {
            return $this->db->count_all('transactions');
        }
    
    }
    
    /* End of file Admin.php */
    
?>