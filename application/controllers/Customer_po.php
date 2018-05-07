<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Customer_po extends BaseController{

  /**
   * This is default constructor of the class
   */
  public function __construct()
  {
      parent::__construct();
      $this->load->library('upload');
      $this->load->model('customer_po_model');
      $this->load->helper(array('form', 'url'));
      $this->isLoggedIn();
  }
  /*function upload()
  {
    $this->global['pageTitle'] = 'StarVish: Upload ';
    $this->loadViews("customer po/upload", $this->global, array('error' => ' ' ), NULL);
  }

  public function do_upload(){
    $this->global['pageTitle'] = 'StarVish: Upload ';
  $config = array(
  'upload_path' => 'uploads/po/customer/',
  'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
  'overwrite' => TRUE,
  'max_size' => "8048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
);
  $this->load->library('upload', $config);
  $this->upload->initialize($config);
  if($this->upload->do_upload('userfile'))
    {
      $data = array('upload_data' => $this->upload->data());
      $this->loadViews("customer po/upload_success", $this->global,$data, NULL);
    }
  else
    {
      $error = array('error' => $this->upload->display_errors());
      $this->loadViews("customer po/upload", $this->global,$error, NULL);
    }

  }*/

  public function index(){
    $this->global['pageTitle'] = 'StarVish: Customer PO Listing';
    $result=$this->customer_po_model->customerpolisting();
    if($result!=false)
      {$res['datas']=$result;
        $res['searchText']='';
      }
    else {
      $res['datas']='NA';
      $res['searchText']='';
    }

    $html =$this->loadViews("customer_po/customer_po_listing", $this->global, $res , NULL);

  }

  //this function used to redirect to addcustomer or editcustomer quotation based on the po_id
    public function add_edit_customer_po($id=NULL)
    {
      if($id==NULL)
      {
        $this->global['pageTitle'] = 'StarVish:Add Customer PO';
        $res['datas']=$this->customer_po_model->fetch_customer();
        $res['customer']=$this->customer_po_model->all_customer();
      $this->loadViews("customer_po/add_customer_po", $this->global, $res , NULL);
      }
      else {
        $this->global['pageTitle'] = 'StarVish:Edit Customer PO';
        $result['datas']=$this->customer_po_model->fetch_customer_po($id);
        $result['customer']=$this->customer_po_model->all_customer();
        $this->loadViews("customer_po/edit_customer_po",$this->global,$result,NULL);
      }
    }

    //function for adding customer po
        public function add_customer_po()
        {
          $date=$this->input->post('date');
          $customer_id=$this->input->post('customer_id');
          $po_id=$this->input->post('po_id');
          $description=$this->input->post('description');
          $total_amt=$this->input->post('total_price');
          //file uploading
         //$attachment=$this->input->post('attachment');
    	   $config = array(	//file upload
      'upload_path' => 'uploads/po/customer/',
      //'file_name'=>$customer_id.'-'.$po_id,
      'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
      'overwrite' => TRUE,
      'max_size' => "8048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)

      );
      $data=array();

      if($this->input->post('fileSubmit') && !empty($_FILES['attachment']['name'])){
           $filesCount = count($_FILES['attachment']['name']);
           $data=array('date'=>$date,'customer_id'=>$customer_id,'total_amt'=>$total_amt,'po_id'=>$po_id,
                      'description'=>$description,'no_of_files'=>$filesCount);

             $result = FALSE;
             $result = $this->customer_po_model->add_customer_po($data);

           for($i = 0; $i < $filesCount; $i++){
               $_FILES['userFile']['name'] = $_FILES['attachment']['name'][$i];
               $_FILES['userFile']['type'] = $_FILES['attachment']['type'][$i];
               $_FILES['userFile']['tmp_name'] = $_FILES['attachment']['tmp_name'][$i];
               $_FILES['userFile']['error'] = $_FILES['attachment']['error'][$i];
               $_FILES['userFile']['size'] = $_FILES['attachment']['size'][$i];

               $config['file_name']=$customer_id.'-'.$po_id.'-'.$i;
               $this->load->library('upload', $config);
               $this->upload->initialize($config);
               if($this->upload->do_upload('userFile')){
                   $fileData = $this->upload->data();
                   $uploadData[$i]['po_id']=$po_id;
                   $uploadData[$i]['file_name'] = $fileData['file_name'];
                   $uploadData[$i]['file_path'] = $fileData['full_path'];
               }
             }
             print_r($uploadData);
             if(!empty($uploadData)){

               //Insert file information into the database
               $insert = $this->customer_po_model->insert_file($uploadData);
               $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
               $this->session->set_flashdata('statusMsg',$statusMsg);
           }
           }


            if($result == TRUE){
                $this->session->set_flashdata('success', 'New Customer PO created successfully');
            }
            else {
              $this->session->set_flashdata('error','Customer PO creation Failed!');
            }

            redirect('add_edit_customer_po');
        }
        //function for editing customer Quotation Details

        public function update_customer_po()
        {
          $date=$this->input->post('date');
          $customer_id=$this->input->post('customer_id');
          $po_id=$this->input->post('po_id');
          $description=$this->input->post('description');
        /*   $config = array(   //attachment upload
          'upload_path' => 'uploads/po/customer/',
          'file_name'=>$customer_id.'-'.$po_id,
          'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
          'overwrite' => TRUE,
          'max_size' => "8048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        );
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          $this->upload->do_upload('attachment');
        	$attachment=$this->upload->data('orig_name');
        	$filePath=$this->upload->data('full_path');
        if($attachment=="") //check empty file input
        	{*/
          $datas=array('date'=>$date,'customer_id'=>$customer_id,'po_id'=>$po_id,
                      'description'=>$description

                      );
        	/*}
        	else{
          $datas=array('date'=>$date,'customer_id'=>$customer_id,'po_id'=>$po_id,
                      'description'=>$description,'attachment'=>$attachment ,'file_path'=>$filePath
                      );
        	}  */
          $result = FALSE;
            $result = $this->customer_po_model->update_customer_po($po_id,$datas);
            if($result == true)
            {
                $this->session->set_flashdata('success', 'Customer PO updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Customer PO updation failed!');
            }
            redirect('customer_po');
        }

        //function to delete customer Quotation
        public function delete_customer_po($po_id)
        {
          $result = $this->customer_po_model->delete_customer_po($po_id);
          if($result == true)
          {
              $this->session->set_flashdata('success', 'Customer PO Deleted successfully');
          }
          else
          {
              $this->session->set_flashdata('error', 'Customer PO Deletion failed!');
          }
          redirect('customer_po');
        }

        //function to list the quotations based on the search result

        public function customer_po_listing()
        {
          $this->global['pageTitle'] = 'StarVish: Search';
          $searchText = $this->security->xss_clean($this->input->post('searchText'));

          $result=$this->customer_po_model->customer_po_listing($searchText);
          if($result!=FALSE)
          {
            $data['datas']=$result;
            $data['searchText'] = $searchText;
          }
          else {
            $data['datas']='NA';
            $data['searchText'] = $searchText;
          }

        $this->loadViews("customer_po/customer_po_listing",$this->global,$data,NULL);
      }
}
