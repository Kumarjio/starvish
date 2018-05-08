<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Customer_invoice_model extends CI_Model{

  //function to list the customers
  public function fetch_customers()
  {
    $res=$this->db->get('customer_invoice');
    return $res->result();
  }

  //function to list the customer invoice
  public function customerinvoicelisting()
  {
    if($res=$this->db->get('customer_invoice'))
    {
      return $res->result();
    }
    else {
      return false;
      }
  }

  //function to add customer invoice into customer_invoice table
  public function add_customer_invoice($datas)
  {
    $this->db->trans_start();
    $c_id =$this->db->insert('customer_invoice',$datas);
    $vend_id = $this->db->insert_id();
    $this->db->trans_complete();
    return $c_id;
}
  //function to fetch details from vendor_po table
  public function fetch_vendor_po($id)
  {
    $this->db->select('*');
    $this->db->from('vendor_po');
    $this->db->where('vendor_id',$id);
    if($res=$this->db->get())
      return $res->result();
    else {
      return false;
    }
  }


  //function to edit vendor po
  public function update_vendor_po($id,$datas)
  {
    $this->db->where('vendor_id',$id);
    $res=$this->db->update('vendor_po',$datas);
      return $res;
  }

  //function to delete_vendor_po
  public function delete_vendor_po($id)
  {
    $this->db->delete('vendor_po',array('vendor_id'=>$id));
    return $this->db->affected_rows();
  }

  //function to list the vendor po based on the search result

  public function vendor_po_listing($searchText)
  {
  $this->db->select('*');
  $this->db->from('vendor_po');
  if(!empty($searchText)) {
      $likeCriteria = "(date  LIKE '%".$searchText."%'
                        OR  vendor_id  LIKE '%".$searchText."%'
                      OR  po_id  LIKE '%".$searchText."%'
                      OR  description  LIKE '%".$searchText."%')";
      $this->db->where($likeCriteria);
  }
  if($query = $this->db->get())
        return $query->result();
  else
      return false;
  }

}
