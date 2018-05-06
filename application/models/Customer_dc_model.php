<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Customer_dc_model extends CI_Model{

  //function to list the customer
  public function fetch_customer()
  {
    $res=$this->db->get('customer_dc');
    return $res->result();
  }

  //function to list the customer dc
  public function customerdclisting()
  {
    if($res=$this->db->get('customer_dc'))
    {
      return $res->result();
    }
    else {
      return false;
      }
  }

  //function to add customer dc into customer_dc table
  public function add_customer_dc($datas)
  {
    $this->db->trans_start();
    $c_id =$this->db->insert('customer_dc',$datas);
    $vend_id = $this->db->insert_id();
    $this->db->trans_complete();
    return $c_id;
  }

  //function to fetch details from customer_dc table
  public function fetch_customer_dc($id)
  {
    $this->db->select('*');
    $this->db->from('customer_dc');
    $this->db->where('customer_id',$id);
    if($res=$this->db->get())
      return $res->result();
    else {
      return false;
    }
  }


  //function to edit customer dc

  public function update_customer_dc($id,$datas)
  {
    $this->db->where('customer_id',$id);
    $res=$this->db->update('customer_dc',$datas);
      return $res;
  }

  //function to delete_customer_dc
  public function delete_customer_dc($id)
  {
    $this->db->delete('customer_dc',array('customer_id'=>$id));
    return $this->db->affected_rows();
  }

  //function to list the customer dc based on the search result

  public function customer_dc_listing($searchText)
  {
  $this->db->select('*');
  $this->db->from('customer_dc');
  if(!empty($searchText)) {
      $likeCriteria = "(date  LIKE '%".$searchText."%'
                        OR  customer_id  LIKE '%".$searchText."%'
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
