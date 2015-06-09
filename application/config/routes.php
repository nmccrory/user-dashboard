<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'actions';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['signin'] = 'actions/login';
$route['register'] = 'actions/create';
$route['login'] = 'actions/logmein';
?>