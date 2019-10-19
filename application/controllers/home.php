<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class home extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('user/homeModel');
            $this->load->model('admin/productModel');
            $this->load->model('admin/categoryModel');
        }
        
    
        public function index()
        {
            $data['title'] = 'Rinjani Outdoor Shop | Dashboard';
            $data['bestSeller'] = $this->homeModel->getBestSellers();

            $this->load->view('user/template/header', $data);
            $this->load->view('user/template/navbar');
            $this->load->view('user/home/index');
            $this->load->view('user/template/footer');
        }

        public function catalogue()
        {
            $data['title'] = 'Rinjani Outdoor Shop | Products';
            $data['kumpulanKategori'] = $this->categoryModel->getCategories();
            $data['isFilter'] = false;
            $data['isSearch'] = false;
            $idcat = $this->input->post('comboCat');
            $nameProd = $this->input->post('varSearch');

            if ($idcat) {
                $data['kumpulanProduk'] = $this->productModel->getProductsByCategory($idcat);
                $data['isFilter'] = true;
            }else if($nameProd){
                $data['kumpulanProduk'] = $this->productModel->getProductsByName($nameProd);
                $data['keyword'] = $nameProd;
                $data['isSearch'] = true;
            }else{
                $data['kumpulanProduk'] = $this->productModel->getProducts();
            }

            $this->load->view('user/template/header', $data);
            $this->load->view('user/template/navbar');
            $this->load->view('user/home/catalogue');
            $this->load->view('user/template/footer');
        }

        public function detail($id)
        {
            $data = array(
                'title' => 'Rinjani Outdoor Shop | Detail Products',
                'produk' => $this->productModel->getOneProduct($id),
            );

            $this->load->view('user/template/header', $data);
            $this->load->view('user/template/navbar');
            $this->load->view('user/home/show');
            $this->load->view('user/template/footer');
        }
    }
    
    /* End of file index.php */
    