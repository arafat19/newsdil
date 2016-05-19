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
|	http://codeigniter.com/user_guide/general/routing.html
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
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['admin/service'] = "admin/add_service_page";
$route['admin/profile'] = "admin/edit_admin_user";
$route['admin/contacts'] = "admin/get_all_contacts";
$route['admin/configuration'] = "admin/update_system_configuration";
$route['admin/uploadfav'] = "admin/upload_favicon";
$route['admin/uploadlogo'] = "admin/upload_logo";
$route['admin/uploadfavicon'] = "admin/upload_favicon_file";
$route['admin/uploadlogofile'] = "admin/upload_logo_file";
$route['admin/socialicon'] = "admin/social_icon_management";
$route['admin/addteam'] = "admin/add_team_members";
$route['admin/addtestimonials'] = "admin/add_testimonials";
$route['admin/uploadmemberimg/(:any)'] = "admin/upload_member_image_file/$1";
$route['admin/uploadmemberphoto/(:any)'] = "admin/upload_member_photo/$1";
$route['signout'] = "admin/logout";
$route['admin/update/testimonial/(:any)'] = "admin/update_testimonial/$1";
$route['admin/sedit/(:any)'] = "admin/edit_service/$1";
$route['admin/delete/testimonial/(:any)'] = 'admin/delete_testimonial/$1';
$route['admin/sdelete/(:any)'] = 'admin/delete_service/$1';
$route['admin/socialedit/(:any)'] = "admin/social_icon_edit/$1";
$route['admin/updateteamember/(:any)'] = "admin/update_team_member/$1";
$route['admin/socialdelete/(:any)'] = 'admin/social_icon_delete/$1';
$route['admin/cdelete/(:any)'] = 'admin/delete_contacts/$1';
$route['admin/imagedelete/(:any)'] = 'admin/delete_member_image/$1';
$route['admin/memberdelete/(:any)'] = 'admin/delete_member/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
