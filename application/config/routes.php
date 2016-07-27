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
$route['about-us'] = 'About';
$route['service/(:any)'] = 'Service';
$route['project/(:any)'] = 'Project';
$route['our-skills'] = 'Skills';
$route['jobs/(:any)'] = 'Jobs';
$route['jobs/apply/(:any)'] = 'jobs/job_application';
$route['admin/service'] = "admin/add_service";
$route['admin/sdil/profile'] = "admin/edit_admin_user";
$route['admin/contacts'] = "admin/get_all_contacts";
$route['admin/configuration'] = "admin/update_system_configuration";
$route['admin/uploadfav'] = "admin/upload_favicon";
$route['admin/uploadlogo'] = "admin/upload_logo";
$route['admin/uploadfavicon'] = "admin/upload_favicon_file";
$route['admin/uploadlogofile'] = "admin/upload_logo_file";
$route['admin/socialicon'] = "admin/social_icon_management";
$route['admin/addteam'] = "admin/add_team_members";
$route['admin/addtestimonials'] = "admin/add_testimonials";

$route['admin/add/project/category'] = "admin/add_project_category";
$route['admin/delete/project/category/(:any)'] = "admin/delete_project_category/$1";
$route['admin/update/project/category/(:any)'] = "admin/update_project_category/$1";

$route['admin/job/applicants'] = "admin/show_all_applicants";
$route['admin/job/applicant/delete/(:any)'] = "admin/delete_job_applicant/$1";
$route['admin/job/single/applicant/(:any)'] = "admin/show_single_applicant/$1";

$route['admin/add/company/skills'] = "admin/add_company_skills";
$route['admin/update/company/skill/(:any)'] = "admin/update_company_skills/$1";
$route['admin/delete/company/skill/(:any)'] = "admin/delete_company_skills/$1";

$route['admin/add/company/skill/category'] = "admin/add_company_skill_category";
$route['admin/update/company/skill/category/(:any)'] = "admin/update_company_skill_category/$1";
$route['admin/delete/company/skill/category/(:any)'] = "admin/delete_company_skill_category/$1";

$route['admin/add/job'] = "admin/add_job";
$route['admin/delete/job/(:any)'] = "admin/delete_job/$1";
$route['admin/update/job/(:any)'] = "admin/update_job/$1";
$route['admin/add/job/page'] = "admin/add_job_page";
$route['admin/update/job/page/(:any)'] = "admin/update_job_page/$1";


$route['admin/add/project'] = "admin/add_project";
$route['admin/delete/project/(:any)'] = "admin/delete_project/$1";
$route['admin/update/project/(:any)'] = "admin/update_project/$1";
$route['admin/upload/project/image/(:any)'] = "admin/upload_project_file/$1";
$route['admin/upload/project/photo/(:any)'] = "admin/upload_project_photo/$1";
$route['admin/project/image/delete/(:any)'] = 'admin/delete_project_image/$1';
$route['admin/add/project/page'] = "admin/add_project_page";
$route['admin/update/project/page/(:any)'] = "admin/update_project_page/$1";

$route['admin/add/service/page'] = "admin/add_service_page";
$route['admin/update/service/page/(:any)'] = "admin/edit_service_page/$1";

$route['admin/update/company/overview'] = "admin/update_company_overview";

$route['admin/add/partners'] = "admin/add_partners";
$route['admin/delete/partner/image/(:any)'] = 'admin/delete_partner_image/$1';
$route['admin/delete/partner/(:any)'] = 'admin/delete_partner/$1';

$route['admin/upload/partner/image/(:any)'] = "admin/upload_partner_image_file/$1";
$route['admin/upload/partner/photo/(:any)'] = "admin/upload_partner_photo/$1";

$route['admin/uploadmemberimg/(:any)'] = "admin/upload_member_image_file/$1";
$route['admin/uploadmemberphoto/(:any)'] = "admin/upload_member_photo/$1";
$route['signout'] = "admin/logout";
$route['admin/update/testimonial/(:any)'] = "admin/update_testimonial/$1";
$route['admin/sedit/(:any)'] = "admin/edit_service/$1";
$route['admin/delete/testimonial/(:any)'] = 'admin/delete_testimonial/$1';
$route['admin/sdelete/(:any)'] = 'admin/delete_service/$1';
$route['admin/socialedit/(:any)'] = "admin/social_icon_edit/$1";
$route['admin/updateteamember/(:any)'] = "admin/update_team_member/$1";
$route['admin/update/partner/(:any)'] = "admin/update_partners/$1";
$route['admin/socialdelete/(:any)'] = 'admin/social_icon_delete/$1';
$route['admin/cdelete/(:any)'] = 'admin/delete_contacts/$1';
$route['admin/imagedelete/(:any)'] = 'admin/delete_member_image/$1';
$route['admin/memberdelete/(:any)'] = 'admin/delete_member/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
