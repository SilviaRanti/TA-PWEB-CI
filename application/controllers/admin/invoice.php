<?php
    class Invoice extends CI_Controller{
        public function __construct(){
            parent::__construct();
            if($this->session->userdata('role_id')!='1'){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda Belum login !</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');

              redirect('auth/login');
            }
        }

        // Invoice 
        public function index(){
            // Menyimpan data tabel yang ditampilkan ke dalam array untuk dikirimkan ke view admin/invoice
            $data['invoice']=$this->model_invoice->tampil_data();

            // Meload view
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/invoice',$data);
            $this->load->view('templates_admin/footer');
        }

        // Detail invoice
        public function detail($id_invoice){
            // Menyimpan data id invoice ke dalam array untuk dikirimkan ke view detail_invoice
            $data['invoi']=$this->model_invoice->ambil_id_invoice($id_invoice);
            $data['pesanan']=$this->model_invoice->ambil_id_pesanan($id_invoice);

            // Load view
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/detail_invoice',$data);
            $this->load->view('templates_admin/footer');
        }
    }
?>