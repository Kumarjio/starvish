<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Vendor_invoice_model extends CI_Model{

  //function to list the vendors
  public function fetch_vendors()
  {
    $res=$this->db->get('vendor_invoice');
    return $res->result();
  }

  //function to list the vendor invoice
  public function vendorinvoicelisting()
  {
    if($res=$this->db->get('vendor_invoice'))
    {
      return $res->result();
    }
    else {
      return false;
      }
  }

  //function to fetch all details of vendor_invoice
  public function view_vendor_invoice($invoice_id)
  {
    if($res=$this->db->get('vendor_invoice'))
      return $res->result();
    else {
      return false;
    }
  }

  //function to fetch all files of Vendor invoice
  public function view_vendor_files($invoice_id)
  {
    if($res=$this->db->get('vendor_invoice_files'))
      return $res->result();
    else {
      return false;
    }
  }

//file uploading in the table vendor_invoice_files
public function insert_file($data = array()){
       $insert = $this->db->insert_batch('vendor_invoice_files',$data);
       return $insert?true:false;
   }

  //function to add vendor invoice into vendor_invoice table
  public function add_vendor_invoice($datas)
  {
    $this->db->trans_start();
    $c_id =$this->db->insert('vendor_invoice',$datas);
    $vend_id = $this->db->insert_id();
    $this->db->trans_complete();
    return $c_id;
}


  //function to fetch details from vendor invoice table
  public function fetch_vendor_invoice($id)
  {
    $this->db->select('*');
    $this->db->from('vendor_invoice');
    $this->db->where('invoice_id',$id);
    if($res=$this->db->get())
      return $res->result();
    else {
      return false;
    }
  }


  //function to edit vendor invoice
  public function update_vendor_invoice($id,$datas)
  {
    $this->db->where('invoice_id',$id);
    $res=$this->db->update('vendor_invoice',$datas);
      return $res;
  }

  //function to delete_vendor_invoice
  public function delete_vendor_invoice($id)
  {
    $this->db->delete('vendor_invoice',array('invoice_id'=>$id));
    //$this->db->delete('customer_invoice_products',array('invoice_id'=>$id));
    return $this->db->affected_rows();
  }

  //function to list the customer invoice based on the search result

  public function vendor_invoice_listing($searchText)
  {
  $this->db->select('*');
  $this->db->from('vendor_invoice');
  if(!empty($searchText)) {
      $likeCriteria = "(date  LIKE '%".$searchText."%'
                        OR  vendor_id  LIKE '%".$searchText."%'
                        OR  vendor_name  LIKE '%".$searchText."%'
                        OR  invoice_id  LIKE '%".$searchText."%')";
      $this->db->where($likeCriteria);
  }
  if($query = $this->db->get())
        return $query->result();
  else
  return false;
}
}
