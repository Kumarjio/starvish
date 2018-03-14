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
      }
      else
      {
          $searchText = $this->security->xss_clean($this->input->post('searchText'));
          $data['searchText'] = $searchText;

          $this->load->library('pagination');

          $count = $this->customer_model->customerListingCount($searchText);

    $returns = $this->paginationCompress ( "customerListing/", $count, 10 );

          $data['customerRecords'] = $this->customer_model->customerListing($searchText, $returns["page"], $returns["segment"]);

          $this->global['pageTitle'] = 'StarVish: Customer Listing';

          $this->loadViews("customers", $this->global, $data, NULL);
      }
  }

  /**
   * This function is used to load the add new form
   */
  function addNew()
  {
      if($this->isAdmin() == TRUE)
      {
          $this->loadThis();
      }
      else
      {
          $this->load->model('customer_model');
          $data['roles'] = $this->customer_model->getCustomerRoles();

          $this->global['pageTitle'] = 'StarVish: Add New Customer';

          $this->loadViews("addNew", $this->global, $data, NULL);
      }
  }
  /**
   * This function is used to check whether email already exist or not
   */
  function checkEmailExists()
  {
      $customerId = $this->input->post("customerId");
      $email = $this->input->post("email");

      if(empty($customerId)){
          $result = $this->customer_model->checkEmailExists($email);
      } else {
          $result = $this->customer_model->checkEmailExists($email, $customerId);
      }

      if(empty($result)){ echo("true"); }
      else { echo("false"); }
  }
  /**
   * This function is used to add new customer to the system
   */
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

          if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
          else { echo(json_encode(array('status'=>FALSE))); }
      }
  }

  /**
   * This function is used to load the change password screen
   */
  function loadChangePass()
  {
      $this->global['pageTitle'] = 'StarVish: Change Password';

      $this->loadViews("changePassword", $this->global, NULL, NULL);
  }

  /**
   * This function is used to change the password of the customer
   */
  function changePassword()
  {
      $this->load->library('form_validation');

      $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
      $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
      $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');

      if($this->form_validation->run() == FALSE)
      {
          $this->loadChangePass();
      }
      else
      {
          $oldPassword = $this->input->post('oldPassword');
          $newPassword = $this->input->post('newPassword');

          $resultPas = $this->customer_model->matchOldPassword($this->vendorId, $oldPassword);

          if(empty($resultPas))
          {
              $this->session->set_flashdata('nomatch', 'Your old password not correct');
              redirect('loadChangePass');
          }
          else
          {
              $customersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                              'updatedDtm'=>date('Y-m-d H:i:s'));

              $result = $this->customer_model->changePassword($this->vendorId, $customersData);

              if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
              else { $this->session->set_flashdata('error', 'Password updation failed'); }

              redirect('loadChangePass');
          }
      }
  }
  /**
   * Page not found : error 404
   */
  function pageNotFound()
  {
      $this->global['pageTitle'] = 'StarVish: 404 - Page Not Found';

      $this->loadViews("404", $this->global, NULL, NULL);
  }

  /**
   * This function used to show login history
   * @param number $customerId : This is customer id
   */
  function loginHistoy($customerId = NULL)
  {
      if($this->isAdmin() == TRUE)
      {
          $this->loadThis();
      }
      else
      {
          $customerId = ($customerId == NULL ? $this->session->customerdata("customerId") : $customerId);

          $searchText = $this->input->post('searchText');
          $fromDate = $this->input->post('fromDate');
          $toDate = $this->input->post('toDate');

          $data["customerInfo"] = $this->customer_model->getcustomerInfoById($customerId);

          $data['searchText'] = $searchText;
          $data['fromDate'] = $fromDate;
          $data['toDate'] = $toDate;

          $this->load->library('pagination');

          $count = $this->customer_model->loginHistoryCount($customerId, $searchText, $fromDate, $toDate);

          $returns = $this->paginationCompress ( "login-history/".$customerId."/", $count, 5, 3);

          $data['customerRecords'] = $this->customer_model->loginHistory($customerId, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);

          $this->global['pageTitle'] = 'StarVish: Customer Login History';

          $this->loadViews("loginHistory", $this->global, $data, NULL);
      }
  }

}
