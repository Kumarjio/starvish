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

  //function to add vendor quotation into vendor_quote table
  public function add_vendor_quotation($datas)
  {
    $this->db->trans_start();
    $v_id =$this->db->insert('vendor_quote',$datas);
    $vend_id = $this->db->insert_id();
    $this->db->trans_complete();
    return $v_id;
  }

  //function to fetch details from vendor_quote table
  public function fetch_vendor_quotation($id)
  {
    $this->db->select('*');
    $this->db->from('vendor_quote');
    $this->db->where('vendor_id',$id);
    if($res=$this->db->get())
      return $res->result();
    else {
      return false;
    }
  }


  //function to edit vendor quotation
  public function update_vendor_quotation($id,$datas)
  {
    $this->db->where('vendor_id',$id);
    $res=$this->db->update('vendor_quote',$datas);

      return $res;
  }

  //function to delete_vendor_quotation
  public function delete_vendor_quotation($id)
  {
    $this->db->delete('vendor_quote',array('vendor_id'=>$id));
    return $this->db->affected_rows();
  }

  //function to list the quotations based on the search result

  public function vendor_quotation_listing($searchText)
  {
  $this->db->select('*');
  $this->db->from('vendor_quote');
  if(!empty($searchText)) {
      $likeCriteria = "(date  LIKE '%".$searchText."%'
                        OR  vendor_quote_id  LIKE '%".$searchText."%'
                      OR  vendor_id  LIKE '%".$searchText."%'
                      OR  description  LIKE '%".$searchText."%'
                      OR  attachment LIKE '%".$searchText."%')";
      $this->db->where($likeCriteria);
  }
  if($query = $this->db->get())
        return $query->result();
  else
      return false;
  }

}
