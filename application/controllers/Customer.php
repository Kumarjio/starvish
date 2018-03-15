<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Customer extends BaseController
{
  /**
   * This is default constructor of the class
   */
  public function __construct()
  {
      parent::__construct();
      $this->load->model('customer_model');
      $this->isLoggedIn();
  }
  /**
   * This function used to load the first screen of the customer
   */
  public function index()
  {
      $this->global['pageTitle'] = 'StarVish: Customer Master';
      $result=$this->customer_model->customerlisting();
      if($result!=false)
        {$res['datas']=$result;
          $res['searchText']='';
        }
      else {
        $res['datas']='NA';
        $res['searchText']='';
      }

      $html =$this->loadViews("customer/customerlisting", $this->global, $res , NULL);
  }
  //this function used to redirect to addcustomer or editcustomer based on the customerid
    public function add_edit_customer($id=NULL)
    {
      if($id==NULL)
      {
        $this->global['pageTitle'] = 'StarVish:Add Customer';
      $this->loadViews("customer/add_customer", $this->global, NULL , NULL);
      }
      else {
        $this->global['pageTitle'] = 'StarVish:Edit Customer';
        $result['datas']=$this->customer_model->fetch_customer($id);
        $this->loadViews("customer/edit_customer",$this->global,$result,NULL);
      }
    }

  /**
   * This function is used to add new customer to the system
   */
public function add_customer()
{
  $customer_id=$this->input->post('customer_id');
  $cname=$this->input->post('company_name');
  $address1=$this->input->post('address1');
  $address2=$this->input->post('address2');
  $contactperson1=$this->input->post('contact_person1');
  $contactperson2=$this->input->post('contact_person2');
  $designation1=$this->input->post('designation1');
  $designation2=$this->input->post('designation2');
  $email1=$this->input->post('email1');
  $email2=$this->input->post('email2');
  $contactno1=$this->input->post('contact_no1');
  $contactno2=$this->input->post('contact_no2');
  $bankname=$this->input->post('bank_name');
  $accountname=$this->input->post('account_name');
  $accountnumber=$this->input->post('account_number');
  $ifsccode=$this->input->post('ifsc_code');
  $gstin=$this->input->post('gstin');
  $attachment=$this->input->post('attachment');

  $datas=array('customer_id'=>$customer_id,'company_name'=>$cname,'address1'=>$address1,
              'address2'=>$address2,'contact_person1'=>$contactperson1,'contact_person2'=>$contactperson2,
              'designation1'=>$designation1,'designation2'=>$designation2,'email1'=>$email1,'email2'=>$email2,
              'contact_no1'=>$contactno1,'contact_no2'=>$contactno2,'gstin'=>$gstin,'bank_name'=>$bankname,
              'account_name'=>$accountname,'account_number'=>$accountnumber,'ifsc_code'=>$ifsccode,
              'attachment'=>$attachment
              );

              $this->customer_model->add_customer($datas);
              redirect('add_edit_customer');
}

//function to edit customer

  public function update_customer(){
    $customer_id=$this->input->post('customer_id');
    $cname=$this->input->post('company_name');
    $address1=$this->input->post('address1');
    $address2=$this->input->post('address2');
    $contactperson1=$this->input->post('contact_person1');
    $contactperson2=$this->input->post('contact_person2');
    $designation1=$this->input->post('designation1');
    $designation2=$this->input->post('designation2');
    $email1=$this->input->post('email1');
    $email2=$this->input->post('email2');
    $contactno1=$this->input->post('contact_no1');
    $contactno2=$this->input->post('contact_no2');
    $bankname=$this->input->post('bank_name');
    $accountname=$this->input->post('account_name');
    $accountnumber=$this->input->post('account_number');
    $ifsccode=$this->input->post('ifsc_code');
    $gstin=$this->input->post('gstin');
    $attachment=$this->input->post('attachment');

    $datas=array('customer_id'=>$customer_id,'company_name'=>$cname,'address1'=>$address1,
                'address2'=>$address2,'contact_person1'=>$contactperson1,'contact_person2'=>$contactperson2,
                'designation1'=>$designation1,'designation2'=>$designation2,'email1'=>$email1,'email2'=>$email2,
                'contact_no1'=>$contactno1,'contact_no2'=>$contactno2,'gstin'=>$gstin,'bank_name'=>$bankname,
                'account_name'=>$accountname,'account_number'=>$accountnumber,'ifsc_code'=>$ifsccode,
                'attachment'=>$attachment
                );

      $this->customer_model->update_customer($customer_id,$datas);
      redirect('customer_master');
  }

  //function to delete customer data
  public function delete_customer($id)
  {
    $this->customer_model->delete_customer($id);
    redirect('customer_master');
  }

  //function to list the customer based on the search result
  public function customer_listing()
  {
    $this->global['pageTitle'] = 'StarVish: Search';
    $searchText = $this->security->xss_clean($this->input->post('searchText'));
    $result=$this->customer_model->customer_listing($searchText);
    if($result!=FALSE)
    {
      $data['datas']=$result;
      $data['searchText'] = $searchText;
    }
    else {
      $data['datas']='NA';
      $data['searchText'] = $searchText;
    }
  $this->loadViews("customer/customerlisting",$this->global,$data,NULL);
  }

}
