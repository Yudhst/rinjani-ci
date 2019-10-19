<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class productModel extends CI_Model {
    
        public function getProducts()
        {
            $this->db->select('products.*, categories.name as kat');
            $this->db->join('categories', 'products.id_categories = categories.id_categories');
            return $this->db->get('products')->result();           
        }

        public function getOneProduct($id)
        {
            $this->db->select('products.*, categories.name as kat, categories.id_categories as idc');
            $this->db->join('categories', 'products.id_categories = categories.id_categories');
            $this->db->where('id_products', $id);
            return $this->db->get('products')->result();
        }

        public function showProduct($id)
        {
            return $this->db->get_where('products',array('id_products' => $id))->row();
        }

        public function getProductsByCategory($id)
        {
            $this->db->select('products.*, categories.name as nm');
            $this->db->join('categories', 'products.id_categories = categories.id_categories');
            return $this->db->get_where('products', array('products.id_categories' => $id))->result();
        }

        public function getProductsByName($name)
        {
            $this->db->like('name', $name);
            return $this->db->get('products')->result();
        }

        public function storeProduct($upload)
        {
            $data = array(
                'id_categories' => $this->input->post('varCat',true),
                'name' => $this->input->post('varName', true),
                'price' => $this->input->post('varPrice', true),
                'stock' => $this->input->post('varStock', true),
                'description' => $this->input->post('varDesc', true),
                'img' => $upload['file']['file_name'],
            );

            $this->db->insert('products', $data);
        }

        public function editProduct($upload,$id)
        {
            $data = array(
                'id_categories' => $this->input->post('varCat',true),
                'name' => $this->input->post('varName', true),
                'price' => $this->input->post('varPrice', true),
                'stock' => $this->input->post('varStock', true),
                'description' => $this->input->post('varDesc', true),
                'img' => $upload['file']['file_name'],
            );

            $this->db->where('id_products', $id);
            $this->db->update('products', $data);
        }

        public function destroyProduct($id)
        {
            $this->_deleteImage($id);
            $this->db->where('id_products', $id);
            $this->db->delete('products');
        }

        public function upload(){    
            $config['upload_path'] = './uploads/products/';    
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('varImg')){
                $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
                return $return;
            }else{    
                $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());      return $return;   
            }  
        }

        private function _deleteImage($id)
        {
            $product = $this->showProduct($id);
            $filename = $product->img;
            unlink(FCPATH."uploads/products/".$filename);
        }
    
    }
    
    /* End of file productModel.php */
    