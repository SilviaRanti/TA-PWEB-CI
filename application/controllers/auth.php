<?php
    class Auth extends CI_Controller {

        // login function
        public function login(){
            // memvalidasikan form username yang telah diisi dengan format tertentu
            $this->form_validation->set_rules('username','Username','required',['required'=>'Username wajib diisi !']);
            // memvalidasikan form password yang telah diisi dengan format tertentu
            $this->form_validation->set_rules('password','Password','required',['required'=>'Password wajib diisi !']);

            // kondisi jika form farvalidation di jalankan 
            if($this->form_validation->run() == FALSE){
                $this->load->view('templates/header');
                $this->load->view('form_login');
                $this->load->view('templates/footer');
            }
            
            // Jika form variabel tidak di jalankan 
            else{
                // Memanggil model cek_login dan disimpan ke dalam variable auth
                $auth=$this->model_auth->cek_login();
                // Jika kondisi auth false
                if($auth==FALSE){
                    // Mengirimkan flash data berisi pesan ke dalam auth/login
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Username atau Password anda Salah !</strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                  // Redirect auth login
                  redirect('auth/login');
                  
                }
                // jika auth benar
                else{
                    // memanggil sesiion untuk username dan role yang idmasukan
                    $this->session->set_userdata('username',$auth->username);
                    $this->session->set_userdata('role_id',$auth->role_id);

                    // membuat switch case kondisi role
                    switch($auth->role_id){
                        // Jika role yang masuk adalah 1 maka akan di arahkan ke view admin
                        case 1:
                            redirect('admin/dashboard_admin');
                        break;

                        // Jika role yang masuk adalah 1 maka akan di arahkan ke view welcome
                        case 2:
                            redirect('welcome');
                        break;
                        default:
                    break;
                    }
                }
            }
        }

        // Logout untuk admin
        public function logout() {
            // logout untuk user yang sudah login
            $this->session->sess_destroy();
            redirect('auth/login');
        }

        // Logout user
        public function logout_user() {
            $this->session->sess_destroy();
            redirect('welcome');
        }
    }
?>