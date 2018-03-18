<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Vendor_quotation_model extends CI_Model{
  public function vendorquotationlisting()
  {
    if($res=$this->db->get('vendor_quote'))
    {
      return $res->result();
    }
    else {
      return false;
      }
  }

}
