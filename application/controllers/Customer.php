<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

//customer master
class Customer extends BaseController
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
      $this->global['pageTitle'] = 'StarVish: Customer Master';
      $result=$this->customer_model->customerlisting();
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
  //this function used to redirect to addcustomer or editcustomer based on the customerid
    public function add_edit_customer($id=NULL)
    {
      if($id==NULL)
      {
        $this->global['pageTitle'] = 'StarVish:Add Customer';
      $this->loadViews("customer/add_customer", $this->global, NULL , NULL);
      }
      else {
        $this->global['pageTitle'] = 'StarVish:Edit Customer';
        $result['datas']=$this->customer_model->fetch_customer($id);
        $this->loadViews("customer/edit_customer",$this->global,$result,NULL);
      }
    }

  /**
   * This function is used to add new customer to the system
   */
public function add_customer()
{
  $customer_id=$this->input->post('customer_id');
  $company_name=$this->input->post('company_name');
  $address1=$this->input->post('address1');
  $address2=$this->input->post('address2');
  $contactperson1=$this->input->post('contact_person1');
  $contactperson2=$this->input->post('contact_person2');
  $designation1=$this->input->post('designation1');
  $designation2=$this->input->post('designation2');
  $email1=$this->input->post('email1');
  $email2=$this->input->post('email2');
  $contactno1=$this->input->post('contact_no1');
  $contactno2=$this->input->post('contact_no2');
  $bankname=$this->input->post('bank_name');
  $accountname=$this->input->post('account_name');
  $accountnumber=$this->input->post('account_number');
  $ifsccode=$this->input->post('ifsc_code');
  $gstin=$this->input->post('gstin');

  $config = array(	//file upload
 'upload_path' => 'uploads/customer/',
 'file_name'=>$customer_id.'-'.$company_name,
 'allowed_types' => "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
 'overwrite' => TRUE,
 'max_size' => "8048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
 );
 $this->load->library('upload', $config);
 $this->upload->initialize($config);
 $this->upload->do_upload('attachment');
   $attachment=$this->upload->data('orig_name');
 $filePath=$this->upload->data('full_path');

  $datas=array('customer_id'=>$customer_id,'company_name'=>$company_name,'address1'=>$address1,
              'address2'=>$address2,'contact_person1'=>$contactperson1,'contact_person2'=>$contactperson2,
              'designation1'=>$designation1,'designation2'=>$designation2,'email1'=>$email1,'email2'=>$email2,
              'contact_no1'=>$contactno1,'contact_no2'=>$contactno2,'gstin'=>$gstin,'bank_name'=>$bankname,
              'account_name'=>$accountname,'account_number'=>$accountnumber,'ifsc_code'=>$ifsccode,
              'attachment'=>$attachment,'file_path'=>$filePath
              );
        $result = FALSE;
        $result = $this->customer_model->add_customer($datas);
        if($result == TRUE){
            $this->session->set_flashdata('success', 'New customer created successfully');
        }
        else {
          $this->session->set_flashdata('error','customer creation Failed!');
        }

          redirect('add_edit_customer');
}

