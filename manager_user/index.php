<!-- Route -->
<?php
//khoi tao session
session_start();

//ket noi den 
require_once('config.php');
require_once('./includes/connect.php');
require_once('./includes/functions.php');
require_once('./includes/database.php');
require_once('./includes/session.php');


$module = _MODULE;
$action = _ACTION;

// echo _CODE;

if (!empty($_GET['module'])) {

  if (is_string($_GET['module'])) {
    $module = trim($_GET['module']);
    // echo $module;
  }
}


if (!empty($_GET['action'])) {

  if (is_string($_GET['action'])) {
    $action = trim($_GET['action']);
    // echo $action;
  }
}

// Duong dan, dieu huong
$path = 'modules/' . $module . '/' . $action . '.php';

if (file_exists($path)) {
  require_once($path);

} else {
  require_once('modules/error/404.php');
}