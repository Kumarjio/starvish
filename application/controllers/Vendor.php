<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Vendor extends BaseController
{
  /**
   * This is default constructor of the class
   */
  public function __construct()
  {
      parent::__construct();
      $this->load->model('vendor_model');
      $this->isLoggedIn();
  }
  /**
   * This function used to load the first screen of the user
   */
  public function index()
  {
      $this->global['pageTitle'] = 'StarVish: Vendor Master';
      $result=$this->vendor_model->vendorlisting();
      if($result!=false)
        {$res['datas']=$result;
          $res['searchText']='';
        }
      else {
        $res['datas']='NA';
        $res['searchText']='';
      }
      $html =$this->loadViews("vendor/vendorlisting", $this->global, $res , NULL);
  }


//this function used to redirect to addvendor or editvendor based on the vendorid
  public function add_edit_vendor($id=NULL)
  {
    if($id==NULL)
    {
      $this->global['pageTitle'] = 'StarVish:Add Vendor';
    $this->loadViews("vendor/add_vendor", $this->global, NULL , NULL);
    }
    else {
      $this->global['pageTitle'] = 'StarVish:Edit Vendor';
      $result['datas']=$this->vendor_model->fetch_vendor($id);
      $this->loadViews("vendor/edit_vendor",$this->global,$result,NULL);
    }
  }

//function for adding vendor
    public function add_vendor()
    {
      $vendor_id=$this->input->post('vendor_id');
      $company_name=$this->input->post('company_name');
      $address1=$this->input->post('address1');
      $address2=$this->input->post('address2');
      $contact_person1=$this->input->post('contact_person1');
      $contact_person2=$this->input->post('contact_person2');
      $desg1=$this->input->post('desg1');
      $desg2=$this->input->post('desg2');
      $email1=$this->input->post('email1');
      $email2=$this->input->post('email2');
      $contact_no1=$this->input->post('contact_no1');
      $contact_no2=$this->input->post('contact_no2');
      $bank=$this->input->post('bank');
      $bank_acc_name=$this->input->post('bank_acc');
      $bank_acc_no=$this->input->post('bank_acc_no');
      $ifsc_code=$this->input->post('ifsc_code');
      $gst=$this->input->post('gst');
      $attachment=$this->input->post('attachment');

      $data=array('vendor_id'=>$vendor_id,'company_name'=>$company_name,'address1'=>$address1,
                  'address2'=>$address2,'contact_person1'=>$contact_person1,'contact_person2'=>$contact_person2,
                  'designation1'=>$desg1,'designation2'=>$desg2,'email1'=>$email1,'email2'=>$email2,
                  'contact_no1'=>$contact_no1,'contact_no2'=>$contact_no2,'gstin'=>$gst,'bank_name'=>$bank,
                  'account_name'=>$bank_acc_name,'account_number'=>$bank_acc_no,'ifsc_code'=>$ifsc_code,
                  'attachment'=>$attachment
                  );
        $result = FALSE;
        $result = $this->vendor_model->add_vendor($data);
        if($result == TRUE){
            $this->session->set_flashdata('success', 'New Vendor created successfully');
        }
        else {
          $this->session->set_flashdata('error','Vendor creation Failed!');
        }

        redirect('add_edit_vendor');
    }

//function for editing vedor Details
public function update_vendor()
{
  $vendor_id=$this->input->post('vendor_id');
  $company_name=$this->input->post('company_name');
  $address1=$this->input->post('address1');
  $address2=$this->input->post('address2');
  $contact_person1=$this->input->post('contact_person1');
  $contact_person2=$this->input->post('contact_person2');
  $desg1=$this->input->post('desg1');
  $desg2=$this->input->post('desg2');
  $email1=$this->input->post('email1');
  $email2=$this->input->post('email2');
  $contact_no1=$this->input->post('contact_no1');
  $contact_no2=$this->input->post('contact_no2');
  $bank=$this->input->post('bank');
  $bank_acc_name=$this->input->post('bank_acc');
  $bank_acc_no=$this->input->post('bank_acc_no');
  $ifsc_code=$this->input->post('ifsc_code');
  $gst=$this->input->post('gst');
  $attachment=$this->input->post('attachment');

  $datas=array('vendor_id'=>$vendor_id,'company_name'=>$company_name,'address1'=>$address1,
              'address2'=>$address2,'contact_person1'=>$contact_person1,'contact_person2'=>$contact_person2,
              'designation1'=>$desg1,'designation2'=>$desg2,'email1'=>$email1,'email2'=>$email2,
              'contact_no1'=>$contact_no1,'contact_no2'=>$contact_no2,'gstin'=>$gst,'bank_name'=>$bank,
              'account_name'=>$bank_acc_name,'account_number'=>$bank_acc_no,'ifsc_code'=>$ifsc_code,
              'attachment'=>$attachment
              );
    $result = FALSE;
    $result = $this->vendor_model->update_vendor($vendor_id,$datas);
    if($result == true)
    {
        $this->session->set_flashdata('success', 'Vendor updated successfully');
    }
    else
    {
        $this->session->set_flashdata('error', 'Vendor updation failed!');
    }
    redirect('vendor_master');
}

//function to delete vendor data
public function delete_vendor($id)
{
  $result = $this->vendor_model->delete_vendor($id);
  if($result == true)
  {
      $this->session->set_flashdata('success', 'Vendor Deleted successfully');
  }
  else
  {
      $this->session->set_flashdata('error', 'Vendor Deletion failed!');
  }
  redirect('vendor_master');
}

//function to list the users based on the search result

public function vendor_listing()
{
  $this->global['pageTitle'] = 'StarVish: Search';
  $searchText = $this->security->xss_clean($this->input->post('searchText'));

  $result=$this->vendor_model->vendor_listing($searchText);
  if($result!=FALSE)
  {
    $data['datas']=$result;
    $data['searchText'] = $searchText;
  }
  else {
    $data['datas']='NA';
    $data['searchText'] = $searchText;
  }

$this->loadViews("vendor/vendorlisting",$this->global,$data,NULL);
}

}
