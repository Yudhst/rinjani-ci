<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class categoryModel extends CI_Model {
    
        public function getCategories()
        {
            return $this->db->get('categories')->result();
        }

        public function showCategory($id)
        {
            return $this->db->get_where('categories', array('id_categories' => $id))->result();           
        }

        public function storeCategory()
        {
            $data = array(
                "name" => $this->input->post('varName',true)
            );
            $this->db->insert('categories', $data);
        }

        public function editCategory($id)
        {
            $data = array(
                "name" => $this->input->post('varName',true)
            );
            $this->db->where('id_categories', $id);
            $this->db->update('categories', $data);
        }

        public function destroyCategory($id)
        {
            $this->db->where('id_categories', $id);
            $this->db->delete('categories');
        }
    
    }
    
    /* End of file categoryModel.php */
    
?>