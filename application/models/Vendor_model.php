<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Vendor_model extends CI_Model
{
  /*This function is for listing the vendor in vendor_master
  *@returns vendor_master as array
  */
public function vendorlisting()
{
  if($res=$this->db->get('vendor_master'))
  {
    return $res->result();
  }
  else {
    return false;
    }
}


//function to count the files
public function count_files($vendor_id)
{
  $this->db->select('*');
  $this->db->from('vendor_master_files');
  $this->db->where('vendor_id',$vendor_id);
  if($res=$this->db->get())
    return $res->num_rows();
  else
    return false;
}

//file uploading in the table customer_po_files
public function insert_file($data = array()){
       $insert = $this->db->insert_batch('vendor_master_files',$data);
       return $insert?true:false;
   }

   //function to select file pathinfo
   public function select_vendor_file($file)
   {
     $this->db->select('file_path');
     $this->db->from('vendor_master_files');
     $this->db->where('file_name',$file);
     return $this->db->get()->result();
   }

   //function to delete the files in customer_po
   public function delete_vendor_file($file)
   {
     $this->db->delete('vendor_master_files',array('file_name'=>$file));
     return $this->db->affected_rows();

   }

   //function to fetch the customer file
   public function fetch_vendor_files($id)
   {
     $this->db->select('*');
     $this->db->from('vendor_master_files');
     $this->db->where('vendor_id',$id);
     if($res=$this->db->get())
       return $res->result();
     else {
       return false;
     }
   }


  //function to add vendor into vendor_master table
  public function add_vendor($datas)
  {
    $this->db->trans_start();
    $v_id =$this->db->insert('vendor_master',$datas);
    $vend_id = $this->db->insert_id();
    $this->db->trans_complete();
    return $v_id;
  }

  //function to fetch details from vendor table
  public function fetch_vendor($id)
  {
    $this->db->select('*');
    $this->db->from('vendor_master');
    $this->db->where('vendor_id',$id);
    if($res=$this->db->get())
      return $res->result();
    else {
      return false;
    }
  }
  //function to edit vendor
  public function update_vendor($id,$datas)
  {
    $this->db->where('vendor_id',$id);
    $this->db->update('vendor_master',$datas);
    return TRUE;
  }

  //function to delete_vendor
  public function delete_vendor($id)
  {
    $this->db->delete('vendor_master',array('vendor_id'=>$id));
    return $this->db->affected_rows();
  }

  //function to list the users based on the search result

  public function vendor_listing($searchText)
  {
  $this->db->select('*');
  $this->db->from('vendor_master');
  if(!empty($searchText)) {
      $likeCriteria = "(vendor_id  LIKE '%".$searchText."%'
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
