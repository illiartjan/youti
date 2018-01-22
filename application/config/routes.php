<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'pages/view';
$route['(:any)']='pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['payment/showIndex'] = 'posts/showIndex';
$route['payment/checkout'] ='payment/checkout';
$route['payment/bloginit']='payment/bloginit';