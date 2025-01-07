<!DOCTYPE html>
<html>

<head>
  @include('home.css')
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
        <h2>Latest Products</h2>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="/products/{{$data->image}}" alt="">
            </div>
            <div class="detail-box">
              <h6>{{$data->title}}</h6>
              <h6>Price <span>৳{{$data->price}}</span></h6>
            </div>
            <div style="padding: 10px">
              <a class="btn btn-danger" href="{{ url('product_details', $data->id) }}">Details</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('home.footer')

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>
