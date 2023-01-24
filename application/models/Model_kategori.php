<?php
    class Model_kategori extends CI_Model{
        // Mencari data kategori pie
        public function data_pie(){
            return $this->db->get_where('tb_barang',array('kategori'=>'Pie'));
        }

        // Mencari data kategori Kweipik
        public function data_keripik(){
            return $this->db->get_where('tb_barang',array('kategori'=>'keripik'));
        }

        // Mencari data kategori bakso kemasan
        public function data_bakso_kemasan(){
            return $this->db->get_where('tb_barang',array('kategori'=>'Bakso Kemasan'));
        }

        // Mencari data kategori  sambal
        public function data_sambal(){
            return $this->db->get_where('tb_barang',array('kategori'=>'Sambal'));
        }

        // Mencari data tanpa kategori kategori 
        public function data_tanpa_kategori(){
            return $this->db->get_where('tb_barang',array('kategori'=>'Tanpa Kategori'));
        }
    }
?>