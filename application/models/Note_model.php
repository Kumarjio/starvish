<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Note_model extends CI_Model
{
    public function notelisting()
    {
      if($res=$this->db->get('note_master'))
      {
        return $res->result();
      }
      else {
        return false;
        }
    }

    //function to add vendor into vendor_master table
    public function add_note($datas)
    {
      $this->db->trans_start();
      $n_id =$this->db->insert('note_master',$datas);
      $vend_id = $this->db->insert_id();
      $this->db->trans_complete();
      return $n_id;
    }

    //function to fetch details from vendor table
    public function fetch_note($id)
    {
      $this->db->select('*');
      $this->db->from('note_master');
      $this->db->where('id',$id);
      if($res=$this->db->get())
        return $res->result();
      else {
        return false;
      }
    }
    //function to edit vendor
    public function update_note($id,$datas)
    {
      $this->db->where('id',$id);
      $res=$this->db->update('note_master',$datas);
      if($res)
        return TRUE;
    }

    //function to delete_vendor
    public function delete_note($id)
    {
      $this->db->delete('note_master',array('id'=>$id));
      return $this->db->affected_rows();
    }

    //function to list the users based on the search result

    public function note_listing($searchText)
    {
    $this->db->select('*');
    $this->db->from('note_master');
    if(!empty($searchText)) {
        $likeCriteria = "(id  LIKE '%".$searchText."%'
                          OR  description  LIKE '%".$searchText."%')";
        $this->db->where($likeCriteria);
    }
    if($query = $this->db->get())
          return $query->result();
    else
        return false;
    }

}
