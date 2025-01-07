<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>
    .div_center
    {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;

    }

  </style>







</head>

<body>
  <div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->
  </div>

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        @if(isset($data))
        <div class="col-md-10">
          <div class="box">
            <div class="div_center">
              <img width="400" src="/products/{{ $data->image }}" alt="{{ $data->title }}">
            </div>
            <div class="detail-box">
              <h6>{{ $data->title }}</h6>
              <h6>
                Price
                <span>৳{{ $data->price }}</span>
              </h6>
            </div>
            <div style="padding: 10px">
              <a class="btn btn-danger" href="{{ url('product_details', $data->id) }}">Details</a>
            </div>
          </div>
        </div>
        @else
        <p style="text-align: center; color: red; font-size: 18px;">Product not found.</p>
        @endif
      </div>
    </div>
  </section>

  <!-- info section -->
  <section class="info_section layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-youtube" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="info_container">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>ABOUT US</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form">
              <h5>Newsletter</h5>
              <form action="#">
                <input type="email" placeholder="Enter your email">
                <button>Subscribe</button>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>NEED HELP</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>CONTACT US</h6>
            <div class="info_link-box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Gb road 123 London, UK </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+01 12345678901</span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> demo@gmail.com</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- footer section -->
    <footer class="footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Web Tech Knowledge</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->
  </section>
  <!-- end info section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>
