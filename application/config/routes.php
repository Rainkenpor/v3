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
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['aboutus'] = "aboutus";

$route['admin'] = 'admin/index';

$route['voicesurvey/(:any)'] = 'Appvoicesurvey/get_questions/$1';
$route['voicesurvey']['POST'] = 'Appvoicesurvey/save';

$route['training'] = 'training/index';

$route['digital-media'] = 'digitalmedia/index';

$route['digital-technology'] = 'digitaltechnology/index';

$route['expert-content'] = 'expertcontent/index';

$route['activations'] = 'activations/index';

$route['consulting'] = 'consulting/index';
$route['consulting/get'] = 'consulting/get_questions';
$route['consulting_save']['POST'] = 'consulting/save';

$route['blog/info/(:any)'] = 'blog/index/$1';
$route['blog/info/get_multi_blog/(:any)'] = 'blog/get_multi_blog/$1';
$route['blog']['POST'] = 'blog/save';
$route['blog/get'] = 'blog/get';
$route['blog/get_all'] = 'blog/get_all';
$route['blog/delete']['POST'] = 'blog/delete';
