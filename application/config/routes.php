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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Auth Routes
$route['giris'] = 'Auth';
$route['cikis'] = 'Auth/logout';
$route['kurumsal-uye'] = 'Auth/register_corparate';

//Account Routes
$route['hesap'] = 'Account';
$route['ilanlarim'] = 'Account/my_products';

//Product Routes
$route['ilan-turu-sec'] = 'Product';
$route['bisiklet-ilani-olustur'] = 'Bicycle';
$route['kiyafet-ilani-olustur'] = 'Clothing';
$route['yedek-parca-ilani-olustur'] = 'Spare_part';
$route['ilanlar'] = 'Products';
$route['ilan/(:any)/(:any)'] = 'Products/product_detail/$1/$2';

//Edit Product Routes
$route['guncelle/ilan/bisiklet-ilani/(:any)/(:any)'] = 'Bicycle/edit_bicycle/$1/$2';
$route['guncelle/ilan/yedek-parca-ilani/(:any)/(:any)'] = 'Spare_part/edit_spare_part/$1/$2';

//Profile Routes
$route['profil/(:any)'] = 'Profile/index/$1';


