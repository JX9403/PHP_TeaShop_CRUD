<!-- Ngawn viec truy cap truc tiep tu duong link thu muc => bat buoc nguoi dung phai di tu index vao -->
<?php

if (!defined('_CODE')) {
  die('Access denied...');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo !empty($data['pageTitle']) ? $data['pageTitle'] : 'Quản lý khách hàng' ?> </title>
  <link rel='stylesheet' href='<?php echo _WEB_HOST_TEMPLATES; ?>/css/bootstrap.min.css'>
  <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/style.css?ver=<?php echo rand(1, 10000); ?>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <div class="header">
    <div class="container-fluid" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 0px 8px; height : 70px ">
      <div class="wrapper h-100 d-flex align-items-center  ">
        <div class="right" style="width:20%">
          <div class="logo fs-3 fw-bold mx-5 " style="color:#fff; ">
            MUSER
          </div>
        </div>
        <div class="left d-flex justify-content-between w-100 me-5">
          <div class="menu d-flex justify-content-center align-items-center  ">
            <div class="left-item me-5 fw-semibold fs-5">
              <a href="?module=home&action=homepage"> Trang chủ</a>

            </div>

          </div>
          <div class="account d-flex">
            <a class="btn  btn-login mx-2 width: 110px;" href="?module=auth&action=login">Đăng
              nhập</a>

              <a class="btn  btn-login mx-2 width: 110px;" href="?module=auth&action=register">Đăng
              Ký</a>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>