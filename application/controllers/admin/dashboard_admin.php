<?php
    class Dashboard_admin extends CI_Controller {
        public function __construct(){
            parent::__construct();
            // Konfigurasi sesion 
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

        // Membuat tampilan awal pada menu admin 
        public function index() {
            // menyimpan data jumlah kategori yang di dapat dari model barang yang telah dibuat 
            $a['a']=$this->model_barang->pie();
            $b['b']=$this->model_barang->keripik();
            $c['c']=$this->model_barang->bakso_kemasan();
            $d['d']=$this->model_barang->sambal();
            $e['e']=$this->model_barang->tanpa_kategori();

            // menampilkan template admin yang telah di buat kemenu home controler dasboard admin
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/dashboard',$a+$b+$c+$d+$e);
            $this->load->view('templates_admin/footer');
        }
     
     
    }

?>