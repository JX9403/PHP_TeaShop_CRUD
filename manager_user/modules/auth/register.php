<!-- dang nhap tai khoan -->
<?php

if (!defined('_CODE')) {
  die('Access denied...');

}

if (isPost()) {
  $filterAll = filter();
  $errors = []; // Mang chua cac loi

  // validate fullname
  if (empty($filterAll['fullName'])) {
    $errors['fullName']['required'] = 'Họ tên bắt buộc phải nhập!';
  } else {
    if (strlen($filterAll['fullName']) < 4) {
      $errors['fullName']['min'] = 'Họ tên phải có ít nhất 3 ký tự!';
    }
  }
  // Email 
  if (empty($filterAll['email'])) {
    $errors['email']['required'] = 'Email bắt buộc phải nhập!';
  } else {
    $email = $filterAll['email'];
    $sql = "SELECT id FROM users WHERE email ='$email'";
    if (getRows($sql) > 0) {
      $errors['email']['unique'] = 'Email đã tồn tại!';
    }
  }

  // phone

  if (empty($filterAll['phone'])) {
    $errors['phone']['required'] = 'Số điện thoại bắt buộc phải nhập!';
  } else {
    if (!isPhone($filterAll['phone'])) {
      $errors['phone']['isPhone'] = "Số điện thoại không đúng định dạng!";
    }
  }
  //password
  if (empty($filterAll['password'])) {
    $errors['password']['required'] = 'Mật khẩu bắt buộc phải nhập!';
  } else {
    if (strlen($filterAll['password']) < 8) {
      $errors['password']['min'] = "Mật khẩu tối thiểu 8 ký tự!";
    }
  }

  if (empty($filterAll['password_confirm'])) {
    $errors['password_confirm']['required'] = 'Bạn phải nhập lại mật khẩu!';
  } else {
    if ($filterAll['password_confirm'] != $filterAll['password']) {
      $errors['password_confirm']['match'] = "Mật khẩu nhập lại không đúng!";
    }
  }

  if (empty($errors)) {

    $dataInsert = [
      'fullName' => $filterAll['fullName'],
      'email' => $filterAll['email'],
      'phone' => $filterAll['phone'],
      'password' => password_hash($filterAll['password'], PASSWORD_DEFAULT),
      'create_at' => date('Y-m-d H:i:s'),
      'role' => 'USER'
    ];

    $insertStatus = insert('users', $dataInsert);
    if ($insertStatus) {
      setFlashData("msg", "Đăng ký thành công!");
      setFlashData('msg_type', 'success');
    }
    redirect('?module=auth&action=login');

  } else {
    setFlashData("msg", "Vui lòng kiểm tra lại dữ liệu!");
    setFlashData('msg_type', 'danger');
    setFlashData('old', $filterAll);
    setFlashData('errors', $errors);
    redirect('?module=auth&action=register');
  }

}

$msg = getFlashData('msg');
// echo '<pre';
// print_r( getFlashData('msg'));
// echo '</pre>';

$msg_type = getFlashData('msg_type');
// echo '<pre';
// echo 'msgtype=';
// print_r(getFlashData('msg_type'));
// echo '</pre>';
$errors = getFlashData('errors');
$old = getFlashData('old');

// removeSession('flash_msg_register');


$data = [
  'pageTitle' => 'Đăng Ký'
];



layouts('header-login', $data);
?>

<div class="row">
  <div class="col-4" style="margin: 50px auto">
    <h2>Đăng ký </h2>
    <?php
    if (!empty($msg)) {

      getMsg($msg, $msg_type);
    }
    ?>
    <form action="" method="post">

      <div class="form-group mb-3">
        <label for="fullName">Họ tên</label>
        <input type="text" name="fullName" class="form-control" placeholder="Nhập họ tên" value="<?php
        echo (!empty($old['fullName'])) ? $old['fullName'] : null;
        ?>">
        <?php
        echo (!empty($errors['fullName'])) ? '<span class = "error"> ' . reset($errors['fullName']) . '</span>' : null;
        ?>
      </div>

      <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" placeholder="Địa chỉ email" name="email" value="
        <?php
        echo (!empty($old['email'])) ? $old['email'] : null;
        ?>">
        <?php
        echo (!empty($errors['email'])) ? '<span class = "error"> ' . reset($errors['email']) . '</span>' : null;
        ?>
      </div>

      <div class="form-group mb-3">
        <label for="phone">Số điện thoại</label>
        <input type="number" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="<?php
        echo (!empty($old['phone'])) ? $old['phone'] : null;
        ?>">

        <?php
        echo (!empty($errors['phone'])) ? '<span class = "error"> ' . reset($errors['phone']) . '</span>' : null;
        ?>
      </div>

      <div class="form-group mb-3">
        <label for="password">Mật khẩu</label>
        <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
        <?php
        echo (!empty($errors['password'])) ? '<span class = "error"> ' . reset($errors['password']) . '</span>' : null;
        ?>
      </div>

      <div class="form-group mb-3">
        <label for="password">Nhập lại mật khẩu</label>
        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="password_confirm">
        <?php
        echo (!empty($errors['password_confirm'])) ? '<span class = "error"> ' . reset($errors['password_confirm']) . '</span>' : null;
        ?>
      </div>


      <button class="btn btn-register w-100 ">Đăng ký</button>


      <hr>
      <p class="text-center"><a href="?module=auth&action=login">Đăng nhập</a></p>
    </form>
  </div>
</div>

<?php

layouts('footer');
?>