<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class home extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('user/homeModel');
            $this->load->model('user/transModel');
            $this->load->model('admin/productModel');
            $this->load->model('admin/categoryModel');
            $this->load->model('admin/userModel');
        }
        
    
        public function index()
        {
            $data['title'] = 'Rinjani Outdoor Shop | Dashboard';
            $data['bestSeller'] = $this->homeModel->getBestSellers();

            $this->load->view('user/template/header', $data);
            $this->load->view('user/template/navbarLogin');
            $this->load->view('user/loggedin/index');
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
            $this->load->view('user/template/navbarLogin');
            $this->load->view('user/loggedin/catalogue');
            $this->load->view('user/template/footer');
        }

        public function detail($id)
        {
            $data = array(
                'title' => 'Rinjani Outdoor Shop | Detail Products',
                'produk' => $this->productModel->getOneProduct($id),
            );

            $this->load->view('user/template/header', $data);
            $this->load->view('user/template/navbarLogin');
            $this->load->view('user/loggedin/show');
            $this->load->view('user/template/footer');
        }

        public function cart()
        {
            $data = array(
                'title' => 'Rinjani Outdoor Shop | My Cart',
                'keranjang' => $this->homeModel->getUserCart(),
            );

            $this->load->view('user/template/header', $data);
            $this->load->view('user/template/navbarLogin');
            $this->load->view('user/loggedin/cart');
            $this->load->view('user/template/footer');
        }

        public function addToCart()
        {
            $this->homeModel->addToCart();
            redirect('user/home/catalogue');
        }

        public function plusQuantity()
        {
            $this->homeModel->plusQuantity();
            redirect('user/home/cart');
        }

        public function minusQuantity()
        {
            $this->homeModel->minusQuantity();
            redirect('user/home/cart');
        }

        public function delProduct()
        {
            $this->homeModel->delProduct();
            redirect('user/home/cart');
        }

        public function confirm()
        {
            $this->transModel->insertTransDetail();
            redirect('user/home/mytrans');
        }

        public function mytrans()
        {
            $data = array(
                'title' => 'Rinjani Outdoor Shop | My Transactions',
                'kumpulanTransaksi' => $this->transModel->getUserTrans(),
                'user' => $this->userModel->showUser($this->session->userdata('id_user')),
            );

            $this->load->view('user/template/header', $data);
            $this->load->view('user/template/navbarLogin');
            $this->load->view('user/loggedin/mytrans');
            $this->load->view('user/template/footer');
        }

        public function receipt()
        {
            $data = array(
                'title' => 'Rinjani Outdoor Shop | Confirm Transaction',
            );
            
            $this->load->view('user/template/header', $data);
            $this->load->view('user/template/navbarLogin');
            $this->load->view('user/loggedin/receipt');
            $this->load->view('user/template/footer');
        }

        public function pay()
        {
            $cek = $this->transModel->upload();
            if ($cek['result'] == 'success') {
                $this->transModel->uploadReceipt($cek);
                redirect('user/home/mytrans');
            }else{
                echo $cek['error'];
            }
        }
    }
    
    /* End of file index.php */
    