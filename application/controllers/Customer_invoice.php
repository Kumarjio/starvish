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

    $html =$this->loadViews("customer_invoice/customer_invoice_listing", $this->global, $res , NULL);
  }

  //this function used to redirect to addcustomerinvoice or editcustomerinvoice based on the invoice id
      public function add_edit_customer_invoice($id=NULL)
      {
        if($id==NULL)
        {
          $this->global['pageTitle'] = 'StarVish:Add Invoice';
          $cust_id=$this->customer_invoice_model->fetch_customers();
          $data['customer']=$cust_id;
        $this->loadViews("customer_invoice/add_customer_invoice", $this->global, $data , NULL);
        }
        else {
          $this->global['pageTitle'] = 'StarVish:Edit Invoice';
          $result['datas']=$this->customer_invoice_model->fetch_customer_invoice($id);
          $result['data']=$this->customer_invoice_model->fetch_customer_invoice_product($id);
          $this->loadViews("customer_invoice/edit_customer_invoice",$this->global,$result,NULL);
        }
      }

    //add customer invoice
    public function add_customer_invoice()
  {
    $date=$this->input->post('date');
    $customer_id=$this->input->post('customer_id');
    $invoice_id=$this->input->post('invoice_id');
    $po_id=$this->input->post('po_id');
    $srn_dc=$this->input->post('srn_dc');
    $payment_mode=$this->input->post('payment_mode');

    $p_description=$this->input->post('p_description');
    $hsn=$this->input->post('hsn');
    $quantity=$this->input->post('quantity');
    $unit_charge=$this->input->post('unit_charge');
    $total=$this->input->post('total');
    $cgst_percent=$this->input->post('cgst_percent');
    $cgst_amt=$this->input->post('cgst_amt');
    $sgst_percent=$this->input->post('sgst_percent');
    $sgst_amt=$this->input->post('sgst_amt');
    $igst_percent=$this->input->post('igst_percent');
    $igst_amt=$this->input->post('igst_amt');


    $datas=array('date'=>$date,'customer_id'=>$customer_id,'invoice_id'=>$invoice_id,
    'po_id'=>$po_id,'srn_dc'=>$srn_dc,'payment_mode'=>$payment_mode);
          $result = FALSE;
          $result = $this->customer_invoice_model->add_customer_invoice($datas);

        if($result == TRUE){
        foreach($p_description as $i => $n){
    $datas=array('invoice_id'=>$invoice_id,'description'=>$p_description[$i],
    'hsn_sac'=>$hsn[$i],'quantity'=>$quantity[$i],'unit_charges'=>$unit_charge[$i],'total'=>$total[$i],'cgst_percent'=>$cgst_percent[$i],
    'cgst_amt'=>$cgst_amt[$i],'sgst_percent'=>$sgst_percent[$i],'sgst_amt'=>$sgst_amt[$i],'igst_percent'=>$igst_percent[$i],'igst_amt'=>$igst_amt[$i]
        );
   $result = $this->customer_invoice_model->add_customer_invoice_product($datas);
  if($result == FALSE)  {
    $this->session->set_flashdata('error','Invoice creation failed!');
    break;}
        }
      if($result == TRUE)  {
        $this->session->set_flashdata('success', 'Invoice created successfully');
          }
      }
          else {
            $this->session->set_flashdata('error','Invoice creation failed!');
          }
            redirect('customer_invoice');
  }

  //function for editing customer invoice Details
  public function update_customer_invoice()
  {
    $date=$this->input->post('date');
    $customer_id=$this->input->post('customer_id');
    $invoice_id=$this->input->post('invoice_id');
    $po_id=$this->input->post('po_id');
    $srn_dc=$this->input->post('srn_dc');
    $payment_mode=$this->input->post('payment_mode');

    $p_description=$this->input->post('p_description');
    $hsn=$this->input->post('hsn');
    $quantity=$this->input->post('quantity');
    $unit_charge=$this->input->post('unit_charge');
    $total=$this->input->post('total');
    $cgst_percent=$this->input->post('cgst_percent');
    $cgst_amt=$this->input->post('cgst_amt');
    $sgst_percent=$this->input->post('sgst_percent');
    $sgst_amt=$this->input->post('sgst_amt');
    $igst_percent=$this->input->post('igst_percent');
    $igst_amt=$this->input->post('igst_amt');

    $datas=array('date'=>$date,'customer_id'=>$customer_id,'invoice_id'=>$invoice_id,
    'po_id'=>$po_id,'srn_dc'=>$srn_dc,'payment_mode'=>$payment_mode
                );
          $result = FALSE;
          $result = $this->customer_invoice_model->update_customer_invoice($invoice_id,$datas);
          if($result == TRUE){
        foreach($p_description as $i => $n){
    $data=array('invoice_id'=>$invoice_id,'description'=>$p_description[$i],
    'hsn_sac'=>$hsn[$i],'quantity'=>$quantity[$i],'unit_charges'=>$unit_charge[$i],'total'=>$total[$i],'cgst_percent'=>$cgst_percent[$i],
    'cgst_amt'=>$cgst_amt[$i],'sgst_percent'=>$sgst_percent[$i],'sgst_amt'=>$sgst_amt[$i],'igst_percent'=>$igst_percent[$i],'igst_amt'=>$igst_amt[$i]
        );
   $result = $this->customer_invoice_model->update_customer_invoice_product($invoice_id,$data);

  if($result == FALSE)  {
  $this->session->set_flashdata('error','Invoice creation failed!');
  break;}
    }
    if($result == true)
      {
          $this->session->set_flashdata('success', 'Customer Invoice updated successfully');
      }
      else
      {
          $this->session->set_flashdata('error', 'Customer Invoice updation failed!');
      }
      redirect('customer_invoice');
  }
  }

    //function to delete customer invoice
    public function delete_customer_invoice($invoice_id)
    {
      $result=$this->customer_invoice_model->delete_customer_invoice($invoice_id);
      if($result == true)
      {
       $this->session->set_flashdata('success', 'Customer Invoice Deleted successfully');
     }
     else
     {
        $this->session->set_flashdata('error', 'Customer Invoice Deletion failed!');
      }
      redirect('customer_invoice');
    }

    //function to list the customer based on the search result
  public function customer_invoice_listing()
  {
    $this->global['pageTitle'] = 'StarVish: Search';
    $searchText = $this->security->xss_clean($this->input->post('searchText'));
    $result=$this->customer_invoice_model->customer_invoice_listing($searchText);
    if($result!=FALSE)
    {
      $data['datas']=$result;
      $data['searchText'] = $searchText;
    }
    else {
      $data['datas']='NA';
      $data['searchText'] = $searchText;
    }
  $this->loadViews("customer_invoice/customer_invoice_listing",$this->global,$data,NULL);
  }


  }
