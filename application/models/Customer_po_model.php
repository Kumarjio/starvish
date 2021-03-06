<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Customer_po_model extends CI_Model{

  //function to list the customer
  public function fetch_customer()
  {
    $res=$this->db->get('customer_po');
    return $res->result();
  }

  //function to fetch all details of customer_po
  public function view_customer_po($po_id)
  {
    if($res=$this->db->get('customer_po'))
      return $res->result();
    else {
      return false;
    }
  }

//function to count the files
public function count_files($po_id)
{
  $this->db->select('*');
  $this->db->from('customer_po_files');
  $this->db->where('po_id',$po_id);
  if($res=$this->db->get())
    return $res->num_rows();
  else
    return false;
}

  public function select_customer_po_file($file)
  {
    $this->db->select('file_path');
    $this->db->from('customer_po_files');
    $this->db->where('file_name',$file);
    $res=$this->db->get();
      return $res->result();
  }
  //function to delete the files in customer_po
  public function delete_customer_po_file($file)
  {
    $this->db->delete('customer_po_files',array('file_name'=>$file));
    return $this->db->affected_rows();

  }

  //function to fetch all files of customer PO
  public function view_customer_files($po_id)
  {
  $this->db->select('*');
  $this->db->from('customer_po_files');
  $this->db->where('po_id',$po_id);
  if($res=$this->db->get())
    return $res->result();
  else {
    return false;
  }
  }

//file uploading in the table customer_po_files
public function insert_file($data = array()){
       $insert = $this->db->insert_batch('customer_po_files',$data);
       return $insert?true:false;
   }


  //function to fetch details from customer table
  public function all_customer()
  {
    if($res=$this->db->get('customer_master'))
      return $res->result();
    else {
      return false;
    }
  }


  //function to list the customer po
  public function customerpolisting()
  {
    if($res=$this->db->get('customer_po'))
    {
      return $res->result();
    }
    else {
      return false;
      }
  }

  //function to add customer po into customer_po table
  public function add_customer_po($datas)
  {
    $this->db->trans_start();
    $c_id =$this->db->insert('customer_po',$datas);
    $vend_id = $this->db->insert_id();
    $this->db->trans_complete();
    return $c_id;
  }

  //function to fetch details from customer_po table
  public function fetch_customer_po($id)
  {
    $this->db->select('*');
    $this->db->from('customer_po');
    $this->db->where('po_id',$id);
    if($res=$this->db->get())
      return $res->result();
    else {
      return false;
    }
  }


  //function to edit customer po
  public function update_customer_po($id,$datas)
  {
    $this->db->where('po_id',$id);
    $res=$this->db->update('customer_po',$datas);

      return $res;
  }

  //function to delete_customer_po
  public function delete_customer_po($id)
  {
    $this->db->delete('customer_po',array('po_id'=>$id));
    return $this->db->affected_rows();
  }

  //function to list the customer po based on the search result

  public function customer_po_listing($searchText)
  {
  $this->db->select('*');
  $this->db->from('customer_po');
  if(!empty($searchText)) {
      $likeCriteria = "(date  LIKE '%".$searchText."%'
                        OR  customer_id  LIKE '%".$searchText."%'
                      OR  po_id  LIKE '%".$searchText."%'
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
