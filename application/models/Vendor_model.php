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

}
