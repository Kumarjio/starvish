<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model
{
  /*This function is for listing the customer in customer_master
  *@returns customer_master as array
  */
  //customer master
public function customerlisting()
{
  if($res=$this->db->get('customer_master'))
  {
    return $res->result();
  }
  else {
    return false;
    }
}

//function to add customer into customer_master table
public function add_customer($datas)
{
  $res=$this->db->insert('customer_master',$datas);
  return $res;
}

//function to fetch details from customer table
public function fetch_customer($id)
{
  $this->db->select('*');
  $this->db->from('customer_master');
  $this->db->where('customer_id',$id);
  if($res=$this->db->get())
    return $res->result();
  else {
    return false;
  }
}

//function to edit customer
public function update_customer($id,$datas)
{
  $this->db->where('customer_id',$id);
  $res=$this->db->update('customer_master',$datas);
  return $res;
}

//function to delete customer
public function delete_customer($id)
{
  $res=$this->db->delete('customer_master',array('customer_id'=>$id));
  return $res;
}

//function to list the users based on the search result

public function customer_listing($searchText)
{
$this->db->select('*');
$this->db->from('customer_master');
if(!empty($searchText)) {
    $likeCriteria = "(customer_id  LIKE '%".$searchText."%'
                      OR  company_name  LIKE '%".$searchText."%'
                    OR  contact_person1  LIKE '%".$searchText."%'
                    OR  contact_person2  LIKE '%".$searchText."%'
                    OR  email1 LIKE '%".$searchText."%'
                    OR  email2 LIKE '%".$searchText."%'
                    OR  bank_name LIKE '%".$searchText."%'
                    OR  account_name LIKE '%".$searchText."%'
                    OR  account_number LIKE '%".$searchText."%'
                    OR  address2 LIKE '%".$searchText."%'
                    OR  address1  LIKE '%".$searchText."%')";
    $this->db->where($likeCriteria);
}
if($query = $this->db->get())
      return $query->result();
else
    return false;
}


}
