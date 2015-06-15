<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| 	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['scaffolding_trigger'] = 'scaffolding';
|
| This route lets you set a "secret" word that will trigger the
| scaffolding feature for added security. Note: Scaffolding must be
| enabled in the controller in which you intend to use it.   The reserved 
| routes must come before any wildcard or regular expression routes.
|
*/
$route['default_controller'] = "page";

$route['dashboard.html'] = "page/dashboard";
$route['log-out.html'] = "page/log_out";
$route['changepass.html'] = "member/changepass";
/* route member */
$route['member.html'] = "member";
$route['member-save.html'] = "member/save";
$route['member-(:num).html'] = "member/edit/$1";
$route['member-delete.html'] = "member/del";
$route['load-grid-member.html'] = "member/load_grid";
$route['load-grid-member-paging.html'] = "member/load_grid_paging";
$route['find-person.html(:any)'] = "member/find_member";
/* route payment */
$route['payment.html'] = "payment";
/*load grid user*/
$route['user.html'] = "user";
$route['user-save.html'] = "user/save";
$route['user-(:num).html'] = "user/edit/$1";
$route['user-delete.html'] = "user/del";
$route['load-grid-user.html'] = "user/load_grid";
$route['load-grid-user-paging.html'] = "user/load_grid_paging";
/*end load grid user*/
$route['scaffolding_trigger'] = "";
$route['(:any)'] = "page"  ;


/* End of file routes.php */
/* Location: ./system/application/config/routes.php */