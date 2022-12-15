<?php
    class Model_barang extends CI_Model {
        // sql tampil data 
    public function tampil_data(){
        return $this->db->get('tb_barang');
        
    }

    // model untuk menambahkan kedalam tabel barang 
    public function tambah_barang($data,$table){
        $this->db->insert($table,$data);
    }

    // Model untuk mengedit barang 
    public function edit_barang($where,$table){
        return $this->db->get_where($table,$where);
    }

    // Model untuk update barang dengan menerima id array yang di kirim dan nama tabel di database 
   public function update_data($where,$data,$table){
       $this->db->where($where);
       $this->db->update($table,$data);
   }

//    Model untuk menhapus barang 
   public function hapus_data($where,$tb_barang){
       $this->db->where($where);
       $this->db->delete($tb_barang);
   }

    // model sql untuk mlihat detail barang yang di pilih dengan menerima parameter id 
   public function detil_barang($id=NULL){
        $query = $this->db->get_where('tb_barang',array('id_brg'=>$id))->row();
        return $query;
   }

//    Model untukk mencari barang yang sesuai dengan id 
   public function find($id){
       $result=$this->db->where('id_brg',$id)
       ->limit(1)
       ->get('tb_barang');

       if($result->num_rows()>0){
           return $result->row();
       }else{
           return array();
       }
   }

    // model sql untuk mlihat detail barang yang di pilih dengan menerima parameter id 
   public function detail_brg($id_brg){
       $result=$this->db->where('id_brg',$id_brg)->get('tb_barang');
       if($result->num_rows()>0){
           return $result->result();
       }else{
           return false;
       }

   }

//    Mendapatkan data kategori pie yang terdapat di database
   public function pie(){
    return $this->db->where('kategori','Pie')->from("tb_barang")->count_all_results();
   }

//    Mendapatkan data kategori keripik yang terdapat di database
   public function keripik(){
       
    //    $query=$this->db->query('SELECT * from tb_barang where kategori="keripik"');
    //    echo $query->num_rows();
       
      //return $this->db->count_all("tb_barang");
      return $this->db->where('kategori','keripik')->from("tb_barang")->count_all_results();
   }

   // Mendapatkan total bakso kemasan yang ada didalam database
   public function bakso_kemasan(){
    return $this->db->where('kategori','Bakso Kemasan')->from("tb_barang")->count_all_results();
   }

   // Mendapatkan total sambal yang ada didalam database
   public function sambal(){
    return $this->db->where('kategori','Sambal')->from("tb_barang")->count_all_results();
   }

   // Mendapatkan total tanpa_kategori yang ada didalam database
   public function tanpa_kategori(){
    return $this->db->where('kategori','Tanpa Kategori')->from("tb_barang")->count_all_results();
   }

   // function cari barang sesuai key
   public function get_key($key){
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->like('nama_brg',$key);
        $this->db->or_like('keterangan',$key);
        return $this->db->get()->result();
        
   }
}
?>