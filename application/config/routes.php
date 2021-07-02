<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'student';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['grid/(:any)'] = 'Student/studentData';
$route['student-data'] = 'Student/student_details';
$route['edit'] = 'Student/edit';
$route['save'] = 'Student/save';