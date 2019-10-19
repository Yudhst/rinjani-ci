<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class transModel extends CI_Model {

        public function getIdTransaction()
        {
            $this->db->where('id_user', $this->session->userdata('id_user'));
            $this->db->order_by('id_trans', 'desc');
            $this->db->limit(1);
            return $this->db->get('transactions')->result();
        }

        public function getCart()
        {
            return $this->db->get_where('cart', array('id_user' => $this->session->userdata('id_user')))->result();
        }

        public function insertTransDetail()
        {
            $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'status' => 1,
            );

            $this->db->insert('transactions', $data);

            foreach ($this->getIdTransaction() as $s) {
                $id_trans = $s->id_trans;
            }
            
            $id_user = $this->session->userdata('id_user');

            foreach ($this->getCart() as $c) {
                $id_products = $c->id_products;
                $qty = $c->qty;

                foreach ($this->db->get_where('products', array('id_products' => $id_products))->result() as $p) {
                    $price = $p->price;
                }

                $data = array(
                    'id_trans' => $id_trans,
                    'id_products' => $id_products,
                    'price' => $price,
                    'qty' => $qty,
                    'subtotal' => $price * $qty,
                );
    
                $this->db->insert('transactions_detail', $data);

                $queryStock = 'update products set stock = stock - '.$qty.' where id_products = '.$id_products;
                $this->db->query($queryStock);
            }
            // echo $id_trans;die();
            $this->setGrandTotal($id_trans);
            $this->delCart($id_user);
        }

        public function setGrandTotal($id_trans)
        {
            $this->db->select('*, SUM(subtotal) as grandtotal');
            $this->db->where('id_trans', $id_trans);
            $this->db->group_by('id_trans');
            $this->db->order_by('id_trans', 'desc');
            $this->db->limit(1);
            $grandtotal = $this->db->get('transactions_detail')->result();
            // echo $grandtotal->grandtotal;die();   
            // die();

            foreach ($grandtotal as $g) {
               echo $grandtotal2 = $g->grandtotal;
            }

            $this->db->set('grandtotal', $grandtotal2);
            $this->db->where('id_trans', $id_trans);
            $this->db->update('transactions');
        }

        public function delCart($id_user)
        {
            $this->db->where('id_user', $id_user);
            $this->db->delete('cart');
        }

        public function getUserTrans()
        {
            return $this->db->get_where('transactions', array('id_user' => $this->session->userdata('id_user')))->result();
        }

        public function uploadReceipt($upload)
        {
            foreach ($this->getIdTransaction() as $s) {
                $id_trans = $s->id_trans;
            }

            $this->db->set(array(
                'receipt' =>$upload['file']['file_name'],
                'status' => '2',
            ));
            $this->db->where('id_trans', $id_trans);
            $this->db->update('transactions');

            foreach ($this->getIdTransaction() as $s) {
                $id_trans = $s->id_trans;
            }
            
            $data = array(
                'id_trans' => $id_trans,
                'fullname' => $this->input->post('fullname'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
            );

            $this->db->insert('shipment', $data);
        }

        public function upload()
        {
            $config['upload_path'] = './uploads/receipt/';    
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('receipt')){
                $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
                return $return;
            }else{    
                $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());      return $return;   
            }  
        }
    
    }
    
    /* End of file transModel.php */
    