<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Vendorquotation extends BaseController{

  /**
   * This is default constructor of the class
   */
  public function __construct()
  {
      parent::__construct();
      $this->load->model('vendor_quotation_model');
      $this->isLoggedIn();
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
}
