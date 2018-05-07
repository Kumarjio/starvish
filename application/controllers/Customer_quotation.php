<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

//customer master
class CustomerQuotation extends BaseController
{
  /**
   * This is default constructor of the class
   */
  public function __construct()
  {
      parent::__construct();
      $this->load->model('customer_model');
      $this->isLoggedIn();
  }


  /**
   * This function used to load the first screen of the customer
   */
  public function index()
  {
      $this->global['pageTitle'] = 'StarVish: Customer Quotation';
      $result=$this->customer_model->customerquote();
      if($result!=false)
        {$res['datas']=$result;
          $res['searchText']='';
        }
      else {
        $res['datas']='NA';
        $res['searchText']='';
      }

      $html =$this->loadViews("customer/customerlisting", $this->global, $res , NULL);
  }
  //this function used to redirect to addcustomerquote or editcustomerquote based on the quoteidid
      public function add_edit_customer_quote($id=NULL)
      {
        if($id==NULL)
        {
          $this->global['pageTitle'] = 'StarVish:Add Quotation';
          $cust_id=$this->customer_model->fetch_customers();
          $notes=$this->customer_model->fetch_notes();
          $data['customer']=$cust_id;
          $data['notes']=$notes;
        $this->loadViews("customer/add_customer_quotation", $this->global, $data , NULL);
        }
        else {
          $this->global['pageTitle'] = 'StarVish:Edit Quotation';
          $result['datas']=$this->customer_model->fetch_customer_quote($id);
          $this->loadViews("customer/edit_customer_quotation",$this->global,$result,NULL);
        }
      }

    //add customer quotation
  	public function add_customer_quote()
  {
    $customer_id=$this->input->post('customer_id');
    $quote_id=$this->input->post('quote_id');
    $description=$this->input->post('description');
    $note=$this->input->post('note');
    $product_id=$this->input->post('product_id');
    $p_description=$this->input->post('p_description');
    $hsn=$this->input->post('hsn');
    $quantity=$this->input->post('quantity');
    $unit_charge=$this->input->post('unit_charge');
    $total=$this->input->post('total');
    $tax=$this->input->post('tax');
  $current_date=date("Y-m-d");
    $datas=array('date'=>$current_date,'quote_id'=>$quote_id,'customer_id'=>$customer_id,
    'description'=>$description,'note'=>$note
                );
          $result = FALSE;
          $result = $this->customer_model->add_customer_quote($datas);
          if($result == TRUE){
  			foreach($product_id as $i => $n){
    $datas=array('quote_id'=>$quote_id,'product_id'=>$product_id[$i],'description'=>$p_description[$i],
    'hsn_sac'=>$hsn[$i],'quantity'=>$quantity[$i],'unit_charges'=>$unit_charge[$i],'total'=>$total[$i],'tax'=>$tax[$i]
  			);
   $result = $this->customer_model->add_customer_product($datas);
  if($result == FALSE)  {
  	$this->session->set_flashdata('error','Quotation creation failed!');
  	break;}
  			}
  		if($result == TRUE)  {
  			$this->session->set_flashdata('success', 'Quotation created successfully');
          }
  		}
          else {
            $this->session->set_flashdata('error','Quotation creation failed!');
          }
            redirect('customer_quotation');
  }


    //function to delete customer data
    public function delete_customer_quote($id)
    {
      $result=$this->customer_model->delete_customer_quote($id);
      if($result == true)
      {
       $this->session->set_flashdata('success', 'customer Quotation Deleted successfully');
     }
     else
     {
        $this->session->set_flashdata('error', 'customer Quotation Deletion failed!');
      }
      redirect('customer_quotation');
    }

    //function to list the customer based on the search result
  public function customer_listing()
  {
    $this->global['pageTitle'] = 'StarVish: Search';
    $searchText = $this->security->xss_clean($this->input->post('searchText'));
    $result=$this->customer_model->customer_listing($searchText);
    if($result!=FALSE)
    {
      $data['datas']=$result;
      $data['searchText'] = $searchText;
    }
    else {
      $data['datas']='NA';
      $data['searchText'] = $searchText;
    }
  $this->loadViews("customer/customerlisting",$this->global,$data,NULL);
  }


  }
