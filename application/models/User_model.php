<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }
   public function insert($object)
   {
      return $this->db->insert('crud', $object);
   }
   public function get()
   {
      $query = $this->db->get('crud')->result_array();
      return $query;
   }
   public function delet_entry($id)
   {
      return $this->db->delete('crud', array('id' => $id));
   }
   public function edit_entry($edit_id)
   {
      $this->db->select('*');
      $this->db->from('crud');
      $this->db->where('id', $edit_id);
      $query = $this->db->get();
      return $query->row();
   }

   public function update_entry($object, $id)
   {
      $this->db->where('id', $id);
      $this->db->update('crud', $object);
      // return $this->db->update('crud', $object, array('id' => $object['id']));
   }
}
