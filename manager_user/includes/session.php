<?php

if (!defined('_CODE')) {
  die('Access denied...');
}

//session  ddeer guwir duwx lieuej giwa cac phien lam viec

// Ham gan session

function setSession($key, $value)
{
  return $_SESSION[$key] = $value;
}

function getSession($key = '')
{
  // Nếu $key không rỗng và tồn tại trong $_SESSION, trả về giá trị tương ứng
  if (empty($key)) {
    return $_SESSION;
  } else {
    if (isset($_SESSION[$key])) {
      return $_SESSION[$key];
    }
  }
}

// Ham xoa session
function removeSession($key = '')
{
  // Nếu có truyền $key và $key tồn tại trong $_SESSION
  if (empty($key)) {
    session_destroy();
    return true;
  } else {
    if (isset($_SESSION[$key])) {
      unset($_SESSION[$key]); // Xóa phần tử trong $_SESSION
      return true; // Trả về true khi xóa thành công
    }
  }
}



//  Flash data de lay va xoa luon du lieu do di
// Ham gan flash data 
function setFlashData($key, $value)
{
  $key = 'flash_' . $key;
  return setSession($key, $value);
}


// Ham gan flash data 
function getFlashData($key)
{
  $key = 'flash_' . $key;
  $data = getSession($key);
  removeSession($key);

  return $data ?? ''; // Trả về chuỗi rỗng nếu $data là null
}

