<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Customer_invoice extends BaseController{

  /**
   * This is default constructor of the class
   */
  public function __construct()
  {
      parent::__construct();
      $this->load->model('customer_invoice_model');
      $this->load->helper(array('form', 'url'));
      $this->isLoggedIn();
  }


  public function index(){
    $this->global['pageTitle'] = 'StarVish: Customer Invoice Listing';
    $result=$this->customer_invoice_model->customerinvoicelisting();
    if($result!=false)
      {$res['datas']=$result;
        $res['searchText']='';
      }
    else {
      $res['datas']='NA';
      $res['searchText']='';
    }

    $html =$this->loadViews("customer invoice/customer_invoice_listing", $this->global, $res , NULL);
  }

  //this function used to redirect to addcustomer or editcustomer dc based on the customer_id
    public function add_edit_customer_dc($id=NULL)
    {
      if($id==NULL)
      {
        $this->global['pageTitle'] = 'StarVish:Add Customer DC';
        $res['datas']=$this->customer_dc_model->fetch_customer();
      $this->loadViews("customer dc/add_customer_dc", $this->global, $res , NULL);
      }
      else {
        $this->global['pageTitle'] = 'StarVish:Edit Customer DC';
        $result['datas']=$this->customer_dc_model->fetch_customer_dc($id);
        $this->loadViews("customer dc/edit_customer_dc",$this->global,$result,NULL);
      }
    }

    //function for adding customer dc
        public function add_customer_dc()
        {
          $date=$this->input->post('date');
          $customer_id=$this->input->post('customer_id');
          $dc_no=$this->input->post('dc_no');
          $description=$this->input->post('description');

          $data=array('date'=>$date,'customer_id'=>$customer_id,'dc_no'=>$dc_no,
                      'description'=>$description);
            $result = FALSE;
            $result = $this->customer_dc_model->add_customer_dc($data);
            if($result == TRUE){
                $this->session->set_flashdata('success', 'New Customer DC created successfully');
            }
            else {
              $this->session->set_flashdata('error','Customer DC creation Failed!');
            }

            redirect('add_edit_customer_dc');
        }

        //function for editing customer DC Details
        public function update_customer_dc()
        {
          $date=$this->input->post('date');
          $customer_id=$this->input->post('customer_id');
          $dc_no=$this->input->post('dc_no');
          $description=$this->input->post('description');

          $datas=array('date'=>$date,'customer_id'=>$customer_id,'dc_no'=>$dc_no,
                      'description'=>$description );

          $result = FALSE;
            $result = $this->customer_dc_model->update_customer_dc($customer_id,$datas);
            if($result == true)
            {
                $this->session->set_flashdata('success', 'Customer DC updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Customer DC updation failed!');
            }
            redirect('customer_dc');
        }

        //function to delete customer dc
        public function delete_customer_dc($customer_id)
        {
          $result = $this->customer_dc_model->delete_customer_dc($customer_id);
          if($result == true)
          {
              $this->session->set_flashdata('success', 'Customer DC Deleted successfully');
          }
          else
          {
              $this->session->set_flashdata('error', 'Customer DC Deletion failed!');
          }
          redirect('customer_dc');
        }

        //function to list the quotations based on the search result

        public function customer_dc_listing()
        {
          $this->global['pageTitle'] = 'StarVish: Search';
          $searchText = $this->security->xss_clean($this->input->post('searchText'));

          $result=$this->customer_dc_model->customer_dc_listing($searchText);
          if($result!=FALSE)
          {
            $data['datas']=$result;
            $data['searchText'] = $searchText;
          }
          else {
            $data['datas']='NA';
            $data['searchText'] = $searchText;
          }

        $this->loadViews("customer dc/customer_dc_listing",$this->global,$data,NULL);
      }
}
