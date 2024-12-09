<?php

if (!defined('_CODE')) {
  die('Access denied...');
}

$filterAll = filter();
if (!empty($filterAll['id'])) {
  $userId = $filterAll['id'];

  // Kiem tra userid co ton tai trong db ko

  $userDetail = getRows("SELECT * FROM users WHERE id=$userId");
  // neu ton tai
  if ($userDetail>0) {
    $deleteToken = delete('loginToken', "user_Id= $userId");
      if ($deleteToken) {
        $deleteUser =  delete('users',"id= $userId" );
        if ($deleteUser) {
          setFlashData("msg", "Xóa thành công!");
              setFlashData('msg_type', 'success');
        } else {
          setFlashData("msg", "Lỗi hệ thống!");
              setFlashData('msg_type', 'danger');
        }
      }
  } 
  else {
    setFlashData("msg", "Id không tồn tại!");
              setFlashData('msg_type', 'danger');

  }
}

redirect('?module=users&action=list');