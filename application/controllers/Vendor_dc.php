<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Vendor_dc extends BaseController{

  /**
   * This is default constructor of the class
   */
  public function __construct()
  {
      parent::__construct();
      $this->load->model('vendor_dc_model');
      $this->load->helper(array('form', 'url'));
      $this->isLoggedIn();
  }


  public function index(){
    $this->global['pageTitle'] = 'StarVish: Vendor DC Listing';
    $result=$this->vendor_dc_model->vendordclisting();
    if($result!=false)
      {$res['datas']=$result;
        $res['searchText']='';
      }
    else {
      $res['datas']='NA';
      $res['searchText']='';
    }

    $html =$this->loadViews("vendor dc/vendor_dc_listing", $this->global, $res , NULL);
  }

  //this function used to redirect to addvendor or editvendor dc based on the vendor_id
    public function add_edit_vendor_dc($id=NULL)
    {
      if($id==NULL)
      {
        $this->global['pageTitle'] = 'StarVish:Add Vendor DC';
        $res['datas']=$this->vendor_dc_model->fetch_vendor();
      $this->loadViews("vendor dc/add_vendor_dc", $this->global, $res , NULL);
      }
      else {
        $this->global['pageTitle'] = 'StarVish:Edit Vendor DC';
        $result['datas']=$this->vendor_dc_model->fetch_vendor_dc($id);
        $this->loadViews("vendor dc/edit_vendor_dc",$this->global,$result,NULL);
      }
    }

    //function for adding vendor dc
        public function add_vendor_dc()
        {
          $date=$this->input->post('date');
          $vendor_id=$this->input->post('vendor_id');
          $dc_no=$this->input->post('dc_no');
          $description=$this->input->post('description');

          $data=array('date'=>$date,'vendor_id'=>$vendor_id,'dc_no'=>$dc_no,
                      'description'=>$description);
            $result = FALSE;
            $result = $this->vendor_dc_model->add_vendor_dc($data);
            if($result == TRUE){
                $this->session->set_flashdata('success', 'New Vendor DC created successfully');
            }
            else {
              $this->session->set_flashdata('error','Vendor DC creation Failed!');
            }

            redirect('add_edit_vendor_dc');
        }

        //function for editing vendor DC Details
        public function update_vendor_dc()
        {
          $date=$this->input->post('date');
          $vendor_id=$this->input->post('vendor_id');
          $dc_no=$this->input->post('dc_no');
          $description=$this->input->post('description');

          $datas=array('date'=>$date,'vendor_id'=>$vendor_id,'dc_no'=>$dc_no,
                      'description'=>$description );

          $result = FALSE;
            $result = $this->vendor_dc_model->update_vendor_dc($vendor_id,$datas);
            if($result == true)
            {
                $this->session->set_flashdata('success', 'Vendor DC updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Vendor DC updation failed!');
            }
            redirect('vendor_dc');
        }

        //function to delete vendor dc
        public function delete_vendor_dc($vendor_id)
        {
          $result = $this->vendor_dc_model->delete_vendor_dc($vendor_id);
          if($result == true)
          {
              $this->session->set_flashdata('success', 'Vendor DC Deleted successfully');
          }
          else
          {
              $this->session->set_flashdata('error', 'Vendor DC Deletion failed!');
          }
          redirect('vendor_dc');
        }

        //function to list the quotations based on the search result

        public function vendor_dc_listing()
        {
          $this->global['pageTitle'] = 'StarVish: Search';
          $searchText = $this->security->xss_clean($this->input->post('searchText'));

          $result=$this->vendor_dc_model->vendor_dc_listing($searchText);
          if($result!=FALSE)
          {
            $data['datas']=$result;
            $data['searchText'] = $searchText;
          }
          else {
            $data['datas']='NA';
            $data['searchText'] = $searchText;
          }

        $this->loadViews("vendor dc/vendor_dc_listing",$this->global,$data,NULL);
      }
}
