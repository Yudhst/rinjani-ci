<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class category extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin/categoryModel');            
        }
        
    
        public function index()
        {
            $data['title'] = 'Rinjani Admin Panel | Category';
            $data['kumpulanKategori'] = $this->categoryModel->getCategories();
            
            $this->load->view('template/headerAdmin',$data);
            $this->load->view('template/sidebarAdmin');
            $this->load->view('admin/category/index');
            $this->load->view('template/footerAdmin');
        }

        public function add()
        {
            $data['title'] = 'Rinjani Admin Panel | Add Category';

            $this->form_validation->set_rules('varName', 'Name', 'required');

            if ($this->form_validation->run() == FALSE) {    
                $this->load->view('template/headerAdmin',$data);
                $this->load->view('template/sidebarAdmin');
                $this->load->view('admin/category/add');
                $this->load->view('template/footerAdmin');
            } else {
                $this->categoryModel->storeCategory();
                $this->session->set_flashdata('add', 'New Category added');
                redirect('admin/category');
            }
        }

        public function edit($id)
        {
            $data['title'] = 'Rinjani Admin Panel | Edit Category';
            $data['category'] = $this->categoryModel->showCategory($id);

            $this->form_validation->set_rules('varName', 'Name', 'required');

            if ($this->form_validation->run() == FALSE) {    
                $this->load->view('template/headerAdmin',$data);
                $this->load->view('template/sidebarAdmin');
                $this->load->view('admin/category/edit');
                $this->load->view('template/footerAdmin');
            } else {
                $this->categoryModel->editCategory($id);
                $this->session->set_flashdata('add', 'Category edited');
                redirect('admin/category');
            }
        }

        public function show($id)
        {
            $data['title'] = 'Rinjani Admin Panel | Edit Category';
            $data['mahasiswa'] = $this->categoryModel->showCategory($id);

            $this->load->view('template/headerAdmin',$data);
            $this->load->view('template/sidebarAdmin');
            $this->load->view('admin/category/show');
            $this->load->view('template/footerAdmin');
        }

        public function destroy($id)
        {
            $this->categoryModel->destroyCategory($id);
            $this->session->set_flashdata('delete', 'Category deleted');
            redirect('admin/category');  
        }
    
    }
    
    /* End of file category.php */
    
?>