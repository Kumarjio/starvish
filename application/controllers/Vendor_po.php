<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Vendor_po extends BaseController{

  /**
   * This is default constructor of the class
   */
  public function __construct()
  {
      parent::__construct();
    //  $this->load->library('upload');
      $this->load->model('vendor_po_model');
      $this->load->helper(array('form', 'url'));
      $this->isLoggedIn();
  }


  public function index(){
    $this->global['pageTitle'] = 'StarVish: Vendor PO Listing';
    $result=$this->vendor_po_model->vendorpolisting();
    if($result!=false)
      {$res['datas']=$result;
        $res['searchText']='';
      }
    else {
      $res['datas']='NA';
      $res['searchText']='';
    }

    $html =$this->loadViews("vendor po/vendor_po_listing", $this->global, $res , NULL);

  }

  //this function used to redirect to addvendor or editvendor quotation based on the vendor_quote_id
    public function add_edit_vendor_po($id=NULL)
    {
      if($id==NULL)
      {
        $this->global['pageTitle'] = 'StarVish:Add Vendor PO';
        $res['datas']=$this->vendor_po_model->fetch_vendor();
      $this->loadViews("vendor po/add_vendor_po", $this->global, $res , NULL);
      }
      else {
        $this->global['pageTitle'] = 'StarVish:Edit Vendor PO';
        $result['datas']=$this->vendor_po_model->fetch_vendor_po($id);
        $this->loadViews("vendor po/edit_vendor_po",$this->global,$result,NULL);
      }
    }

    //function for adding vendor po
        public function add_vendor_po()
        {
          $date=$this->input->post('date');
          $vendor_id=$this->input->post('vendor_id');
          $po_id=$this->input->post('po_id');
          $description=$this->input->post('description');

          $data=array('date'=>$date,'vendor_id'=>$vendor_id,'po_id'=>$po_id,
                      'description'=>$description);
            $result = FALSE;
            $result = $this->vendor_po_model->add_vendor_po($data);
            if($result == TRUE){
                $this->session->set_flashdata('success', 'New Vendor PO created successfully');
            }
            else {
              $this->session->set_flashdata('error','Vendor PO creation Failed!');
            }

            redirect('add_edit_vendor_po');
        }

        //function for editing vendor Quotation Details
        public function update_vendor_po()
        {
          $date=$this->input->post('date');
          $vendor_id=$this->input->post('vendor_id');
          $po_id=$this->input->post('po_id');
          $description=$this->input->post('description');

          $datas=array('date'=>$date,'vendor_id'=>$vendor_id,'po_id'=>$po_id,
                      'description'=>$description );

          $result = FALSE;
            $result = $this->vendor_po_model->update_vendor_po($vendor_id,$datas);
            if($result == true)
            {
                $this->session->set_flashdata('success', 'Vendor PO updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Vendor PO updation failed!');
            }
            redirect('vendor_po');
        }

        //function to delete vendor Quotation
        public function delete_vendor_po($vendor_id)
        {
          $result = $this->vendor_po_model->delete_vendor_po($vendor_id);
          if($result == true)
          {
              $this->session->set_flashdata('success', 'Vendor PO Deleted successfully');
          }
          else
          {
              $this->session->set_flashdata('error', 'Vendor PO Deletion failed!');
          }
          redirect('vendor_po');
        }

        //function to list the quotations based on the search result

        public function vendor_po_listing()
        {
          $this->global['pageTitle'] = 'StarVish: Search';
          $searchText = $this->security->xss_clean($this->input->post('searchText'));

          $result=$this->vendor_po_model->vendor_po_listing($searchText);
          if($result!=FALSE)
          {
            $data['datas']=$result;
            $data['searchText'] = $searchText;
          }
          else {
            $data['datas']='NA';
            $data['searchText'] = $searchText;
          }

        $this->loadViews("vendor po/vendor_po_listing",$this->global,$data,NULL);
      }
}
