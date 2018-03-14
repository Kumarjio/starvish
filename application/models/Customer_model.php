<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model
{
  /*This function is for listing the customer in customer_master
  *@returns customer_master as array
  */
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
  $this->db->insert('customer_master',$datas);
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
  $this->db->update('customer_master',$datas);
}

//function to delete customer
public function delete_customer($id)
{
  $this->db->delete('customer_master',array('customer_id'=>$id));
}

}
