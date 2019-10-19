<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class homeModel extends CI_Model {
    
        public function getBestSellers()
        {
            $this->db->select('transactions_detail.id_products, sum(transactions_detail.qty) as jml, products.*');
            $this->db->join('products', 'transactions_detail.id_products = products.id_products');
            $this->db->group_by('transactions_detail.id_products');
            return $this->db->get('transactions_detail')->result();
        }

        
        public function getUserCart()
        {
            $this->db->select('users.*, products.*, qty');
            $this->db->join('users', 'cart.id_user = users.id_user');
            $this->db->join('products', 'cart.id_products = products.id_products');
            $this->db->where('cart.id_user', $this->session->userdata('id_user'));    
            return $this->db->get('cart')->result(); 
        }

        public function addToCart()
        {
            $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'id_products' => $this->input->post('idProduct'),
                'qty' => 1
            );

            $cek = $this->db->get_where('cart', array('id_user' => $data['id_user'], 'id_products' => $data['id_products']));
            
            if ($cek->num_rows() > 0) {
                $this->db->set('qty', 'qty+1', FALSE);
                $this->db->where(array('id_user' => $data['id_user'], 'id_products' => $data['id_products']));
                $this->db->update('cart');
                
            } else {
                $this->db->insert('cart', $data);
            }
        }

        public function plusQuantity()
        {
            $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'id_products' => $this->input->post('idProduct'),
            );

            $this->db->set('qty', 'qty+1', FALSE);
            $this->db->where(array('id_user' => $data['id_user'], 'id_products' => $data['id_products']));
            $this->db->update('cart');
        }

        public function minusQuantity()
        {
            $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'id_products' => $this->input->post('idProduct'),
            );

            $this->db->set('qty', 'qty-1', FALSE);
            $this->db->where(array('id_user' => $data['id_user'], 'id_products' => $data['id_products']));
            $this->db->update('cart');
        }

        public function delProduct()
        {
            $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'id_products' => $this->input->post('idProduct'),
            );

            $this->db->where(array('id_user' => $data['id_user'], 'id_products' => $data['id_products']));
            $this->db->delete('cart');
        }    
    }
    
    /* End of file home.php */
    