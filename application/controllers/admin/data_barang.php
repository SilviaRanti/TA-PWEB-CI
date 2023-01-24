<?php
    class Data_barang extends CI_Controller{
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

        // function tampilan awal di bagian admin untuk barang
        public function index(){
            // Memanggil function tampil data dari model barang yang telah dibuat querynya
            $data['barang']=$this->model_barang->tampil_data()->result();

            // Memanggil view dari template yang telah disediakan
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/data_barang',$data);
            $this->load->view('templates_admin/footer');
        }

        // function untuk menambahkan barang ke dalam database 
        public function tambah_aksi(){
            // mengambil data yang dikirimkan dari form view yang telah di inputkan kedalam sebuah variabel
            $nama_brg       = $this->input->post('nama_brg');
            $keterangan       = $this->input->post('keterangan');
            $kategori       = $this->input->post('kategori');
            $harga       = $this->input->post('harga');
            $stok       = $this->input->post('stok');
            $gbr_brg       = $_FILES['gambar_brg']['name'];

            if($gbr_brg=''){}else{
                $config['upload_path']='./uploads/';
                $config['allowed_types']='jpg|jpeg|png|gif';

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('gambar_brg')){
                   $gbr_brg='image.jpg';
                }else{
                    $gbr_brg=$this->upload->data('file_name');
                }

            }

            // Menyimpan variabel yang telah di terima dari view untuk dimasukan kedalam array
            $data=array(
                'nama_brg'          =>$nama_brg,
                'keterangan'          =>$keterangan,
                'kategori'          =>$kategori,
                'harga'          =>$harga,
                'stok'          =>$stok,
                'gambar'          =>$gbr_brg,
            );
            // exsekusi query dari model barang ke dalam database 
            $this->model_barang->tambah_barang($data,'tb_barang');
           
            // return ke index barang
            redirect('admin/data_barang/index');
        }


        // Funtion untuk menampilkan barang yang akan di edit ke dalam form view barang,
        public function edit($id){
            // menyimpan id barang yang dikirimkan dari function update kedalam sebuah variabel
            $where = array('id_brg'=>$id);
            // eksekusi mencari data yang sesuai denganid yang telah di inputkan
            $data['barang']=$this->model_barang->edit_barang($where,'tb_barang')->result();

            // Memanggil view dari edit barang dan kawan-kawan
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/edit_barang',$data);
            $this->load->view('templates_admin/footer');
        }

        // Function untu kupdate barang 
        public function update(){
            // menyimpan inputand data dari form ke dalam id variabel 
            $id             =$this->input->post('idbrg');
            $nama_brg             =$this->input->post('nama_brg');
            $keterangan             =$this->input->post('keterangan');
            $kategori             =$this->input->post('kategori');
            $harga             =$this->input->post('harga');
            $stok             =$this->input->post('stok');
            $gbr_brgskrg             =$this->input->post('fotoskr');
            $gbr_brg             =$_FILES['gambar_brg'];
    
            if($gbr_brg=''){}else{
                $config['upload_path']='./uploads/';
                $config['allowed_types']='jpg|jpeg|png|gif';

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('gambar_brg')){
                   $gbr_brg=$gbr_brgskrg;
                }else{
                    $gbr_brg=$this->upload->data('file_name');
                }

            }

            // Menyimpan variabel ke dalam array
            $data=array(
                'nama_brg'          =>$nama_brg,
                'keterangan'          =>$keterangan,
                'kategori'          =>$kategori,
                'harga'          =>$harga,
                'stok'          =>$stok,
                'gambar'          =>$gbr_brg,
            );
            $where=array(
                'id_brg' =>$id,
            );

            // eksekusi query untuk update melalui model yang telah di buat
            $this->model_barang->update_data($where,$data,'tb_barang');
            redirect('admin/data_barang/index');
        }

        // Hapus data
        public function hapus($id){
            // menyimpan id kedalam varible
            $where=array('id_brg'=>$id);
            // Eksekusi query hapus melalui model yang telah di buat
            $this->model_barang->hapus_data($where,'tb_barang');
            redirect('admin/data_barang/index');
        }

        // Detail barang
        public function detail($id){
            // meload model barang
            $this->load->model('model_barang');
            /// meyimpan id kedalam variabel 
            $detilnya=$this->model_barang->detil_barang($id);
            // menyumpan variabel ke dalam array untuk dikirimkan ke view detail_barang
            $data['detil']=$detilnya;

            // Load view
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/detil_barang',$data);
            $this->load->view('templates_admin/footer');
        }

        // funcion search 
        public function cari(){
            // Menyimpan kata kunci dari view kedalam variabel
            $key=$this->input->post('katakunci');

            // Dilanjutkan penyimpanan ke dalam aray untuk dikirimkan ke view data_barang
            $data['barang']=$this->model_barang->get_key($key);

            // Load view
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/data_barang',$data);
            $this->load->view('templates_admin/footer');
        
        }
    }
?>