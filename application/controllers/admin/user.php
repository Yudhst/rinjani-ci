<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class user extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin/userModel');
        }
        
    
        public function index()
        {
            $data['title'] = 'Rinjani Admin Panel | User';
            $data['kumpulanUser'] = $this->userModel->getUsers();

            $this->load->view('template/headerAdmin',$data);
            $this->load->view('template/sidebarAdmin');
            $this->load->view('admin/user/index');
            $this->load->view('template/footerAdmin');
        }

        public function pending()
        {
            $data['title'] = 'Rinjani Admin Panel | User';
            $data['kumpulanUser'] = $this->userModel->getPendingUsers();

            $this->load->view('template/headerAdmin',$data);
            $this->load->view('template/sidebarAdmin');
            $this->load->view('admin/user/indexPending');
            $this->load->view('template/footerAdmin');
        }

        public function activate($id)
        {
            $this->userModel->activateUser($id);
            $this->session->set_flashdata('add', 'User activated');
            redirect('admin/user');
        }

        public function add()
        {
            $data['title'] = 'Rinjani Admin Panel | Add User';

            $this->form_validation->set_rules('varName', 'Name', 'required');
            $this->form_validation->set_rules('varEmail', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('varUsername', 'Username', 'required');
            $this->form_validation->set_rules('varPassword', 'Password', 'required');


            if ($this->form_validation->run() == FALSE) {    
                $this->load->view('template/headerAdmin',$data);
                $this->load->view('template/sidebarAdmin');
                $this->load->view('admin/user/add');
                $this->load->view('template/footerAdmin');
            } else {
                $this->userModel->storeUser();
                $this->session->set_flashdata('add', 'New User added');
                redirect('admin/user');
            }
        }

        public function edit($id)
        {
            $data['title'] = 'Rinjani Admin Panel | Edit User';
            $data['user'] = $this->userModel->showUser($id);

            $this->form_validation->set_rules('varName', 'Name', 'required');
            $this->form_validation->set_rules('varEmail', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('varUsername', 'Username', 'required');
            $this->form_validation->set_rules('varPassword', 'Password', 'required');


            if ($this->form_validation->run() == FALSE) {    
                $this->load->view('template/headerAdmin',$data);
                $this->load->view('template/sidebarAdmin');
                $this->load->view('admin/user/edit');
                $this->load->view('template/footerAdmin');
            } else {
                $this->userModel->editUser($id);
                $this->session->set_flashdata('add', 'User updated');
                redirect('admin/user');
            }
        }

        public function destroy($id)
        {
            $this->userModel->destroyUser($id);
            $this->session->set_flashdata('delete', 'User deleted');
            redirect('admin/user');  
        }
    
    }
    
    /* End of file user.php */
    
?>