<?php

if (!defined('_CODE')) {
  die('Access denied...');
}

$data = [
  'pageTitle' => 'Tổng quan'
];

layouts('header', $data);
// echo getSession('loginToken');


if (!isLogin()) {
  redirect('?module=auth&action=login');
}


$listUsers = getRaw("SELECT * FROM users ORDER BY update_at");
$listUsersByOrder = getRaw("SELECT * FROM users ORDER BY order_quantity DESC");
$listUsersByTotal = getRaw("SELECT * FROM users ORDER BY total_purchase DESC");


$totalMoney = 0;
$totalOrders = 0;
foreach ($listUsers as $user) {
  // Kiểm tra nếu trường total_purchase tồn tại và là số
  if (isset($user['total_purchase']) && is_numeric($user['total_purchase']) && is_numeric($user['order_quantity'])) {
    $totalMoney += $user['total_purchase'];
    $totalOrders += $user['order_quantity'];

  }
}


$totalUsers = getRows("SELECT * FROM users");

$msg = getFlashData('msg');
$msg_type = getFlashData('msg_type');
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
            <div class="sidebar-item active fs-5 fw-semibold"
              onclick="window.location.href='?module=home&action=dashboard'">
              Tổng quan
            </div>
            <div class="sidebar-item  fs-5 fw-semibold" onclick="window.location.href='?module=users&action=list'">
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
          <div class="dashboard-container">
            <div class="dashboard-1">
              <div class="title mb-3 fw-semibold fs-2">
                Tổng quan
              </div>
              <hr>
              <div class="dashboard-content mt-4">
                <div class="row g-5">

                  <div class="col-4">
                    <div class="box" style="background : #65ba69">
                      <div class="box-left">
                        <div class="box-bot">
                          Người dùng
                        </div>
                        <div class="box-top">
                          <?php echo $totalUsers ?>
                        </div>

                      </div>

                      <div class="box-right">
                        <i class="fa-solid fa-user"></i>
                      </div>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="box" style="background : #ffa826">
                      <div class="box-left">
                        <div class="box-bot">
                          Đơn hàng
                        </div>
                        <div class="box-top">
                          <?php echo $totalOrders ?>
                        </div>
                      </div>
                      <div class="box-right">
                        <i class="fa-solid fa-cart-shopping"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="box " style="background : #42a4f5">
                      <div class="box-left">
                        <div class="box-bot">
                          Doanh thu
                        </div>
                        <div class="box-top">
                          <?php echo number_format($totalMoney) ?> đ

                        </div>

                      </div>

                      <div class="box-right">
                        <i class="fa-solid fa-dollar-sign"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="dashboard-2 mt-5">
              <div class="title mb-3 fw-semibold fs-2">
                Top khách hàng tiềm năng
              </div>

              <div class="dashboard-content mt-4">
                <div class="row g-5">

                  <div class="col-6">
                    <div class="box">
                      <div class="title">
                        <span><i class="fa-solid fa-crown"
                            style="font-size: 24px; color :#f7ca16; margin: 0 10px"></i></span>
                        Số lượng đơn hàng<span><i class="fa-solid fa-crown"
                            style="font-size: 24px; color :#f7ca16; margin: 0 10px"></i></span>
                      </div>
                      <hr>
                      <div class="list">
                        <?php


                        $maxItems = 10;

                        // Lặp qua danh sách
                        for ($i = 0; $i < count($listUsersByOrder) && $i < $maxItems; $i++) {
                          $item = $listUsersByOrder[$i];
                          ?>
                          <div class="item">
                            <div class="item-number">
                              <?php echo ($i + 1); ?>
                            </div>
                            <div class="item-name">
                              <?php echo $item['fullName']; // Hiển thị tên người dùng ?>
                            </div>
                            <div class="item-quantity">
                              <?php echo $item['order_quantity'] ? $item['order_quantity'] : 0; ?> đơn hàng
                            </div>
                          </div>
                          <?php
                        }
                        ?>
                      </div>
                    </div>


                  </div>
                  <div class="col-6">
                    <div class="box">
                      <div class="title">
                        <span><i class="fa-solid fa-crown"
                            style="font-size: 24px; color :#f7ca16; margin: 0 10px"></i></span>
                        Tổng hóa đơn<span><i class="fa-solid fa-crown"
                            style="font-size: 24px; color :#f7ca16; margin: 0 10px"></i></span>
                      </div>
                      <hr>
                      <div class="list">
                        <?php
                        $maxItems = 10;

                        for ($i = 0; $i < count($listUsersByTotal) && $i < $maxItems; $i++) {
                          $item = $listUsersByTotal[$i];
                          ?>
                          <div class="item">
                            <div class="item-number">
                              <?php echo ($i + 1); ?>
                            </div>
                            <div class="item-name">
                              <?php echo $item['fullName']; ?>
                            </div>
                            <div class="item-quantity">
                              <?php echo number_format($item['total_purchase']) ? number_format($item['total_purchase']) : 0; ?> đ
                            </div>
                          </div>
                          <?php
                        }
                        ?>

                      </div>
                    </div>
                  </div>
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