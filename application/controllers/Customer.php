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
      $html =$this->loadViews("customer/customerlisting", $this->global, NULL , NULL);
  }

}
