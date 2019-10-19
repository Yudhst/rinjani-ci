<?php  
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class transaction extends CI_Controller {
        
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin/transactionModel');
        }
        
    
        public function success()
        {
            $data['title'] = 'Rinjani Admin Panel | Success Transaction';
            $data['kumpulanTransaksi'] = $this->transactionModel->getConfirmedTransaction();

            $this->load->view('template/headerAdmin',$data);
            $this->load->view('template/sidebarAdmin');
            $this->load->view('admin/transaction/indexSuccess');
            $this->load->view('template/footerAdmin');
        }

        public function waiting()
        {
            $data['title'] = 'Rinjani Admin Panel | Waiting Transaction';
            $data['kumpulanTransaksi'] = $this->transactionModel->getWaitingTransaction();

            $this->load->view('template/headerAdmin',$data);
            $this->load->view('template/sidebarAdmin');
            $this->load->view('admin/transaction/indexWaiting');
            $this->load->view('template/footerAdmin');
        }

        public function detailSuccess($id)
        {
            $data['title'] = 'Rinjani Admin Panel | Success Transaction Details';
            $data['transaksi'] = $this->transactionModel->showConfirmedTransaction($id);
            $data['user'] = $this->transactionModel->getTransactionUser($id);
            $data['shipment'] = $this->transactionModel->getShipment($id);

            $this->load->view('template/headerAdmin',$data);
            $this->load->view('template/sidebarAdmin');
            $this->load->view('admin/transaction/detailSuccess');
            $this->load->view('template/footerAdmin');
        }

        public function detailWaiting($id)
        {
            $data['title'] = 'Rinjani Admin Panel | Waiting Transaction Details';
            $data['transaksi'] = $this->transactionModel->showWaitingTransaction($id);
            $data['user'] = $this->transactionModel->getTransactionUser($id);
            $data['shipment'] = $this->transactionModel->getShipment($id);

            $this->load->view('template/headerAdmin',$data);
            $this->load->view('template/sidebarAdmin');
            $this->load->view('admin/transaction/detailWaiting');
            $this->load->view('template/footerAdmin');
        }

        public function confirm($id)
        {
            $this->transactionModel->confirmOrder($id);
            redirect('admin/transaction/waiting');
            
        }
    
    }
    
    /* End of file transaction.php */
    