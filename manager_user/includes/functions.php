<?php

if (!defined('_CODE')) {
  die('Access denied...');
}

function layouts($layoutName = 'header', $data = [])
{
  if (file_exists(_WEB_PATH_TEMPLATES . '/layout/' . $layoutName . '.php')) {
    require_once(_WEB_PATH_TEMPLATES . '/layout/' . $layoutName . '.php');
  }
}


// Ham kiem tra pt Get

function isGet()
{
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    return true;
  }
  return false;
}

// Ham kiem tra pt post

function isPost()
{
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    return true;
  }
  return false;
}

// ham filter loc du lieu
function filter()
{
  $filterArr = [];
  if (isGet()) {
    // duong link url
    // xu ly du lieu truoc khi hien thi ra
    if (!empty($_GET)) {
      foreach ($_GET as $key => $value) {
        //Loai bo script
        $key = strip_tags($key);
        if (is_array(($value))) {
          $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
          // < > & "
        } else {
          $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
      }
    }

  }

  if (isPost()) {
    // xu ly du lieu truoc khi hien thi ra
    if (!empty($_POST)) {
      foreach ($_POST as $key => $value) {
        $key = strip_tags($key);
        if (is_array($value)) {
          $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        } else {
          $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
      }
    }

  }
  
  return $filterArr;
}

// Kiem tra email

function isEmail($email)
{
  $checkEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
  return $checkEmail;
}


//Ham kiem tra kieu int

function isNumberInt($number)
{
  $checkNumber = filter_var($number, FILTER_VALIDATE_INT);
  return $checkNumber;
}

//Ham kiem tra kieu int

function isNumberFloat($number)
{
  $checkNumber = filter_var($number, FILTER_VALIDATE_FLOAT);
  return $checkNumber;
}


function isPhone($phone)
{
  $checkZero = false;
  if ($phone[0] == '0') {
    $checkZero = true;
    $phone = substr($phone, 1);
  }

  $checkNumber = false;
  if (isNumberInt($phone) && (strlen($phone) == 9)) {
    $checkNumber = true;
  }

  if ($checkNumber && $checkZero) {
    return true;
  }

  return false;
}
// thong bao loi

function getMsg($msg, $msg_type = 'success')
{
  echo '<div class="alert alert-' . $msg_type . '">';
  echo $msg;
  echo '</div>';
}

// Ham chuyen huong

function redirect($path = 'index.php')
{
  header("Location: $path");
  exit;
}

// ham check trang thai login 
function isLogin()
{
  $checkLogin = false;
  if (getSession('loginToken')) {
    $tokenLogin = getSession('loginToken');

    $queryToken = oneRaw("SELECT user_Id FROM loginToken WHERE token = '$tokenLogin' ");

    if (!empty($queryToken)) {
      $checkLogin = true;
    } else {
      removeSession('loginToken');
    }
  }
  return $checkLogin;
};
