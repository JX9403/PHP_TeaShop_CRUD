<?php

if (!defined('_CODE')) {
  die('Access denied...');
}

$data = [
  'pageTitle' => 'Trang chủ'
];


// echo getSession('loginToken');



if (!isLogin()) {
  layouts('header-login', $data);
} else {
  layouts('header', $data);
}
?>


<style>
  .tea-philosophy {
    background-image: url('<?php echo _WEB_HOST_TEMPLATES; ?>/image/bg.jpg');
  }
</style>


<!-- Hero Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"
      aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src='<?php echo _WEB_HOST_TEMPLATES; ?>/image/slide1.jpg' class="d-block w-100" alt="Tea plantation">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="fs-1">Tinh hoa Trà Việt</h1>
        <p class="fs-5 text-white ">Tìm đến sự thư giãn đích thực qua những lá trà thượng hạng, hòa quyện văn hóa và
          truyền thống.
        </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/slide2.jpg" class="d-block w-100" alt="Tea ceremony">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="fs-1">Văn hóa Trà Đạo</h1>
        <p class="fs-5 text-white">Khám phá bộ sưu tập những loại trà hảo hạng nhất, tinh hoa của nghệ thuật thưởng trà.
        </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/slide1.jpg" class="d-block w-100" alt="Tea varieties">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="fs-1">Nghệ thuật và Trà</h1>
        <p class="fs-5 text-white">Đắm mình trong thế giới trà tinh tế, nơi mỗi ngụm trà là một trải nghiệm đáng nhớ.
        </p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Trước</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Sau</span>
  </button>
</div>

<!-- Tea Art Section -->
<section class="tea-art-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/tea-art.jpg" alt="Tea Art" class="img-fluid rounded">
      </div>
      <div class="col-md-6">
        <h2 class="mb-4 text-center  " style="color: #7aa640;">Nghi Thức Trà Đạo</h2>
        <p>Nghi thức trà đạo chính là nghi thức pha trà, thực hiện từ bước chuẩn bị đến bước pha trà
          với bộ
          trà cụ trước mặt các vị khách trong gian phòng gọi là trà thất. Những bước pha trà được gọi là temae. Nghe
          có vẻ đơn giản nhưng thực sự ẩn chứa nhiều ý nghĩa sâu xa.
        </p>
        <div class="d-flex justify-content-center">
          <button class=" btn btn-tea rounded-pill px-5 ">Chi tiết</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Tea Philosophy -->
<section class="tea-philosophy py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 text-white ">
        <h2 class="mb-4" style="color: #7aa640;">Nghệ thuật trà đạo</h2>
        <p class="text-white" style="font-style: italic;">"Không đơn giản chỉ là những phép tắc uống trà mà qua đó làm
          sạch tâm hồn, tu
          tâm
          dưỡng tính theo đúng tinh thần phật giáo."</p>
        <p class="text-white">Từ thưởng thức trà đến trà đạo là quá trình không ngừng nghỉ của người Nhật nhằm biến tục
          uống trà du nhập
          từ nước ngoài trở thành một nghệ thuật sống của chính dân tộc mình. Không đơn giản chỉ là những phép tắc
          uống trà mà qua đó người Nhật còn mong muốn hòa vào thiên nhiên, làm sạch tâm hồn, tu tâm dưỡng tính theo
          đúng tinh thần phật giáo.</p>
        <button class="btn btn-outline-light mt-3">Xem thêm</button>
      </div>
      <div class="col-lg-6 mt-4 mt-lg-0">
        <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/nghethuat.png" alt="Tea Ceremony" class="img-fluid rounded ">
      </div>
    </div>
  </div>
</section>

<!-- Products Section -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-5 " style="color: #7aa640;">Sản phẩm mới</h2>
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row">
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/sanpham1.jpg" class="card-img-top"
                  alt="Premium Green Tea">
                <div class="card-body text-center">
                  <h5 class="card-title">Trà gạo rang</h5>
                  <p class="card-text ">450.000 VND</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/sanpham2.jpg" class="card-img-top"
                  alt="Earl Grey Black Tea">
                <div class="card-body text-center">
                  <h5 class="card-title">Trà móc câu</h5>
                  <p class="card-text ">400.000 VND</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/sanpham6.jpg" class="card-img-top" alt="Oolong Tea">
                <div class="card-body text-center">
                  <h5 class="card-title">Trà ô long</h5>
                  <p class="card-text ">500.000 VND</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/sanpham3.jpg" class="card-img-top" alt="White Tea">
                <div class="card-body text-center">
                  <h5 class="card-title">Trà sao Nhật Bản</h5>
                  <p class="card-text ">550.000 VND</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/sanpham4.jpg" class="card-img-top" alt="Pu-erh Tea">
                <div class="card-body text-center">
                  <h5 class="card-title">Trà thiết quan âm</h5>
                  <p class="card-text ">600.000 VND</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card h-100">
                <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/sanpham5.jpg" class="card-img-top" alt="Herbal Tea">
                <div class="card-body text-center">
                  <h5 class="card-title">Trà ướp hoa mộc</h5>
                  <p class="card-text ">350.000 VND</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Chuyển về trước</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Chuyển về sau</span>
      </button>
    </div>
  </div>
