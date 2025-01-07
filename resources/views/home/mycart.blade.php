<!DOCTYPE html>
<html>

<head>

  @include('home.css')

  <style>

    .div_deg
    {

        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;

    }

    table
    {
      border: 2px solid black;
      text-align: center; 
      width: 800px; 
    }

    th
    {
      border: 2px solid black;
      text-align: center;
      color: white;
      font: 20px;
      font-weight: bold;
      background-color: black;
    }

    td
    {
        border: 1px solid skyblue;
    }

    .cart_value
    {
      text-align: center;
      margin-bottom: 70px;
      padding: 18px;
    }

    .order_deg
    {
      padding: 150px;
      margin-top: -50px;
    }

    label
    {
      display: inline-block;
      width: 150px;
    }

    .div_gap
    {
      padding: 20px;
    }

  </style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    
  
  <!-- end hero area -->

  
  </div>
  
  <div class="div_deg">

    
    <div class="order_deg">

      <form action="{{ url('confirm_order') }}" method="Post">

        @csrf

        <div class="div_gap">
          <label>Receiver Name</label>

          <input type="text" name="name" value="{{Auth::user()->name}}">

        </div>

        <div class="div_gap">
          <label>Receiver Address</label>

          <textarea name="address">{{Auth::user()->address}}</textarea>
          
        </div>

        <div class="div_gap">
          <label>Receiver Phone</label>

          <input type="text" name="phone" value="{{Auth::user()->phone}}">
          
        </div>

        <div class="div_gap">
          
          <input class="btn btn-primary" type="submit" value="Place Order">

        </div>

      </form>

    </div>
    

    <table>

        <tr>
            <th>Product Title</th>

            <th>Price</th>

            <th>Image</th>

            <th>Remove</th>
        </tr>

        <?php

        $value = 0;

        ?>

        @foreach($cart as $cart)

        <tr>

            <td>{{$cart->product->title}}</td>
            <td>{{$cart->product->price}}</td>
            <td>
                <img width="150" src="/products/{{$cart->product->image}}">
            </td>

            <td>
                <a class="btn btn-danger" href="{{url('delete_cart', $cart->id)}}">Remove</a>
            </td>

        </tr>

        <?php

        $value = $value + $cart->product->price

        ?>

        @endforeach

    </table>

  </div>

    <div class="cart_value">

      <h3>Total Value of Cart is : ৳{{$value}}</h3>

    </div>
  
   
  
  <!-- info section -->

  <section class="info_section  layout_padding2-top">
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
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              ABOUT US
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Newsletter
              </h5>
              <form action="#">
                <input type="email" placeholder="Enter your email">
                <button>
                  Subscribe
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              NEED HELP
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACT US
            </h6>
            <div class="info_link-box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Gb road 123 london Uk </span>
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
    <footer class=" footer_section">
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>

</html>