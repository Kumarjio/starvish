<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Vendor_dc_model extends CI_Model{

  //function to list the vendor
  public function fetch_vendor()
  {
    $res=$this->db->get('vendor_dc');
    return $res->result();
  }

  //function to list the vendor dc
  public function vendordclisting()
  {
    if($res=$this->db->get('vendor_dc'))
    {
      return $res->result();
    }
    else {
      return false;
      }
  }

  //function to add vendor dc into vendor_dc table
  public function add_vendor_dc($datas)
  {
    $this->db->trans_start();
    $c_id =$this->db->insert('vendor_dc',$datas);
    $vend_id = $this->db->insert_id();
    $this->db->trans_complete();
    return $c_id;
  }

  //function to fetch details from vendor_dc table
  public function fetch_vendor_dc($id)
  {
    $this->db->select('*');
    $this->db->from('vendor_dc');
    $this->db->where('vendor_id',$id);
    if($res=$this->db->get())
      return $res->result();
    else {
      return false;
    }
  }


  //function to edit vendor dc

  public function update_vendor_dc($id,$datas)
  {
    $this->db->where('vendor_id',$id);
    $res=$this->db->update('vendor_dc',$datas);
      return $res;
  }

  //function to delete_vendor_dc
  public function delete_vendor_dc($id)
  {
    $this->db->delete('vendor_dc',array('vendor_id'=>$id));
    return $this->db->affected_rows();
  }

  //function to list the vendor dc based on the search result

  public function vendor_dc_listing($searchText)
  {
  $this->db->select('*');
  $this->db->from('vendor_dc');
  if(!empty($searchText)) {
      $likeCriteria = "(date  LIKE '%".$searchText."%'
                        OR  vendor_id  LIKE '%".$searchText."%'
                      OR  dc_no  LIKE '%".$searchText."%'
                      OR  description  LIKE '%".$searchText."%')";
      $this->db->where($likeCriteria);
  }
  if($query = $this->db->get())
        return $query->result();
  else
      return false;
  }

}
