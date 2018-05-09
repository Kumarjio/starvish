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
      $this->load->model('vendor_model');
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
//function to delete the vendor quotation files
public function delete_vendor_quotation_file($file,$id)
{
  $this->global['pageTitle'] = 'StarVish: Delete vendor Quotation';
  $path=$this->vendor_quotation_model->select_vendor_quotation_file($file);
  unlink($path[0]->file_path);
  $del=$this->vendor_quotation_model->delete_vendor_quotation_file($file);
  $count=$this->vendor_quotation_model->count_files($id);
  $data=array('no_of_files'=>$count);
  $this->vendor_quotation_model->update_vendor_quotation($id,$data);

  redirect('add_edit_vendor_quotation/'.$id);
}
  //this function used to redirect to addvendor or editvendor quotation based on the vendor_quote_id
    public function add_edit_vendor_quotation($id=NULL)
    {
      if($id==NULL)
      {
        $this->global['pageTitle'] = 'StarVish:Add Vendor Quotation';
        $res['datas']=$this->vendor_quotation_model->fetch_vendor();
        $res['vendor']=$this->vendor_model->vendorlisting();
      $this->loadViews("quotation/add_vendor_quotation", $this->global, $res , NULL);
      }
      else {
        $this->global['pageTitle'] = 'StarVish:Edit Vendor Quotation';
        $result['datas']=$this->vendor_quotation_model->fetch_vendor_quotation($id);
        $files=$this->vendor_quotation_model->fetch_vendor_quotation_files($id);
        if($files!=false)
        {
          $result['files']=$files;
        }
        else {
          $result['files']='NA';
        }
        $this->loadViews("quotation/edit_vendor_quotation",$this->global,$result,NULL);
      }

    }

    //function to view the quotation
    public function view_vendor_quotation($id)
    {
      $this->global['pageTitle'] = 'StarVish:View Vendor Quotation';
      $vendor_quote=$this->vendor_quotation_model->view_vendor_quotation($id);
      $vendor_files=$this->vendor_quotation_model->fetch_vendor_quotation_files($id);
      if($vendor_quote!=false)
      {
        $res['datas']=$vendor_quote;
        if($vendor_files!=false)
        {
          $res['files']=$vendor_files;
        }
        else {
          $res['files']='NA';
        }
      }
      else {
        $res['datas']='NA';
      }
      $this->loadViews("quotation/view_vendor_quotation",$this->global,$res,NULL);

    }

    //function for adding vendor quotation
        public function add_vendor_quotation()
        {
          $date=$this->input->post('date');
          $vendor_quote_id=$this->input->post('vendor_quote_id');
          $vendor_id=$this->input->post('vendor_id');
          $total_amt=$this->input->post('total_amt');
          $description=$this->input->post('description');
    	   $config = array(	//file upload
      'upload_path' => 'uploads/quotation/vendor/',
      'allowed_types' => "*",
      'overwrite' => TRUE,
      'max_size' => "8048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)

      );

      $data=array();
      if($this->input->post('fileSubmit') && !empty($_FILES['attachment']['name'])){
           $filesCount = count($_FILES['attachment']['name']);
           $data=array('date'=>$date,'vendor_quote_id'=>$vendor_quote_id,'vendor_id'=>$vendor_id,
                       'description'=>$description,'total_amt'=>$total_amt
               );

             $result = FALSE;
             $result = $this->vendor_quotation_model->add_vendor_quotation($data);

           for($i = 0; $i < $filesCount; $i++){
               $_FILES['userFile']['name'] = $_FILES['attachment']['name'][$i];
               $_FILES['userFile']['type'] = $_FILES['attachment']['type'][$i];
               $_FILES['userFile']['tmp_name'] = $_FILES['attachment']['tmp_name'][$i];
               $_FILES['userFile']['error'] = $_FILES['attachment']['error'][$i];
               $_FILES['userFile']['size'] = $_FILES['attachment']['size'][$i];

               $config['file_name']=$vendor_id.'-'.$vendor_quote_id.'-'.$i;
               $this->load->library('upload', $config);
               $this->upload->initialize($config);
               if($this->upload->do_upload('userFile')){
                   $fileData = $this->upload->data();
                   $uploadData[$i]['vendor_quote_id']=$vendor_quote_id;
                   $uploadData[$i]['file_name'] = $fileData['file_name'];
                   $uploadData[$i]['file_path'] = $fileData['full_path'];
               }
             }
             print_r($uploadData);
             if(!empty($uploadData)){
               //Insert file information into the database
               $insert = $this->vendor_quotation_model->insert_file($uploadData);
               //echo'<scriptr>console.log('.$insert.');</scriptr>';
               //updating files count
               $count=$this->vendor_quotation_model->count_files($vendor_quote_id);
               $data=array('no_of_files'=>$count);
               $this->vendor_quotation_model->update_vendor_quotation($vendor_quote_id,$data);

               $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
               $this->session->set_flashdata('status',$statusMsg);
           }
           }

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
          $total_amt=$this->input->post('total_amt');
          $config = array(	//file upload
       'upload_path' => 'uploads/quotation/vendor/',
       'allowed_types' => "*",
       'overwrite' => TRUE,
       'max_size' => "8048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)

       );

       $data=array();
       if($this->input->post('fileSubmit') && !empty($_FILES['attachment']['name'])){
            $filesCount = count($_FILES['attachment']['name']);

            $count=$this->vendor_quotation_model->count_files($vendor_quote_id);
            $init=$count;
            $count=$count+$filesCount;

            $data=array('date'=>$date,'vendor_quote_id'=>$vendor_quote_id,'vendor_id'=>$vendor_id,
                        'description'=>$description,'total_amt'=>$total_amt
                );

              $result = FALSE;
              $result = $this->vendor_quotation_model->update_vendor_quotation($vendor_quote_id,$data);

            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['attachment']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['attachment']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['attachment']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['attachment']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['attachment']['size'][$i];

                $config['file_name']=$vendor_id.'-'.$vendor_quote_id.'-'.$init++;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['vendor_quote_id']=$vendor_quote_id;
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['file_path'] = $fileData['full_path'];
                }
              }
              print_r($uploadData);
              if(!empty($uploadData)){
                //Insert file information into the database
                $insert = $this->vendor_quotation_model->insert_file($uploadData);
                //updating files count
                $count=$this->vendor_quotation_model->count_files($vendor_quote_id);
                $data=array('no_of_files'=>$count);
                $this->vendor_quotation_model->update_vendor_quotation($vendor_quote_id,$data);

                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }
            }


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
