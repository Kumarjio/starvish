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

    $html =$this->loadViews("customer po/customer_po_listing", $this->global, $res , NULL);

  }

  //this function used to redirect to addvendor or editvendor quotation based on the vendor_quote_id
    public function add_edit_customer_po($id=NULL)
    {
      if($id==NULL)
      {
        $this->global['pageTitle'] = 'StarVish:Add Customer PO';
        $res['datas']=$this->customer_po_model->fetch_customer();
      $this->loadViews("customer po/add_customer_po", $this->global, $res , NULL);
      }
      else {
        $this->global['pageTitle'] = 'StarVish:Edit Customer PO';
        $result['datas']=$this->customer_po_model->fetch_customer_po($id);
        $this->loadViews("customer po/edit_customer_po",$this->global,$result,NULL);
      }
    }

    //function for adding customer po
        public function add_customer_po()
        {
          $date=$this->input->post('date');
          $customer_id=$this->input->post('customer_id');
          $po_id=$this->input->post('po_id');
          $description=$this->input->post('description');
        /*  $attachment=$this->input->post('attachment');
    	   $config = array(	//file upload
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
    	$filePath=$this->upload->data('full_path');*/

          $data=array('date'=>$date,'customer_id'=>$customer_id,'po_id'=>$po_id,
                      'description'=>$description);
            $result = FALSE;
            $result = $this->customer_po_model->add_customer_po($data);
            if($result == TRUE){
                $this->session->set_flashdata('success', 'New Customer PO created successfully');
            }
            else {
              $this->session->set_flashdata('error','Customer PO creation Failed!');
            }

            redirect('add_edit_customer_po');
        }

        //function for editing vendor Quotation Details
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
            $result = $this->customer_po_model->update_customer_po($customer_id,$datas);
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

        //function to delete vendor Quotation
        public function delete_customer_po($customer_id)
        {
          $result = $this->customer_po_model->delete_customer_po($customer_id);
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

        $this->loadViews("customer po/customer_po_listing",$this->global,$data,NULL);
      }
}
