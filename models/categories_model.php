<?php  

    class Categories_Model extends CI_Model{

        public function cTable(){
            $this->db->select('*');
            $this->db->from('category');
            $query = $this->db->get();
            return $query->result_array();
        }



    }






?>