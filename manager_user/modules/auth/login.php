<!-- dang nhap tai khoan -->
<?php

if (!defined('_CODE')) {
  die('Access denied...');
}

$data = [
  'pageTitle' => 'Đăng nhập'
];

layouts('header-login', $data);

// if (isLogin()) {
//   redirect('?module=home&action=dashboard ');
// }

// removeSession('loginToken');
if (isPost()) {
  $filterAll = filter();

  if (!empty(trim($filterAll['email'])) && !empty(trim($filterAll['password']))) {
    $email = $filterAll['email'];
    $password = $filterAll['password'];
    
    $userQuery = oneRaw("SELECT password, id , role FROM users WHERE email = '$email' ");

    if (!empty($userQuery)) {
      $passwordHash = $userQuery["password"];
      $userId = $userQuery["id"];
      $userRole = $userQuery["role"]; // Lấy role

      if (password_verify($password, $passwordHash)) {
        $tokenLogin = sha1(uniqid() . time());

        $dataInsert = [
          'user_Id' => $userId,
          'token' => $tokenLogin,
          'create_at' => date('Y-m-d H:i:s'),
        ];

        $insertStatus = insert('loginToken', $dataInsert);
        if ($insertStatus) {
          // thanh cong
          setSession('userRole', $userRole);
          // lưu loginToken vao session
          setSession('loginToken', $tokenLogin);
          redirect('?module=home&action=homepage');
        } else {
          setFlashData('msg', 'Không thể đăng nhập, vui lòng thử lại sau!');
          setFlashData('msg_type', 'danger');
        }


      } else {
        setFlashData('msg', 'Email hoặc mật khẩu không chính xác!');
        setFlashData('msg_type', 'danger');
      }
    } else {
      setFlashData('msg', 'Email hoặc mật khẩu không chính xác!');
      setFlashData('msg_type', 'danger');

    }

  } else {
    setFlashData('msg', 'Vui lòng nhập email và mật khẩu!');
    setFlashData('msg_type', 'danger');
  }

  redirect('?module=auth&action=login');

}



$msg = getFlashData('msg');
$msg_type = getFlashData('msg_type');


?>

<div class="row">
  <div class="col-4" style="margin: 50px auto">
    <h2>Đăng nhập</h2>
    <?php
    if (!empty($msg)) {
      getMsg($msg, $msg_type);
    }

    ?>
    <form action="" method="post">
      <div class="form-group mb-3">
        <label for="email" name="email">Email</label>
        <input type="email" class="form-control" placeholder="Địa chỉ email" name="email">
      </div>

      <div class="form-group mb-3">
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
      </div>


      <button type="submit" class="btn btn-register w-100 ">Đăng nhập</button>


      <hr>
      <p class="text-center"><a href="?module=auth&action=forgot">Quên mật khẩu</a></p>
      <p class="text-center"><a href="?module=auth&action=register">Đăng ký tài khoản</a></p>
    </form>
  </div>
</div>

<?php

layouts('footer');
?>