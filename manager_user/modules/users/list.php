<?php

if (!defined('_CODE')) {
  die('Access denied...');
}

$data = [
  'pageTitle' => 'Quản lý khách hàng'
];

layouts('header', $data);
// echo getSession('loginToken');


if (!isLogin()) {
  redirect('?module=auth&action=login');
}

$listUsers = getRaw("SELECT * FROM users ORDER BY create_at DESC");

$msg = getFlashData('msg');
$msg_type = getFlashData('msg_type');
?>




<div class="list-user">
  <div class="container-fluid p-4">
    <div class="row">
      <div class="col-2">
        <div class="left ">
          <div class="sidebar">

            <div class="sidebar-title  fs-5 fw-semibold h-100">
              <i class="fa-solid fa-list"></i>

            </div>
            <div class="sidebar-item fs-5 fw-semibold" onclick="window.location.href='?module=home&action=dashboard'">
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
            <hr>

            <div class="user-content mt-4">
              <!-- Thêm mới khách hàng -->
              <div class="d-flex justify-content-end">
                <a href="?module=users&action=add" class="btn btn-tea mb-3"><i class="fa-solid fa-plus me-2"></i>Thêm
                  mới khách hàng</a>
              </div>

              <!-- Danh sách khách hàng -->
              <?php
              if (!empty($msg)) {
                getMsg($msg, $msg_type);
              }

              ?>
              <div>
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Tên</th>
                      <th scope="col">Email</th>
                      <th scope="col">Số điện thoại</th>
                      <th scope="col">Vai trò</th>
                      <th scope="col">Ngày tạo</th>
                      <th scope="col">Ngày cập nhật</th>
                      <th class="text-center" scope="col">Cập nhật</th>
                      <th class="text-center" scope="col">Xóa</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (!empty($listUsers)):
                      foreach ($listUsers as $user):
                        ?>
                        <tr>
                          <td><?php echo $user['id']; ?></td>
                          <td><?php echo $user['fullName']; ?></td>
                          <td><?php echo $user['email']; ?></td>
                          <td><?php echo $user['phone']; ?></td>
                          <td><?php echo $user['role']; ?></td>
                          <td><?php echo $user['create_at']; ?></td>
                          <td><?php echo $user['update_at']; ?></td>
                          <!-- edit -->
                          <td>
                            <div class="d-flex justify-content-center ">
                              <a href="?module=users&action=edit&id=<?php echo $user['id']; ?>"
                                class="btn btn-outline-primary">
                                <i class="fa-regular fa-pen-to-square text-primary"></i>
                              </a>
                            </div>
                          </td>
                          <!-- Delete -->
                          <td>
                            <div class="d-flex justify-content-center ">

                              <a href="?module=users&action=delete&id=<?php echo $user['id']; ?>"
                                class="btn btn-outline-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i
                                  class="fa-solid fa-trash text-danger"></i></a>
                            </div>
                          </td>
                        </tr>
                        <?php
                      endforeach;

                    else:

                      ?>
                      <tr>
                        <td colspan="7">
                          <div class="alert alert-danger text-center">
                            Không có khách hàng!
                          </div>
                        </td>
                      </tr>
                      <?php
                    endif;
                    ?>
                  </tbody>
                </table>

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