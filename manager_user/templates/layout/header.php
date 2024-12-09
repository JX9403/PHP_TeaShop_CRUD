<!-- Ngawn viec truy cap truc tiep tu duong link thu muc => bat buoc nguoi dung phai di tu index vao -->
<?php

if (!defined('_CODE')) {
  die('Access denied...');
}

$userRole = getSession('userRole');


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
            <?php

            if ($userRole === 'ADMIN') {
              ?>
              <div class="left-item fw-semibold fs-5">
                <a href="?module=home&action=dashboard">Trang quản trị</a>
              </div>
              <?php
            }
            ?>
          </div>
          <div class="account d-flex justify-content-center align-items-center" style="width:70px; height:70px; ">
            <div class="btn-group">
              <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fa-solid fa-user" style="color:#fff; font-size: 26px"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="?module=auth&action=logout" class="dropdown-item" type="button">Đăng xuất</a>

              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>





</html>