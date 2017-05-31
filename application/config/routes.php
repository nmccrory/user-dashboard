<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'actions';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['signin'] = 'actions/login';
$route['register'] = 'actions/create';
$route['login'] = 'actions/logmein';
$route['post_message'] = 'actions/post_message';
$route['dashboard'] = 'actions/loadDashboard';
$route['users/show/(:any)'] = 'actions/showUser/$1';
$route['comment'] = 'actions/post_comment';
$route['users/edit'] = 'actions/editUser';
$route['logout'] = 'actions/logout';
?>