<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class User extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'StarVish: Dashboard';
        $data['emp_no']=$this->user_model->count_employee();
        $data['cust_no']=$this->user_model->count_customer();
        $data['vendor_no']=$this->user_model->count_vendor();
        $this->loadViews("dashboard", $this->global, $data , NULL);
    }

    public function view_user($id)
    {
      $this->global['pageTitle'] = 'StarVish: view Employee';
      $res['datas']=$this->user_model->get_details($id);
      $files=$this->user_model->get_files($id);
      $res['details']=$this->user_model->get_id($id);
      if($files!=false)
      $res['files']=$files;
      else {
        $res['files']='NA';
      }
      $this->loadViews("view_user", $this->global, $res, NULL);
    }


    /**
     * This function is used to load the user list
     */
    function userListing()
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
            $count = $this->user_model->userListingCount($searchText);
			      $returns = $this->paginationCompress ( "userListing/", $count, 10 );
            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);
          $this->global['pageTitle'] = 'StarVish: User Listing';
            $this->loadViews("users", $this->global, $data, NULL);
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
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();

            $this->global['pageTitle'] = 'StarVish: Add New User';

            $this->loadViews("addNew", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }

    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('emp_id','Employee ID','trim|required');
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
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
                $this->addNew();
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

                $userInfo = array('employee_id'=>$emp_id,'email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'name'=> $name,
                                    'mobile'=>$mobile, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));

                $emp_info=array('id'=>$emp_id,'name'=>$name,
                                'address1'=>$address1,'address2'=>$address2,
                                'designation'=>$desg,'email'=>$email,
                                'contact_no'=>$mobile, 'DOJ'=>$doj,
                                'pan_no'=>$pan,'bank_name'=>$bank,
                                'account_number'=>$bank_acc, 'ifsc_code'=>$ifsc,
                                 'aadhaar_no'=>$aadhaar);

                $this->load->model('user_model');

                $result = $this->user_model->addNewUser($userInfo,$emp_info);

                $config = array(	//file upload
              'upload_path' => 'uploads/employee/',
              'allowed_types' => "*",
              'overwrite' => TRUE,
              'max_size' => "8048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)

              );

                   //file uploading
                        $data=array();
                      if($this->input->post('fileSubmit') && !empty($_FILES['attachment']['name'])){
                             $filesCount = count($_FILES['attachment']['name']);

                               for($i = 0; $i < $filesCount; $i++){
                                   $_FILES['userFile']['name'] = $_FILES['attachment']['name'][$i];
                                   $_FILES['userFile']['type'] = $_FILES['attachment']['type'][$i];
                                   $_FILES['userFile']['tmp_name'] = $_FILES['attachment']['tmp_name'][$i];
                                   $_FILES['userFile']['error'] = $_FILES['attachment']['error'][$i];
                                   $_FILES['userFile']['size'] = $_FILES['attachment']['size'][$i];
                                   $num=mt_rand(0,9999);
                                   $config['file_name']=$emp_id.'-'.$num;
                                   $this->load->library('upload', $config);
                                   $this->upload->initialize($config);
                                   if($this->upload->do_upload('userFile')){
                                       $fileData = $this->upload->data();
                                       $uploadData[$i]['employee_id']=$emp_id;
                                       $uploadData[$i]['file_name'] = $fileData['file_name'];
                                       $uploadData[$i]['file_path'] = $fileData['full_path'];
                                   }
                                 }

                                 if(!empty($uploadData)){
                                   //Insert file information into the database
                                   $insert = $this->user_model->insert_file($uploadData);
                                   $count=$this->user_model->count_files($emp_id);
                                   $data=array('no_of_files'=>$count);
                                   $this->vendor_model->update_user($emp_id,$data);

                                   $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                                   $this->session->set_flashdata('statusMsg',$statusMsg);
                               }
                               }

///

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }

                redirect('addNew');
            }
        }
    }


    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }

            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            $emp_id=$data['userInfo'][0]->employee_id;
            $data['datas']=$this->user_model->get_details($emp_id);
            $files=$this->user_model->get_files($emp_id);
            if($files!=false)
            $data['files']=$files;
            else {
              $data['files']='NA';
            }
            $this->global['pageTitle'] = 'StarVish: Edit User';

            $this->loadViews("editOld", $this->global, $data, NULL);
        }
    }


    /**
     * This function is used to edit the user information
     */
    function editUser()
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
                $this->editOld($userId);
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

              $userInfo = array();

                if(empty($password))
                {
                    $userInfo = array('employee_id'=>$emp_id,'email'=>$email, 'roleId'=>$roleId, 'name'=>$name,
                                    'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                    $userInfo = array('employee_id'=>$emp_id,'email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId,
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

                $result = $this->user_model->editUser($userInfo, $userId,$emp_id,$emp_info);

                $config = array(	//file upload
              'upload_path' => 'uploads/employee/',
              'allowed_types' => "*",
              'overwrite' => TRUE,
              'max_size' => "8048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)

              );

                   //file uploading
                        $data=array();
                      if($this->input->post('fileSubmit') && !empty($_FILES['attachment']['name'])){
                             $filesCount = count($_FILES['attachment']['name']);

                               for($i = 0; $i < $filesCount; $i++){
                                   $_FILES['userFile']['name'] = $_FILES['attachment']['name'][$i];
                                   $_FILES['userFile']['type'] = $_FILES['attachment']['type'][$i];
                                   $_FILES['userFile']['tmp_name'] = $_FILES['attachment']['tmp_name'][$i];
                                   $_FILES['userFile']['error'] = $_FILES['attachment']['error'][$i];
                                   $_FILES['userFile']['size'] = $_FILES['attachment']['size'][$i];
                                   $num=mt_rand(0,9999);
                                   $config['file_name']=$emp_id.'-'.$num;
                                   $this->load->library('upload', $config);
                                   $this->upload->initialize($config);
                                   echo '<script>alert(1);</script>';
                                   if($this->upload->do_upload('userFile')){
                                       $fileData = $this->upload->data();
                                       $uploadData[$i]['employee_id']=$emp_id;
                                       $uploadData[$i]['file_name'] = $fileData['file_name'];
                                       $uploadData[$i]['file_path'] = $fileData['full_path'];
                                   }
                                 }

                                 if(!empty($uploadData)){
                                   //Insert file information into the database
                                   $insert = $this->user_model->insert_file($uploadData);
                                   $count=$this->user_model->count_files($emp_id);
                                   $data=array('no_of_files'=>$count);
                                   $this->vendor_model->update_user($emp_id,$data);
                                   $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                                   $this->session->set_flashdata('statusMsg',$statusMsg);
                               }
                               }

///
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }

                redirect('editOld/'.$userId);
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));

            $result = $this->user_model->deleteUser($userId, $userInfo);

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
     * This function is used to change the password of the user
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

            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);

            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect('loadChangePass');
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));

                $result = $this->user_model->changePassword($this->vendorId, $usersData);

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
     * @param number $userId : This is user id
     */
    function loginHistoy($userId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $userId = ($userId == NULL ? $this->session->userdata("userId") : $userId);

            $searchText = $this->input->post('searchText');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $data["userInfo"] = $this->user_model->getUserInfoById($userId);

            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;

            $this->load->library('pagination');

            $count = $this->user_model->loginHistoryCount($userId, $searchText, $fromDate, $toDate);

            $returns = $this->paginationCompress ( "login-history/".$userId."/", $count, 5, 3);

            $data['userRecords'] = $this->user_model->loginHistory($userId, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'StarVish: User Login History';

            $this->loadViews("loginHistory", $this->global, $data, NULL);
        }
    }
}

?>
