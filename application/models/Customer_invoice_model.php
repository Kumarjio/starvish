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
    $c_id =$this->db->insert('customer_invoice',$datas);
    return $c_id;
}
//function to invoice to customer invoice products
public function add_customer_invoice_product($datas)
{
  $res=$this->db->insert('customer_invoice_products',$datas);
  return $res;
}

  //function to fetch details from customer invoice table
  public function fetch_customer_invoice($id)
  {
    $this->db->select('*');
    $this->db->from('customer_invoice');
    $this->db->where('invoice_id',$id);
    if($res=$this->db->get())
      return $res->result();
    else {
      return false;
    }
  }
  //function to fetch details from customer_invoice_products table
  public function fetch_customer_invoice_product($id)
  {
    $this->db->select('*');
    $this->db->from('customer_invoice_products');
    $this->db->where('invoice_id',$id);
    if($res=$this->db->get())
      return $res->result();
    else {
      return false;
    }
  }

  //function to edit customer invoice
  public function update_customer_invoice($id,$datas)
  {
    $this->db->where('invoice_id',$id);
    $res=$this->db->update('customer_invoice',$datas);
      return $res;
  }

  //function to edit customer invoice product
  public function update_customer_invoice_product($id,$datas)
  {
    $this->db->where('invoice_id',$id);
    $res=$this->db->insert('customer_invoice_products',$datas);
      return $res;
  }

  //function to delete_customer_invoice
  public function delete_customer_invoice($id)
  {
    $this->db->delete('customer_invoice',array('invoice_id'=>$id));
    $this->db->delete('customer_invoice_products',array('invoice_id'=>$id));
    return $this->db->affected_rows();
  }

  //function to list the customer invoice based on the search result

  public function customer_invoice_listing($searchText)
  {
  $this->db->select('*');
  $this->db->from('customer_invoice');
  if(!empty($searchText)) {
      $likeCriteria = "(date  LIKE '%".$searchText."%'
                        OR  customer_id  LIKE '%".$searchText."%'
                        OR  invoice_id  LIKE '%".$searchText."%'
                      OR  po_id  LIKE '%".$searchText."%'
                      OR  srn_dc  LIKE '%".$searchText."%'
                      OR  payment_mode  LIKE '%".$searchText."%')";
      $this->db->where($likeCriteria);
  }
  if($query = $this->db->get())
        return $query->result();
  else
  return false;
}
}
