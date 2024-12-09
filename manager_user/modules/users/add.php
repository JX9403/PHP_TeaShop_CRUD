<?php

if (!defined('_CODE')) {
  die('Access denied...');
}

$data = [
  'pageTitle' => 'Dashboard'
];

layouts('header', $data);


if (isPost()) {
  $filterAll = filter();
  // echo '<pre>';
  // print_r($filterAll);
  // echo '</pre>';
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
      // password_verify
      'create_at' => date('Y-m-d H:i:s'),
      'role' => $filterAll['role'],
    ];

    $insertStatus = insert('users', $dataInsert);
    if ($insertStatus) {
      setFlashData("msg", "Thêm mới thành công!");
      setFlashData('msg_type', 'success');
      redirect('?module=users&action=list');

    }

  } else {
    setFlashData("msg", "Vui lòng kiểm tra lại dữ liệu!");
    setFlashData('msg_type', 'danger');
    setFlashData('old', $filterAll);
    setFlashData('errors', $errors);
    redirect('?module=users&action=add');
  }

}

$msg = getFlashData('msg');
// echo '<pre';
// print_r(getFlashData('msg'));
// echo '</pre>';

$msg_type = getFlashData('msg_type');
// echo '<pre';
// echo 'msgtype=';
// print_r(getFlashData('msg_type'));
// echo '</pre>';
$errors = getFlashData('errors');
$old = getFlashData('old');

?>


<div class="dashboard">
  <div class="container-fluid p-4">
    <div class="row">
      <div class="col-2">
        <div class="left ">
          <div class="sidebar">

            <div class="sidebar-title  fs-5 fw-semibold h-100">
              <i class="fa-solid fa-list"></i>

            </div>
            <div class="sidebar-item  fs-5 fw-semibold" onclick="window.location.href='?module=home&action=dashboard'">
              Tổng quan
            </div>
            <div class="sidebar-item active fs-5 fw-semibold"
              onclick="window.location.href='?module=users&action=list'">
              Quản lý khách hàng
            </div>
            <div class="sidebar-item  fs-5 fw-semibold">
              Quản lý sản phẩm
            </div>
            <div class="sidebar-item  fs-5 fw-semibold">
              Quản lý đơn hàng
            </div>
            <div class="sidebar-item  fs-5 fw-semibold">
              Quản lý bài đăng
            </div>
          </div>
        </div>
      </div>
      <div class="col-10">
        <div class="right">
          <div class="manage-user-container">
            <div class="title mb-3 fw-semibold fs-2">
              Quản lý khách hàng
            </div>

            <div class="user-content">
              <div class="row">
                <div class="col-12" style="margin: 50px auto">
                  <h2>Thêm mới khách hàng </h2>
                  <?php
                  if (!empty($msg)) {
                    getMsg($msg, $msg_type);
                  }
                  ?>
                  <form action="" method="post" class="row">

                    <div class="col-6">
                      <div class="form-group mb-3">
                        <label for="fullName">Họ tên</label>
                        <input type="text" name="fullName" class="form-control" placeholder="Nhập họ tên" value="<?php
                        echo (!empty($old['fullName'])) ? $old['fullName'] : null;
                        ?>">
                        <?php
                        echo (!empty($errors['fullName'])) ? '<span class = "error"> ' . reset($errors['fullName']) . '</span>' : null;
                        ?>
                      </div>
                    </div>
                    <div class="col-6">
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
                    </div>

                    <div class="col-6">
                      <div class="form-group mb-3">
                        <label for="phone">Số điện thoại</label>
                        <input type="number" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="<?php
                        echo (!empty($old['phone'])) ? $old['phone'] : null;
                        ?>">

                        <?php
                        echo (!empty($errors['phone'])) ? '<span class = "error"> ' . reset($errors['phone']) . '</span>' : null;
                        ?>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group mb-3">
                        <label for="role">Vai trò</label>

                        <select name="role" class="form-control" id="exampleFormControlSelect2">
                          <option selected>USER</option>
                          <option>VIP</option>
                          <option>V-VIP</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group mb-3">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                        <?php
                        echo (!empty($errors['password'])) ? '<span class = "error"> ' . reset($errors['password']) . '</span>' : null;
                        ?>
                      </div>
                    </div>


                    <div class="col-6">
                      <div class="form-group mb-3">
                        <label for="password">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu"
                          name="password_confirm">
                        <?php
                        echo (!empty($errors['password_confirm'])) ? '<span class = "error"> ' . reset($errors['password_confirm']) . '</span>' : null;
                        ?>
                      </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                      <a href="?module=users&action=list" class="btn btn-outline-secondary me-4">Quay lại</a>
                      <button type="submit" class="btn btn-register ">Thêm mới</button>


                    </div>

                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>


  </div>
</div>


<?php

layouts('footer');
?>