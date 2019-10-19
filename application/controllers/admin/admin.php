<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class admin extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin/adminModel');
            
        }
        
    
        public function index()
        {
            $data['title'] = 'Rinjani Admin Panel | Dashboard';
            $data['jmlUser'] = $this->adminModel->countUser();
            $data['jmlProduk'] = $this->adminModel->countProduct();
            $data['jmlKategori'] = $this->adminModel->countCategories();
            $data['jmlTransaksi'] = $this->adminModel->countTransaction();
            $this->load->view('template/headerAdmin',$data);
            $this->load->view('template/sidebarAdmin');
            $this->load->view('admin/index');
            $this->load->view('template/footerAdmin');
        }
    
    }
    
    /* End of file admin.php */
    
?>