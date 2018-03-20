<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Vendorquotation extends BaseController{

  /**
   * This is default constructor of the class
   */
  public function __construct()
  {
      parent::__construct();
      $this->load->library('upload');
      $this->load->model('vendor_quotation_model');
      $this->load->helper(array('form', 'url'));
      $this->isLoggedIn();
  }
  function upload()
  {
    $this->global['pageTitle'] = 'StarVish: Upload ';
    $this->loadViews("quotation/upload", $this->global, array('error' => ' ' ), NULL);
  }

  public function do_upload(){
    $this->global['pageTitle'] = 'StarVish: Upload ';
  $config = array(
  'upload_path' => 'uploads/quotation/vendor/',
  'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
  'overwrite' => TRUE,
  'max_size' => "8048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
);
  $this->load->library('upload', $config);
  $this->upload->initialize($config);
  if($this->upload->do_upload('userfile'))
    {
      $data = array('upload_data' => $this->upload->data());
      $this->loadViews("quotation/upload_success", $this->global,$data, NULL);
    }
  else
    {
      $error = array('error' => $this->upload->display_errors());
      $this->loadViews("quotation/upload", $this->global,$error, NULL);
    }

  }

  public function index(){
    $this->global['pageTitle'] = 'StarVish: Vendor Quotation Listing';
    $result=$this->vendor_quotation_model->vendorquotationlisting();
    if($result!=false)
      {$res['datas']=$result;
        $res['searchText']='';
      }
    else {
      $res['datas']='NA';
      $res['searchText']='';
    }

    $html =$this->loadViews("quotation/vendorquotationlisting", $this->global, $res , NULL);

  }

  //this function used to redirect to addvendor or editvendor quotation based on the vendor_quote_id
    public function add_edit_vendor_quotation($id=NULL)
    {
      if($id==NULL)
      {
        $this->global['pageTitle'] = 'StarVish:Add Vendor Quotation';
        $res['datas']=$this->vendor_quotation_model->fetch_vendor();
      $this->loadViews("quotation/add_vendor_quotation", $this->global, $res , NULL);
      }
      else {
        $this->global['pageTitle'] = 'StarVish:Edit Vendor Quotation';
        $result['datas']=$this->vendor_quotation_model->fetch_vendor_quotation($id);
        $this->loadViews("quotation/edit_vendor_quotation",$this->global,$result,NULL);
      }
    }

    //function for adding vendor quotation
        public function add_vendor_quotation()
        {
          $date=$this->input->post('date');
          $vendor_quote_id=$this->input->post('vendor_quote_id');
          $vendor_id=$this->input->post('vendor_id');
          $description=$this->input->post('description');
    	   $config = array(	//file upload
      'upload_path' => 'uploads/quotation/vendor/',
      'file_name'=>$vendor_id.'-'.$vendor_quote_id,
      'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
      'overwrite' => TRUE,
      'max_size' => "8048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)

      );
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      $this->upload->do_upload('attachment');
        $attachment=$this->upload->data('orig_name');
    	$filePath=$this->upload->data('full_path');

          $data=array('date'=>$date,'vendor_quote_id'=>$vendor_quote_id,'vendor_id'=>$vendor_id,
                      'description'=>$description,'attachment'=>$attachment ,'file_path'=>$filePath
    				  );
            $result = FALSE;
            $result = $this->vendor_quotation_model->add_vendor_quotation($data);
            if($result == TRUE){
                $this->session->set_flashdata('success', 'New Vendor Quotation created successfully');
            }
            else {
              $this->session->set_flashdata('error','Vendor Quotation creation Failed!');
            }

            redirect('add_edit_vendor_quotation');
        }

        //function for editing vendor Quotation Details
        public function update_vendor_quotation()
        {
          $date=$this->input->post('date');
          $vendor_quote_id=$this->input->post('vendor_quote_id');
          $vendor_id=$this->input->post('vendor_id');
          $description=$this->input->post('description');
           $config = array(   //attachment upload
          'upload_path' => 'uploads/quotation/vendor/',
          'file_name'=>$vendor_id.'-'.$vendor_quote_id,
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
        	{
          $datas=array('date'=>$date,'vendor_quote_id'=>$vendor_quote_id,'vendor_id'=>$vendor_id,
                      'description'=>$description

                      );
        	}
        	else{
          $datas=array('date'=>$date,'vendor_quote_id'=>$vendor_quote_id,'vendor_id'=>$vendor_id,
                      'description'=>$description,'attachment'=>$attachment ,'file_path'=>$filePath
                      );
        	}   $result = FALSE;
            $result = $this->vendor_quotation_model->update_vendor_quotation($vendor_id,$datas);
            if($result == true)
            {
                $this->session->set_flashdata('success', 'Vendor Quotation updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Vendor Quotation updation failed!');
            }
            redirect('vendor_quotation');
        }

        //function to delete vendor Quotation
        public function delete_vendor_quotation($vendor_quote_id)
        {
          $result = $this->vendor_quotation_model->delete_vendor_quotation($vendor_quote_id);
          if($result == true)
          {
              $this->session->set_flashdata('success', 'Vendor Quotation Deleted successfully');
          }
          else
          {
              $this->session->set_flashdata('error', 'Vendor Quotation Deletion failed!');
          }
          redirect('vendor_quotation');
        }

        //function to list the quotations based on the search result

        public function vendor_quotation_listing()
        {
          $this->global['pageTitle'] = 'StarVish: Search';
          $searchText = $this->security->xss_clean($this->input->post('searchText'));

          $result=$this->vendor_quotation_model->vendor_quotation_listing($searchText);
          if($result!=FALSE)
          {
            $data['datas']=$result;
            $data['searchText'] = $searchText;
          }
          else {
            $data['datas']='NA';
            $data['searchText'] = $searchText;
          }

        $this->loadViews("quotation/vendorquotationlisting",$this->global,$data,NULL);
        }
}
