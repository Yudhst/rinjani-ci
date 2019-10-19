<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class login extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('loginModel');
            $this->load->model('admin/userModel');
        }
        
    
        public function index()
        {
            $data = array(
                'title' => 'Rinjani Outdoor Shop | Login',
            );
            $this->load->view('user/template/header', $data);
            $this->load->view('index');
            $this->load->view('user/template/footer');
        }

        public function register()
        {
            $data = array(
                'title' => 'Rinjani Outdoor Shop | Register',
            );

            $this->form_validation->set_rules('varName', 'Name', 'required');
            $this->form_validation->set_rules('varEmail', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('varUsername', 'Username', 'required');
            $this->form_validation->set_rules('varPassword', 'Password', 'required');


            if ($this->form_validation->run() == FALSE) {    
                $this->load->view('user/template/header',$data);
                $this->load->view('register');
                $this->load->view('user/template/footer');
            } else {
                $this->userModel->registerUser();
                $this->session->set_flashdata('pesan','Please wait for 24 hours to use your account :)');
                redirect('login');
            }
        }

        public function auth()
        {
            $uname = htmlspecialchars($this->input->post('varUsername'));
            $pass = htmlspecialchars(md5($this->input->post('varPassword')));
            
            $cekLogin = $this->loginModel->auth($uname,$pass);

            if ($cekLogin) {
                foreach ($cekLogin as $row) {
                    $this->session->set_userdata('id_user', $row->id_user);
                    $this->session->set_userdata('user', $row->username);
                    $this->session->set_userdata('role', $row->role);
                    
                    if ($this->session->userdata('role') == 'admin') {
                        redirect('admin/admin');
                    } else {
                        redirect('user/home');
                    }
                }
            }else{
                $this->session->set_flashdata('pesan', 'Wrong Username and Password combination.');
                redirect('login');
            }
        }
        
        public function logout(){
            $this->session->sess_destroy();
            redirect('');
        }
    
    }
    
    /* End of file login.php */
    