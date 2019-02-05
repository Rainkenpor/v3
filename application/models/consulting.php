<?php 
class Consulting_model extends CI_Model {

  private $table = 'consult_enca';


  public function save_record($id,$data)
  {
     if ($id > 0) {
      $this->db->insert($this->table,$data);
    }
    else {
      $this->db->update($this->table,$data,'id=' . $id);
    }
  }
} 
?>