//function to edit customer

  public function update_customer(){
    $customer_id=$this->input->post('customer_id');
    $cname=$this->input->post('company_name');
    $address1=$this->input->post('address1');
    $address2=$this->input->post('address2');
    $contact_person1=$this->input->post('contact_person1');
    $contact_person2=$this->input->post('contact_person2');
    $desg1=$this->input->post('designation1');
    $desg2=$this->input->post('designation2');
    $email1=$this->input->post('email1');
    $email2=$this->input->post('email2');
    $contact_no1=$this->input->post('contact_no1');
    $contact_no2=$this->input->post('contact_no2');
    $bank=$this->input->post('bank_name');
    $bank_acc_name=$this->input->post('account_name');
    $bank_acc_no=$this->input->post('account_number');
    $ifsc_code=$this->input->post('ifsc_code');
    $gstin=$this->input->post('gstin');


    $config = array(   //attachment upload
      'upload_path' => 'uploads/customer/',
      'file_name'=>$customer_id.'-'.$cname,
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
      $datas=array('customer_id'=>$customer_id,'company_name'=>$cname,'address1'=>$address1,
             'address2'=>$address2,'contact_person1'=>$contact_person1,'contact_person2'=>$contact_person2,
             'designation1'=>$desg1,'designation2'=>$desg2,'email1'=>$email1,'email2'=>$email2,
             'contact_no1'=>$contact_no1,'contact_no2'=>$contact_no2,'gstin'=>$gstin,'bank_name'=>$bank,
             'account_name'=>$bank_acc_name,'account_number'=>$bank_acc_no,'ifsc_code'=>$ifsc_code,
             );
    }
    else{
      $datas=array('customer_id'=>$customer_id,'company_name'=>$cname,'address1'=>$address1,
             'address2'=>$address2,'contact_person1'=>$contact_person1,'contact_person2'=>$contact_person2,
             'designation1'=>$desg1,'designation2'=>$desg2,'email1'=>$email1,'email2'=>$email2,
             'contact_no1'=>$contact_no1,'contact_no2'=>$contact_no2,'gstin'=>$gstin,'bank_name'=>$bank,
             'account_name'=>$bank_acc_name,'account_number'=>$bank_acc_no,'ifsc_code'=>$ifsc_code,
             'file_path'=>$filePath,'attachment'=>$attachment
         );
       }
   $result = FALSE;
   $result = $this->customer_model->update_customer($customer_id,$datas);
   if($result == true)
   {
       $this->session->set_flashdata('success', 'customer updated successfully');
   }
   else
   {
       $this->session->set_flashdata('error', 'customer updation failed!');
   }

      $this->customer_model->update_customer($customer_id,$datas);
      redirect('customer_master');
  }

  //function to delete customer data
  public function delete_customer($id)
  {
    $result=$this->customer_model->delete_customer($id);
    if($result == true)
    {
     $this->session->set_flashdata('success', 'customer Deleted successfully');
   }
   else
   {
      $this->session->set_flashdata('error', 'customer Deletion failed!');
    }
    redirect('customer_master');
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
//customer quotation
  public function customer_quotation()
  {

      $this->global['pageTitle'] = 'StarVish: Customer Quotation';
      $result=$this->customer_model->customerquote();
      if($result!=false)
        {
			$res['datas']=$result;
			$res['searchText']='';
        }
      else {
        $res['datas']='NA';
        $res['searchText']='';
      }

      $html =$this->loadViews("customer/customer_quotation", $this->global, $res , NULL);
  }
 //function to list the quotation based on the search result
  public function quotation_search()
  {
    $this->global['pageTitle'] = 'StarVish: Search';
    $searchText = $this->security->xss_clean($this->input->post('searchText'));
    $result=$this->customer_model->customer_quote($searchText);
    if($result!=FALSE)
    {
      $data['datas']=$result;
      $data['searchText'] = $searchText;
    }
    else {
      $data['datas']='NA';
      $data['searchText'] = $searchText;
    }
  $this->loadViews("customer/customer_quotation",$this->global,$data,NULL);
  }

//this function used to redirect to addcustomerquote or editcustomerquote based on the quoteidid
    public function add_edit_customer_quote($id=NULL)
    {
      if($id==NULL)
      {
        $this->global['pageTitle'] = 'StarVish:Add Quotation';
      $this->loadViews("customer/add_customer_quotation", $this->global, NULL , NULL);
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
  $product_id=$this->input->post('product_id');
  $p_description=$this->input->post('p_description');
  $hsn=$this->input->post('hsn');
  $quantity=$this->input->post('quantity');
  $unit_charge=$this->input->post('unit_charge');
  $total=$this->input->post('total');
$current_date=date("Y-m-d");
  $datas=array('date'=>$current_date,'quote_id'=>$quote_id,'customer_id'=>$customer_id,
  'description'=>$description
              );
        $result = FALSE;
        $result = $this->customer_model->add_customer_quote($datas);
        if($result == TRUE){
			foreach($product_id as $i => $n){
  $datas=array('quote_id'=>$quote_id,'product_id'=>$product_id[$i],'description'=>$p_description[$i],
  'hsn/sac'=>$hsn[$i],'quantity'=>$quantity[$i],'unit_charges'=>$unit_charge[$i],'total'=>$total[$i]
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


// Function to view the generated Quotation
  public function customer_quotation_view($id)
  {
    $this->global['pageTitle'] = 'StarVish:View Quotation';
    $result=$this->customer_model->customer_quotation_view($id);
    $company=$this->customer_model->our_details();
    $customer=$this->customer_model->customer_details($id);
    if($result!=false)
    {
      $data['datas']=$result;
      $data['company']=$company;
      $data['customer']=$customer;
    }
    else {
      $data['datas']='NA';
    }
    $this->loadViews("customer/customer_quotation_view",$this->global,$data,NULL);

  }


  //generating pdf
  public function generate_pdf($id)
{ini_set('memory_limit', '256M');
        // load library
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        // retrieve data from model
        $this->global['pageTitle'] = 'StarVish:View Quotation';
        $result=$this->customer_model->customer_quotation_view($id);
        $company=$this->customer_model->our_details();
        $customer=$this->customer_model->customer_details($id);
        if($result!=false)
        {
          $data['datas']=$result;
          $data['company']=$company;
          $data['customer']=$customer;
        }
        else {
          $data['datas']='NA';
        }

        // boost the memory limit if it's low ;)
        $html = $this->load->view('customer/customer_quotation_pdf',$data,true);//test
        // render the view into HTML
        $pdf->WriteHTML($html);
        // write the HTML into the PDF
        $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
}
}
