<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        .div_deg
        {
            display:flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        .table_deg
        {
            border: 2px solid greenyellow;
        }

        th
        {
          background-color: skyblue;
          color: white;
          font-size: 19px;
          font-weight: bold;
          padding: 15px;

        }

        td
        {
          border:1px solid skyblue;
          text-align: center;
          color: bisque;
        }

        input[type='search']
        {
          width: 300px;
          height: 40px;
          margin-left: 50px;
        }

    </style>
  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <form action="{{url('product_search')}}" method="get">
                @csrf
                <input type="search" name="search">
                <input type="submit" class="btn btn-secondary" value="Search">
            </form>

            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Product Title</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        
                    
                    </tr>


                    @foreach($products as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td><img height="130" width="130" src="products/{{ $item->image }}"></td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->quantity }}</td>
                        
                        <td>
                          <a class="btn btn-success" href="{{url('update_product',$item->id)}}">Edit</a>
                        </td>

                        <td>
                          <a class="btn btn-danger" href="{{ url('/delete_product/' . $item->id) }}">Delete</a>
                        </td>

                        



                    </tr>
                    @endforeach
                </table>
              
            </div>

            <div class="div_deg">
            {{$products->onEachSide(1)->links()}}


            </div>
            
            

            

          </div>  
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="admincss/vendor/jquery/jquery.min.js"></script>
    <script src="admincss/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="admincss/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admincss/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admincss/vendor/chart.js/Chart.min.js"></script>
    <script src="admincss/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admincss/js/charts-home.js"></script>
    <script src="admincss/js/front.js"></script>
  </body>
</html>
