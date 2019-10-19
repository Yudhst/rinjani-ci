<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class transactionModel extends CI_Model {
    
        public function getConfirmedTransaction()
        {
            $this->db->select('transactions.*, users.username as usr');
            $this->db->join('users', 'transactions.id_user = users.id_user');
            $this->db->where('transactions.status', '0');
            return $this->db->get('transactions')->result();      
        }

        public function getWaitingTransaction()
        {
            $this->db->select('transactions.*, users.username as usr');
            $this->db->join('users', 'transactions.id_user = users.id_user');
            $this->db->where('transactions.status', '2');
            return $this->db->get('transactions')->result(); 
        }

        public function showConfirmedTransaction($id)
        {
            $this->db->select('transactions_detail.*, transactions.date, transactions.grandtotal, products.name as prdname');
            $this->db->join('transactions', 'transactions_detail.id_trans = transactions.id_trans');
            $this->db->join('products', 'transactions_detail.id_products = products.id_products');
            $this->db->where('transactions_detail.id_trans', $id);
            return $this->db->get('transactions_detail')->result();
        }

        public function showWaitingTransaction($id)
        {
            $this->db->select('transactions.*, users.*, shipment.*');
            $this->db->join('users', 'transactions.id_user = users.id_user');
            $this->db->join('shipment', 'shipment.id_trans = transactions.id_trans');
            $this->db->where('transactions.id_trans', $id);
            $this->db->where('transactions.status', '2');
            return $this->db->get('transactions')->result();
        }

        public function getTransactionUser($id)
        {
            $this->db->select('transactions.*, users.*');
            $this->db->join('users', 'transactions.id_user = users.id_user');
            $this->db->where('id_trans', $id);
            return $this->db->get('transactions')->result();
        }

        public function getShipment($id)
        {
            $this->db->select('transactions.*, shipment.*');
            $this->db->join('transactions', 'transactions.id_trans = shipment.id_trans');
            $this->db->where('shipment.id_trans', $id);
            return $this->db->get('shipment')->result();
        }

        public function confirmOrder($id)
        {
            $this->db->where('id_trans', $id);
            $this->db->update('transactions', array('status' => '0'));
        }
    
    }
    
    /* End of file transactionModel.php */
    