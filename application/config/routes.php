<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|.......
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = "login";
$route['404_override'] = 'error';

$route['upload']='vendor/upload';
$route['do_upload']='vendor/do_upload';

/****************Customer MASTER******************/

$route['customer_master']='customer';
$route['add_edit_customer']='customer/add_edit_customer';
$route['add_edit_customer/(:any)']='customer/add_edit_customer/$1';
$route['update_customer']='customer/update_customer';
$route['add_customer']='customer/add_customer';
$route['delete_customer/(:any)']='customer/delete_customer/$1';
$route['customer_listing']='customer/customer_listing';
$route['customer_quotation']='customer/customer_quotation';
$route['quotation_search']='customer/quotation_search';
$route['add_edit_customer_quote']='customer/add_edit_customer_quote';
$route['add_edit_customer_quote/(:any)']='customer/add_edit_customer_quote/$1';
$route['update_customer_quote']='customer/update_customer_quote';
$route['add_customer_quote']='customer/add_customer_quote';
$route['delete_customer_quote/(:any)']='customer/delete_customer_quote/$1';
$route['generate_pdf/(:any)']='customer/generate_pdf/$1';
$route['customer_quotation_view/(:any)']='customer/customer_quotation_view/$1';

/****************vendor MASTER******************/
$route['vendor_master']='vendor';
$route['add_edit_vendor']='vendor/add_edit_vendor';
$route['add_edit_vendor/(:any)']='vendor/add_edit_vendor/$1';
$route['update_vendor']='vendor/update_vendor';
$route['add_vendor']='vendor/add_vendor';
$route['delete_vendor/(:any)']='vendor/delete_vendor/$1';
$route['vendor_listing']='vendor/vendor_listing';

/****************Note MASTER******************/

$route['note_master']='note';
$route['add_edit_note']='note/add_edit_note';
$route['add_edit_note/(:any)']='note/add_edit_note/$1';
$route['update_note']='note/update_note';
$route['add_note']='note/add_note';
$route['delete_note/(:any)']='note/delete_note/$1';
$route['note_listing']='note/note_listing';

/****************Customer PO******************/

$route['customer_po']='customer_po';
$route['add_edit_customer_po']='customer_po/add_edit_customer_po';
$route['add_edit_customer_po/(:any)']='customer_po/add_edit_customer_po/$1';
$route['update_customer_po']='customer_po/update_customer_po';
$route['add_customer_po']='customer_po/add_customer_po';
$route['delete_customer_po/(:any)']='customer_po/delete_customer_po/$1';
$route['customer_po_listing']='customer_po/customer_po_listing';

/****************vendor QUOTATION******************/
$route['vendor_quotation']='vendorquotation';
$route['add_edit_vendor_quotation']='vendorquotation/add_edit_vendor_quotation';
$route['add_edit_vendor_quotation/(:any)']='vendorquotation/add_edit_vendor_quotation/$1';
$route['update_vendor_quotation']='vendorquotation/update_vendor_quotation';
$route['add_vendor_quotation']='vendorquotation/add_vendor_quotation';
$route['delete_vendor_quotation/(:any)']='vendorquotation/delete_vendor_quotation/$1';
$route['vendor_quotation_listing']='vendorquotation/vendor_quotation_listing';


/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['logout'] = 'user/logout';
$route['userListing'] = 'user/userListing';
$route['addNew'] = "user/addNew";

$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['login-history'] = "user/loginHistoy";
$route['login-history/(:num)'] = "user/loginHistoy/$1";
$route['login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
