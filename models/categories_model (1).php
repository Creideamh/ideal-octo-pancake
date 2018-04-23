<?php  

        public function cTable(){
            $this->db->select('*');
            $this->db->from('categories');
            $query = $this->db->get();
            return $query->result_array();
        }



        