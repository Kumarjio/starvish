<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Vendor_invoice extends BaseController{

  /**
   * This is default constructor of the class
   */
  public function __construct()
  {
      parent::__construct();
      $this->load->library('upload');
      $this->load->model('vendor_invoice_model');
      $this->load->helper(array('form', 'url'));
      $this->isLoggedIn();
  }

  //Function to list individual invoice
  public function view_vendor_invoice($invoice_id)
  {
    $this->global['pageTitle'] = 'StarVish: Vendor Invoice Listing';
    $invoice_details=$this->vendor_invoice_model->view_vendor_invoice($invoice_id);
    $invoice_files=$this->vendor_invoice_model->view_vendor_files($invoice_id);
    if($invoice_details!=false)
    {
      $res['datas']=$invoice_details;
      if($invoice_files!=false)
      {
        $res['files']=$invoice_files;
      }
      else {
        $res['files']='NA';
      }
    }
    else {
      $res['datas']='NA';
    }
    $this->loadViews("vendor_invoice/view_vendor_invoice", $this->global, $res , NULL);

  }

  public function index(){
    $this->global['pageTitle'] = 'StarVish: Vendor Invoice Listing';
    $result=$this->vendor_invoice_model->vendorinvoicelisting();
    if($result!=false)
      {$res['datas']=$result;
        $res['searchText']='';
      }
    else {
      $res['datas']='NA';
      $res['searchText']='';
    }

    $html =$this->loadViews("vendor_invoice/vendor_invoice_listing", $this->global, $res , NULL);
  }

  //this function used to redirect to addvendorinvoice or editvendorinvoice based on the invoice id
      public function add_edit_vendor_invoice($id=NULL)
      {
        if($id==NULL)
        {
          $this->global['pageTitle'] = 'StarVish:Add Invoice';
          $cust_id=$this->vendor_invoice_model->fetch_vendors();
          $data['vendor']=$cust_id;
          $this->loadViews("vendor_invoice/add_vendor_invoice", $this->global, $data , NULL);
        }
        else {
          $this->global['pageTitle'] = 'StarVish:Edit Invoice';
          $result['datas']=$this->vendor_invoice_model->fetch_vendor_invoice($id);
          $files=$this->vendor_invoice_model->view_vendor_files($id);
          if($files!=false)
            $result['files']=$files;
          else {
            $result['files']='NA';
          }
          $this->loadViews("vendor_invoice/edit_vendor_invoice",$this->global,$result,NULL);
        }
      }

    //add vendor invoice
    public function add_vendor_invoice()
   {
    $date=$this->input->post('date');
    $vendor_id=$this->input->post('vendor_id');
    $vendor_name=$this->input->post('vendor_name');
    $invoice_id=$this->input->post('invoice_id');
    $total=$this->input->post('total');
    $cgst=$this->input->post('cgst');
    $sgst=$this->input->post('sgst');
    $igst=$this->input->post('igst');
    $grant_total=$this->input->post('grant_total');
    $config = array(	//file upload
    'upload_path' => 'uploads/invoice/vendor/',
    //'file_name'=>$vendor_id.'-'.$invoice_id,
    'allowed_types' => "*",
    'overwrite' => TRUE,
    'max_size' => "8048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
    );

    $data=array();

    if($this->input->post('fileSubmit') && !empty($_FILES['attachment']['name'])){
         $filesCount = count($_FILES['attachment']['name']);

         $data=array('date'=>$date,'vendor_id'=>$vendor_id,'vendor_name'=>$vendor_name,'invoice_id'=>$invoice_id,
       'total'=>$total,'cgst'=>$cgst,'sgst'=>$sgst,'igst'=>$igst,'grant_total'=>$grant_total);

           $result = FALSE;
           $result = $this->vendor_invoice_model->add_vendor_invoice($data);

         for($i = 0; $i < $filesCount; $i++){
             $_FILES['userFile']['name'] = $_FILES['attachment']['name'][$i];
             $_FILES['userFile']['type'] = $_FILES['attachment']['type'][$i];
             $_FILES['userFile']['tmp_name'] = $_FILES['attachment']['tmp_name'][$i];
             $_FILES['userFile']['error'] = $_FILES['attachment']['error'][$i];
             $_FILES['userFile']['size'] = $_FILES['attachment']['size'][$i];

             $config['file_name']=$vendor_id.'-'.$invoice_id.'-'.$i;
             $this->load->library('upload', $config);
             $this->upload->initialize($config);
             if($this->upload->do_upload('userFile')){
                 $fileData = $this->upload->data();
                 $uploadData[$i]['invoice_id']=$invoice_id;
                 $uploadData[$i]['file_name'] = $fileData['file_name'];
                 $uploadData[$i]['file_path'] = $fileData['full_path'];
             }
           }
           print_r($uploadData);
           if(!empty($uploadData)){

             //Insert file information into the database
             $insert = $this->vendor_invoice_model->insert_file($uploadData);
             $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
             $this->session->set_flashdata('statusMsg',$statusMsg);
         }
      }
      if($result == TRUE){
          $this->session->set_flashdata('success', 'New Vendor Invoice created successfully');
      }
      else {
        $this->session->set_flashdata('error','Vendor Invoice creation Failed!');
      }

      redirect('add_edit_vendor_invoice');
    }


  //function for editing vendor invoice Details
  public function update_vendor_invoice()
  {
    $date=$this->input->post('date');
    $vendor_id=$this->input->post('vendor_id');
    $vendor_name=$this->input->post('vendor_name');
    $invoice_id=$this->input->post('invoice_id');
    $total=$this->input->post('total');
    $cgst=$this->input->post('cgst');
    $sgst=$this->input->post('sgst');
    $igst=$this->input->post('igst');
    $grant_total=$this->input->post('grant_total');
    $config = array(	//file upload
    'upload_path' => 'uploads/invoice/vendor/',
    //'file_name'=>$customer_id.'-'.$po_id,
    'allowed_types' => "*",
    'overwrite' => TRUE,
    'max_size' => "8048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
    );

    $data=array();

    if($this->input->post('fileSubmit') && !empty($_FILES['attachment']['name'])){
         $filesCount = count($_FILES['attachment']['name']);

         $data=array('date'=>$date,'vendor_id'=>$vendor_id,'vendor_name'=>$vendor_name,'invoice_id'=>$invoice_id,
       'total'=>$total,'cgst'=>$cgst,'sgst'=>$sgst,'igst'=>$igst,'grant_total'=>$grant_total);

           $result = FALSE;
           $result = $this->vendor_invoice_model->update_vendor_invoice($data);

         for($i = 0; $i < $filesCount; $i++){
             $_FILES['userFile']['name'] = $_FILES['attachment']['name'][$i];
             $_FILES['userFile']['type'] = $_FILES['attachment']['type'][$i];
             $_FILES['userFile']['tmp_name'] = $_FILES['attachment']['tmp_name'][$i];
             $_FILES['userFile']['error'] = $_FILES['attachment']['error'][$i];
             $_FILES['userFile']['size'] = $_FILES['attachment']['size'][$i];

             $config['file_name']=$vendor_id.'-'.$invoice_id.'-'.$i;
             $this->load->library('upload', $config);
             $this->upload->initialize($config);
             if($this->upload->do_upload('userFile')){
                 $fileData = $this->upload->data();
                 $uploadData[$i]['invoice_id']=$invoice_id;
                 $uploadData[$i]['file_name'] = $fileData['file_name'];
                 $uploadData[$i]['file_path'] = $fileData['full_path'];
             }
           }
           print_r($uploadData);
           if(!empty($uploadData)){

             //Insert file information into the database
             $insert = $this->vendor_invoice_model->insert_file($uploadData);
             $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
             $this->session->set_flashdata('statusMsg',$statusMsg);
          }

    if($result == true)
      {
          $this->session->set_flashdata('success', 'Vendor Invoice updated successfully');
      }
      else
      {
          $this->session->set_flashdata('error', 'Vendor Invoice updation failed!');
      }
    }
    $this->add_edit_vendor_invoice($invoice_id);
  }

    //function to delete vendor invoice
    public function delete_vendor_invoice($invoice_id)
    {
      $result=$this->vendor_invoice_model->delete_vendor_invoice($invoice_id);
      if($result == true)
      {
       $this->session->set_flashdata('success', 'Vendor Invoice Deleted successfully');
     }
     else
     {
        $this->session->set_flashdata('error', 'Vendor Invoice Deletion failed!');
      }
      redirect('vendor_invoice');
    }

    //function to list the vendor based on the search result
  public function vendor_invoice_listing()
  {
    $this->global['pageTitle'] = 'StarVish: Search';
    $searchText = $this->security->xss_clean($this->input->post('searchText'));
    $result=$this->vendor_invoice_model->vendor_invoice_listing($searchText);
    if($result!=FALSE)
    {
      $data['datas']=$result;
      $data['searchText'] = $searchText;
    }
    else {
      $data['datas']='NA';
      $data['searchText'] = $searchText;
    }
  $this->loadViews("vendor_invoice/vendor_invoice_listing",$this->global,$data,NULL);
  }


  }
