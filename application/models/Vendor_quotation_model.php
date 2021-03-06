<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Vendor_quotation_model extends CI_Model{

  //function to list the vendors
  public function fetch_vendor()
  {
    $res=$this->db->get('vendor_master');
    return $res->result();
  }

  //function to list the quotation
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

//function to select file path
public function select_vendor_quotation_file($file)
{
  $this->db->select('file_path');
  $this->db->from('vendor_quote_files');
  $this->db->where('file_name',$file);
  $res=$this->db->get();
  return $res->result();
}

//function to delete the vendor quotation
public function delete_vendor_quotation_file($file)
{
  $this->db->delete('vendor_quote_files',array('file_name'=>$file));
  return $this->db->affected_rows();
}


  //function to count the files in vendor_quot_products
  public function count_files($vendor_quote_id)
  {
    $this->db->select('*');
    $this->db->from('vendor_quote_files');
    $this->db->where('vendor_quote_id',$vendor_quote_id);
    if($res=$this->db->get())
      return $res->num_rows();
    else
      return false;

  }


  //file uploading in the table vendor_quote_files
  public function insert_file($data = array()){
         $insert = $this->db->insert_batch('vendor_quote_files',$data);
         return $insert?true:false;
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
    $this->db->where('vendor_quote_id',$id);
    if($res=$this->db->get())
      return $res->result();
    else {
      return false;
    }
  }
  //function to view vendor details
  public function view_vendor_quotation($id)
  {
    $this->db->select('*');
    $this->db->from('vendor_quote');
    $this->db->where('vendor_quote_id',$id);
    if($res=$this->db->get())
      return $res->result();
    else {
      return false;
    }
  }

//function to fetch the files of vendor quotation
public function fetch_vendor_quotation_files($id)
{
  $this->db->select('*');
  $this->db->from('vendor_quote_files');
  $this->db->where('vendor_quote_id',$id);
  if($res=$this->db->get())
    return $res->result();
  else {
    return false;
}
}

  //function to edit vendor quotation
  public function update_vendor_quotation($id,$datas)
  {
    $this->db->where('vendor_quote_id',$id);
    $res=$this->db->update('vendor_quote',$datas);
  if($res)
  return true;

  }

  //function to delete_vendor_quotation
  public function delete_vendor_quotation($id)
  {
    $this->db->delete('vendor_quote',array('vendor_quote_id'=>$id));
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
