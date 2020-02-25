<?php 
   class Stud_Model extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
   
      public function insert($data) { 
         if ($this->db->insert("student", $data)) { 
            return true; 
         } 
      } 
   
      public function delete($roll_no) { 
         if ($this->db->delete("student", "roll_no = ".$roll_no)) { 
            return true; 
         } 
      } 
   
      public function update($data,$old_roll_no) { 
         $this->db->set($data); 
         $this->db->where("roll_no", $old_roll_no); 
         $this->db->update("student", $data); 
      } 

      function fetch_data($query)
         {
         $this->db->select("*");
         $this->db->from("student");
         if($query != '')
         {
         $this->db->like('name', $query);
         $this->db->or_like('roll_no', $query);
         }
         return $this->db->get();
         }
   } 
?> 