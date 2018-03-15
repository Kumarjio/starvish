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
   * This function used to load the first screen of the customer
   */
  public function index()
  {
<<<<<<< HEAD
      $this->global['pageTitle'] = 'StarVish: Vendor Master';
      $html =$this->loadViews("customer/customerlisting", $this->global, NULL , NULL);
  }
  /**
   * This function is used to load the customer list
   */

  function customerListing()
  {
      if($this->isAdmin() == TRUE)
      {
          $this->loadThis();
=======
      $this->global['pageTitle'] = 'StarVish: Customer Master';
      $result=$this->customer_model->customerlisting();
      if($result!=false)
        {$res['datas']=$result;
          $res['searchText']='';
        }
      else {
        $res['datas']='NA';
        $res['searchText']='';
>>>>>>> babe205dd5c9360c0d4e045bee8502bf2d1b9bec
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
<<<<<<< HEAD
  function addNewCustomer()
  {
      if($this->isAdmin() == TRUE)
      {
          $this->loadThis();
      }
      else
      {
          $this->load->library('form_validation');
          $this->form_validation->set_rules('customer_id','Customer ID','trim|required');
          $this->form_validation->set_rules('company_name','Company Name','trim|required|max_length[128]');
          $this->form_validation->set_rules('email1','Email1','trim|required|valid_email|max_length[128]');
          $this->form_validation->set_rules('email2','Email2','trim|required|valid_email|max_length[128]');
          $this->form_validation->set_rules('contact_no1','Contact Number 1','required|min_length[10]');
          $this->form_validation->set_rules('contact_no2','Contact Number 2','required|max_length[20]');
          $this->form_validation->set_rules('gstin','GSTIN','trim|required|max_length[20]');
          $this->form_validation->set_rules('address1','Address Line 1','trim|required');
          $this->form_validation->set_rules('address2','Address Line 2','trim|required');
          $this->form_validation->set_rules('designation1','Designation 1','trim|required');
          $this->form_validation->set_rules('designation2','Designation 2','trim|required');
          $this->form_validation->set_rules('contact_person1','Contact Person 1','trim|required|max_length[128]');
          $this->form_validation->set_rules('contact_person2','Contact Person 2','trim|required|max_length[128]');
          $this->form_validation->set_rules('bank_name','Bank Name','trim|required|max_length[128]');
          $this->form_validation->set_rules('account_name','Account Name','trim|required');
          $this->form_validation->set_rules('account_number','Account Number','trim|required');
          $this->form_validation->set_rules('ifsc_code','IFSC Code','trim|required|numeric');
          $this->form_validation->set_rules('attachment','Attachment','trim|required');



          if($this->form_validation->run() == FALSE)
          {
              $this->addNew();
          }
          else
          {
              $customer_id = $this->security->xss_clean($this->input->post('customer_id'));
              $name = ucwords(strtolower($this->security->xss_clean($this->input->post('company_name'))));
              $email1 = $this->security->xss_clean($this->input->post('email1'));
              $email2 = $this->security->xss_clean($this->input->post('email2'));
              $contactno1 = $this->security->xss_clean($this->input->post('contact_no1'));
              $contactno2 = $this->security->xss_clean($this->input->post('contact_no2'));
              $address1 = $this->security->xss_clean($this->input->post('address1'));
              $address2 = $this->security->xss_clean($this->input->post('address2'));
              $desg1 = $this->security->xss_clean($this->input->post('designation1'));
              $desg2 = $this->security->xss_clean($this->input->post('designation2'));
              $contactperson1 = ucwords(strtolower($this->security->xss_clean($this->input->post('contact_person1'))));
              $contactperson2 = ucwords(strtolower($this->security->xss_clean($this->input->post('contact_person2'))));
              $gstin = $this->security->xss_clean($this->input->post('gstin'));
              $bname = ucwords(strtolower($this->security->xss_clean($this->input->post('bank_name'))));
              $accountname = $this->security->xss_clean($this->input->post('account_name'));
              $accountnumber = $this->security->xss_clean($this->input->post('account_number'));
              $ifsc = $this->security->xss_clean($this->input->post('ifsc_code'));
              $attachment = $this->security->xss_clean($this->input->post('attachment'));


//inga user info theva ila...ne customermaster table la mattum insert panna podhum
            //  $userInfo = array('employee_id'=>$emp_id,'email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'name'=> $name,
              //                   'mobile'=>$mobile, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
//customer_id`, `company_name`, `address1`, `address2`, `contact_persion1`, `designation1`, `email`, `contact_no1`,
//`contact_person2`,
// `designation2`, `contact_no2`, `gstin`, `bank_name`, `account_name`, `account_number`, `ifsc_code`, `attachment`

              $customer_info=array('customer_id'=>$customer_id,'company_name'=>$name,
                              'address1'=>$address1,'address2'=>$address2,'contact_person1'=>$contactperson1,
                              'designation1'=>$desg1,>'contact_no1'=>$contactno1,
                              'contact_person2'=>$contactperson2,'contact_no2'=>$contactno2,
                              'designation2'=>$desg2,'email1'=>$email1,
                              'email2'=>$email2,'account_name'=>$accountname,
                              'gstin'=>$gstin,'bank_name'=>$bname,
                              'account_number'=>$accountnumber, 'ifsc_code'=>$ifsc,
                               'attachment'=>$attachment);

              $this->load->model('customer_model');
              $result = $this->customer_model->addNewCustomer($customer_info);
              if($result > 0)
              {
                  $this->session->set_flashdata('success', 'New Customer created successfully');
              }
              else
              {
                  $this->session->set_flashdata('error', 'Customer creation failed');
              }

              redirect('addNew');
          }
      }
  }
  /**
   * This function is used load customer edit information
   * @param number $customerId : Optional : This is customer id
   */
  function editOld($customer_id = NULL)
  {
      if($this->isAdmin() == TRUE || $customer_id == 1)
      {
          $this->loadThis();
      }
      else
      {
          if($customer_id == null)
          {
              redirect('customerListing');
          }

          $data['roles'] = $this->customer_model->getCustomerRoles();
          $data['customerInfo'] = $this->customer_model->getCustomerInfo($customer_id);
          $emp_id=$data['customerInfo'][0]->employee_id;
          $data['datas']=$this->customer_model->get_details($emp_id);
          $this->global['pageTitle'] = 'StarVish: Edit User';

          $this->loadViews("editOld", $this->global, $data, NULL);
      }
  }

  /**
   * This function is used to edit the customer information
   */
  function editCustomer()
  {
      if($this->isAdmin() == TRUE)
      {
          $this->loadThis();
      }
      else
      {
          $this->load->library('form_validation');

          $userId = $this->input->post('userId');
          $this->form_validation->set_rules('emp_id','Employee ID','trim|required');
          $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
          $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
          $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
          $this->form_validation->set_rules('password','Password','max_length[20]');
          $this->form_validation->set_rules('cpassword','Confirm Password','trim|matches[password]|max_length[20]');
          $this->form_validation->set_rules('address1','Address Line 1','trim|required');
          $this->form_validation->set_rules('address2','Address Line 2','trim|required');
          $this->form_validation->set_rules('desg','Designation','trim|required');
          $this->form_validation->set_rules('doj','DOJ','trim|required');
          $this->form_validation->set_rules('bank','Bank Name','trim|required');
          $this->form_validation->set_rules('bank_acc','Bank account','trim|required');
          $this->form_validation->set_rules('ifsc','IFSC Code','trim|required');
          $this->form_validation->set_rules('aadhaar','Aadhaar Number','trim|required');
          $this->form_validation->set_rules('pan','PAN Number','trim|required');
          $this->form_validation->set_rules('role','Role','trim|required|numeric');


          if($this->form_validation->run() == FALSE)
          {
              $this->editOld($customerId);
          }
          else
          {
            $emp_id = $this->security->xss_clean($this->input->post('emp_id'));
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $email = $this->security->xss_clean($this->input->post('email'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $password = $this->input->post('password');
            $address1 = $this->security->xss_clean($this->input->post('address1'));
            $address2 = $this->security->xss_clean($this->input->post('address2'));
            $desg = $this->security->xss_clean($this->input->post('desg'));
            $doj = $this->security->xss_clean($this->input->post('doj'));
            $bank = $this->security->xss_clean($this->input->post('bank'));
            $bank_acc = $this->security->xss_clean($this->input->post('bank_acc'));
            $ifsc = $this->security->xss_clean($this->input->post('ifsc'));
            $aadhaar = $this->security->xss_clean($this->input->post('aadhaar'));
            $pan = $this->security->xss_clean($this->input->post('pan'));
            $roleId = $this->input->post('role');

            $customerInfo = array();

              if(empty($password))
              {
                  $customerInfo = array('employee_id'=>$emp_id,'email'=>$email, 'roleId'=>$roleId, 'name'=>$name,
                                  'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
              }
              else
              {
                  $customerInfo = array('employee_id'=>$emp_id,'email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId,
                      'name'=>ucwords($name), 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId,
                      'updatedDtm'=>date('Y-m-d H:i:s'));
              }
              $emp_info=array('id'=>$emp_id,'name'=>$name,
                              'address1'=>$address1,'address2'=>$address2,
                              'designation'=>$desg,'email'=>$email,
                              'contact_no'=>$mobile, 'DOJ'=>$doj,
                              'pan_no'=>$pan,'bank_name'=>$bank,
                              'account_number'=>$bank_acc, 'ifsc_code'=>$ifsc,
                               'aadhaar_no'=>$aadhaar);

              $result = $this->customer_model->editCustomer($customerInfo, $customerId,$emp_id,$emp_info);

              if($result == true)
              {
                  $this->session->set_flashdata('success', 'Customer updated successfully');
              }
              else
              {
                  $this->session->set_flashdata('error', 'Customer updation failed');
              }

              redirect('customerListing');
          }
      }
  }


  /**
   * This function is used to delete the customer using customerId
   * @return boolean $result : TRUE / FALSE
   */
  function deleteCustomer()
  {
      if($this->isAdmin() == TRUE)
      {
          echo(json_encode(array('status'=>'access')));
      }
      else
      {
          $customerId = $this->input->post('customerId');
          $customerInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));

          $result = $this->customer_model->deleteCustomer($customerId, $customerInfo);
=======
public function add_customer()
{
  $customer_id=$this->input->post('customer_id');
  $company_name=$this->input->post('company_name');
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

  $datas=array('customer_id'=>$customer_id,'company_name'=>$company_name,'address1'=>$address1,
              'address2'=>$address2,'contact_person1'=>$contactperson1,'contact_person2'=>$contactperson2,
              'designation1'=>$designation1,'designation2'=>$designation2,'email1'=>$email1,'email2'=>$email2,
              'contact_no1'=>$contactno1,'contact_no2'=>$contactno2,'gstin'=>$gstin,'bank_name'=>$bankname,
              'account_name'=>$accountname,'account_number'=>$accountnumber,'ifsc_code'=>$ifsccode,
              'attachment'=>$attachment
              );

              $this->customer_model->add_customer($datas);
              redirect('add_edit_customer');
}
>>>>>>> babe205dd5c9360c0d4e045bee8502bf2d1b9bec

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
