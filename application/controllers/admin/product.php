<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class product extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin/productModel');          
            $this->load->model('admin/categoryModel');     
        }
        
    
        public function index()
        {
            $data['title'] = 'Rinjani Admin Panel | Products';
            $data['kumpulanProduk'] = $this->productModel->getProducts();

            $this->load->view('template/headerAdmin',$data);
            $this->load->view('template/sidebarAdmin');
            $this->load->view('admin/product/index');
            $this->load->view('template/footerAdmin');
        }

        public function show($id)
        {
            $data['title'] = 'Rinjani Admin Panel | Detail Product';
            $data['produk'] = $this->productModel->getOneProduct($id);

            $this->load->view('template/headerAdmin',$data);
            $this->load->view('template/sidebarAdmin');
            $this->load->view('admin/product/show');
            $this->load->view('template/footerAdmin');
        }

        public function add()
        {
            $data['title'] = 'Rinjani Admin Panel | Add Product';
            $data['kumpulanKategori'] = $this->categoryModel->getCategories();

            $this->form_validation->set_rules('varName', 'Name', 'required');
            $this->form_validation->set_rules('varCat', 'Category', 'required');
            $this->form_validation->set_rules('varPrice', 'Price', 'required|numeric');
            $this->form_validation->set_rules('varStock', 'Stock', 'required|numeric');
            $this->form_validation->set_rules('varDesc', 'Description', 'required');
                     

            if ($this->form_validation->run() == FALSE) {    
                $this->load->view('template/headerAdmin',$data);
                $this->load->view('template/sidebarAdmin');
                $this->load->view('admin/product/add');
                $this->load->view('template/footerAdmin');
            } else {
                $upload = $this->productModel->upload();
                if ($upload['result'] == 'success') {
                    $this->productModel->storeProduct($upload);
                    $this->session->set_flashdata('add', 'New Product added');
                    redirect('admin/product');
                }else{
                    echo $upload['error'];
                }
                
            }
        }

        public function edit($id)
        {
            $data['title'] = 'Rinjani Admin Panel | Edit Product';
            $data['kumpulanKategori'] = $this->categoryModel->getCategories();
            $data['produk'] = $this->productModel->getOneProduct($id);

            $this->form_validation->set_rules('varName', 'Name', 'required');
            $this->form_validation->set_rules('varCat', 'Category', 'required');
            $this->form_validation->set_rules('varPrice', 'Price', 'required|numeric');
            $this->form_validation->set_rules('varStock', 'Stock', 'required|numeric');
            $this->form_validation->set_rules('varDesc', 'Description', 'required');
                     

            if ($this->form_validation->run() == FALSE) {    
                $this->load->view('template/headerAdmin',$data);
                $this->load->view('template/sidebarAdmin');
                $this->load->view('admin/product/edit');
                $this->load->view('template/footerAdmin');
            } else {
                $upload = $this->productModel->upload();
                if ($upload['result'] == 'success') {
                    $this->productModel->editProduct($upload, $id);
                    $this->session->set_flashdata('add', 'Product edited');
                    redirect('admin/product');
                }else{
                    echo $upload['error'];
                }
            }
        }

        public function destroy($id)
        {
            $this->productModel->destroyProduct($id);
            $this->session->set_flashdata('delete', 'Product deleted');
            redirect('admin/product'); 
        }
    
    }
    
    /* End of file product.php */
    