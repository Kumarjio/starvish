<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Vendor_model extends CI_Model
{
  /*This function is for listing the vendor in vendor_master
  *@returns vendor_master as array
  */
public function vendorlisting()
{
  if($res=$this->db->get('vendor_master'))
  {
    return $res->result();
  }
  else {
    return false;
    }
}

  //function to add vendor into vendor_master table
  public function add_vendor($datas)
  {
    $this->db->insert('vendor_master',$datas);
  }

  //function to fetch details from vendor table
  public function fetch_vendor($id)
  {
    $this->db->select('*');
    $this->db->from('vendor_master');
    $this->db->where('vendor_id',$id);
    if($res=$this->db->get())
      return $res->result();
    else {
      return false;
    }
  }
  //function to edit vendor
  public function update_vendor($id,$datas)
  {
    $this->db->where('vendor_id',$id);
    $this->db->update('vendor_master',$datas);
  }

  //function to delete_vendor
  public function delete_vendor($id)
  {
    $this->db->delete('vendor_master',array('vendor_id'=>$id));
  }

}
