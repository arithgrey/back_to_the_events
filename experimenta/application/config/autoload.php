<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$autoload['packages'] = array(APPPATH.'third_party');
$autoload['libraries'] = array( 'session' ,  'user_agent');
$autoload['helper'] = array('html', 'url',  'generalhelp' );
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array("enidmodel");