</section>

<!-- News Section -->
<section class="py-5" style="background-color: #e8e9e7;">
  <div class="container">
    <h2 class="text-center mb-5" style="color: #7aa640;">Tin mới</h2>
    <div class="row">
      <!-- News Card 1 -->
      <div class="col-md-4">
        <div class="card news-card">
          <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/noidung1.jpg" class="card-img-top" alt="News">
          <div class="card-body">
            <h5 class="card-title">Chỉ dẫn hương vị</h5>
            <p class="card-text two-line">Một “từ điển” các tính từ mô tả hương vị sau đây sẽ giúp bạn vượt qua sự
              chung chung và nắm bắt tốt nhất các hương vị cụ thể từng loại trà, làm phong phú thêm thế giớ trà của
              bạn.</p>
            <a href="#" class="btn btn-tea">Read More</a>
          </div>
        </div>
      </div>
      <!-- News Card 1 -->
      <div class="col-md-4">
        <div class="card news-card">
          <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/noidung2.jpg" class="card-img-top" alt="News">
          <div class="card-body">
            <h5 class="card-title">Cách pha trà</h5>
            <p class="card-text two-line">Mọi người thường nghĩ pha trà rất công phu phức tạp, nên cũng hình thành 2
              “trường phái”,...</p>
            <a href="#" class="btn btn-tea">Read More</a>
          </div>
        </div>
      </div> <!-- News Card 1 -->
      <div class="col-md-4">
        <div class="card news-card">
          <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/noidung3.jpg" class="card-img-top" alt="News">
          <div class="card-body">
            <h5 class="card-title">Người việt uống trà hay thưởng trà</h5>
            <p class="card-text two-line">1, Việt Nam đất nước vùng chèTrồng chè thái nguyên ở Việt Nam là một trong
              những cái...</p>
            <a href="#" class="btn btn-tea">Read More</a>
          </div>
        </div>
      </div> <!-- News Card 1 -->
      <div class="col-md-4">
        <div class="card news-card">
          <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/noidung7.jpg" class="card-img-top" alt="News">
          <div class="card-body">
            <h5 class="card-title">

              Cuộc đời bí ẩn của geisha Nhật Bản</h5>
            <p class="card-text two-line">Geisha cung cấp những dịch vụ giải trí gồm âm nhạc, múa, thơ ca, quyến rũ,
              đùa cợt và hoàn toàn không bán dâm. Nét quyến rũ nhất của họ chính là sự bí ẩn.</p>
            <a href="#" class="btn btn-tea">Read More</a>
          </div>
        </div>
      </div> <!-- News Card 1 -->
      <div class="col-md-4">
        <div class="card news-card">
          <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/noidung8.jpg" class="card-img-top" alt="News">
          <div class="card-body">
            <h5 class="card-title">Chu du khắp thế giới thưởng thức trà đạo</h5>
            <p class="card-text two-line">Nếu là tín đồ của trà, bạn sẽ thấy rằng đồ uống có mặt trên khắp thế giới là
              trà. Do mỗi nước lại có bản sắc văn hóa riêng, vì vậy trà cũng được thưởng thức theo các cách rất khác
              nhau.</p>
            <a href="#" class="btn btn-tea">Read More</a>
          </div>
        </div>
      </div> <!-- News Card 1 -->
      <div class="col-md-4">
        <div class="card news-card">
          <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/image/noidung9.jpg" class="card-img-top" alt="News">
          <div class="card-body">
            <h5 class="card-title">Đến Tĩnh Tâm trà quán tâm sự buổi trưa</h5>
            <p class="card-text two-line">Không gian thoáng đãng, lượng khách vừa phải nên vào các buổi trưa, sẽ không
              ngạc nhiên khi đến đây, bạn bắt gặp một vài cặp đôi hoặc 2 người bạn gái rất "hồn nhiên"ngả ngớn nằm ôm
              gối, thủ thỉ tâm sự hàng giờ,</p>
            <a href="#" class="btn btn-tea">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php

layouts('footer');
?>