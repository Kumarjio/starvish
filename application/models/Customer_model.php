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

//function to count the files
public function count_files($customer_id)
{
  $this->db->select('*');
  $this->db->from('customer_master_files');
  $this->db->where('customer_id',$customer_id);
  if($res=$this->db->get())
    return $res->num_rows();
  else
    return false;
}

//file uploading in the table customer_po_files
public function insert_file($data = array()){
       $insert = $this->db->insert_batch('customer_master_files',$data);
       return $insert?true:false;
   }

//function to add customer into customer_master table
public function add_customer($datas)
{
  $res=$this->db->insert('customer_master',$datas);
  return $res;
}

//function to select file pathinfo
public function select_customer_file($file)
{
  $this->db->select('file_path');
  $this->db->from('customer_master_files');
  $this->db->where('file_name',$file);
  return $this->db->get()->result();

}
//function to delete the files in customer_po
public function delete_customer_file($file)
{
  $this->db->delete('customer_master_files',array('file_name'=>$file));
  return $this->db->affected_rows();

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

//function to fetch the customer file
public function fetch_customer_files($id)
{
  $this->db->select('*');
  $this->db->from('customer_master_files');
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

public function fetch_customers()
{
  if($res=$this->db->get('customer_master'))
      return $res->result();
  else {
    return false;
  }
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


//customer quotation listing
public function customerquote()
{
$res=$this->db->query('select customer_quote.*,count(customer_quote_products.quote_id) as product_count from customer_quote INNER JOIN customer_quote_products ON customer_quote.quote_id=customer_quote_products.quote_id GROUP by customer_quote.quote_id');
if($res->result())
  return $res->result();
else {
  return false;
}
}


//function to quote to customer_quote
public function add_customer_quote($datas)
{
  $res=$this->db->insert('customer_quote',$datas);
  return $res;
}
//function to quote to customer_quote_products
public function add_customer_product($datas)
{
  $res=$this->db->insert('customer_quote_products',$datas);
  return $res;
}
//customer quotation for search
public function customer_quote()
{
$this->db->select('*');
$this->db->from('customer_quote');
if(!empty($searchText)) {
    $likeCriteria = "(customer_id  LIKE '%".$searchText."%'
                      OR  quote_id  LIKE '%".$searchText."%'
                    OR  date  LIKE '%".$searchText."%'
                    OR  description  LIKE '%".$searchText."%')";
    $this->db->where($likeCriteria);
}
if($query = $this->db->get())
      return $query->result();
else
    return false;

}

//function to edit customer quote
public function update_customer_quote($id,$datas)
{
  $this->db->where('customer_id',$id);
  $res=$this->db->update('customer_quote',$datas);
    return $res;
}

//function to edit customer quote product
public function update_customer_quote_product($id,$data)
{
  $this->db->where('quote_id',$id);
  $res=$this->db->insert('customer_quote_products',$data);
    return $res;
}

//function to delete customer quote
public function delete_customer_quote($id)
{
  $res=$this->db->delete('customer_quote',array('quote_id'=>$id));
  $res=$this->db->delete('customer_quote_products',array('quote_id'=>$id));
  return $res;
}
//function to fetch details from customer quote table
public function fetch_customer_quote($id)
{
  $this->db->select('*');
  $this->db->from('customer_quote');
  $this->db->where('quote_id',$id);
  if($res=$this->db->get())
    return $res->result();
  else {
    return false;
  }
}
//function to fetch details from customer_quote_products table
public function fetch_customer_quote_product($id)
{
  $this->db->select('*');
  $this->db->from('customer_quote_products');
  $this->db->where('quote_id',$id);
  if($res=$this->db->get())
    return $res->result();
  else {
    return false;
  }
}
//customer quotation product
public function customerproduct($id)
{
  $this->db->select('*');
  $this->db->from('customer_quote_products');
$this->db->where('quote_id',$id);
  if($res=$this->db->get())
    return $res->num_rows();
  else {
    return false;
    }
}

//function to view the quotation_search
public function customer_quotation_view($id)
{
  $this->db->select('*');
  $this->db->from('customer_quote as quote');
  $this->db->join('customer_quote_products as products','products.quote_id=quote.quote_id','left');
  $this->db->where('quote.quote_id',$id);
  if($res=$this->db->get())
      return $res->result();
  else {
    return false;
  }
}


public function our_details()
{
  if($res=$this->db->get('sv_table'))
  {
    return $res->result();
  }
  else {
    return false;
  }
}

public function customer_details($id)
{
  $this->db->select('customer_id');
  $this->db->from('customer_quote');
  $this->db->where('quote_id',$id);
  $res=$this->db->get();
  foreach($res->result() as $row)
  {
    $cust_id=$row->customer_id;
  }
  $this->db->select('*');
  $this->db->from('customer_master');
  $this->db->where('customer_id',$cust_id);
  $result=$this->db->get();
  return $result->result();
}

//function to count the no of products in the quotation_search

public function customer_quote_products($id)
{
  $this->db->select('*');
  $this->db->from('customer_quote_products');
  $this->db->where('quote_id',$id);
  $res=$this->db->get();
  return $res->num_rows();

}

public function fetch_notes()
{
  if($res=$this->db->get('note_master'))
  {
    return $res->result();
  }
  else {
    return false;
  }
}
//end
}
