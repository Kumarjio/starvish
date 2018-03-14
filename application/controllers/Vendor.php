<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Vendor extends BaseController
{
  /**
   * This is default constructor of the class
   */
  public function __construct()
  {
      parent::__construct();
      $this->load->model('vendor_model');
      $this->isLoggedIn();
  }
  /**
   * This function used to load the first screen of the user
   */
  public function index()
  {
      $this->global['pageTitle'] = 'StarVish: Vendor Master';
      $result=$this->vendor_model->vendorlisting();
      if($result!=false)
        $res['datas']=$result;
      else {
        $res['datas']='NA';
      }
      $html =$this->loadViews("vendor/vendorlisting", $this->global, $res , NULL);
  }

}
