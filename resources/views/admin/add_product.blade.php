<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
      .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
      }

      h1 {
        color: white;
        text-align: center;
      }

      label {
        display: inline-block;
        width: 200px;
        font-size: 18px !important;
        color: white !important;
      }

      input[type="text"],
      input[type="number"],
      select {
        width: 350px;
        height: 50px;
      }

      textarea {
        width: 450px;
        height: 80px;
      }

      .input_deg {
        padding: 15px;
      }

      .alert {
        margin: 20px 0;
        color: #fff;
        background-color: #d9534f;
        border-radius: 5px;
        padding: 10px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <!-- Page Content -->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h1>Add Product</h1>

          <div class="div_deg">
            <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data">
              @csrf
              
              <!-- Display Validation Errors -->
              @if ($errors->any())
                <div class="alert">
                  <ul style="list-style: none; padding: 0;">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <div class="input_deg">
                <label>Product Title</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Enter Product Title" required>
              </div>

              <div class="input_deg">
                <label>Product Image</label>
                <input type="file" name="image" required>
              </div>

              <div class="input_deg">
                <label>Price</label>
                <input type="text" name="price" value="{{ old('price') }}" placeholder="Enter Product Price" required>
              </div>

              <div class="input_deg">
                <label>Product Category</label>
                <select name="category" required>
                  <option value="">Select an Option</option>
                  @foreach($categories as $item)
                    <option value="{{ $item->id }}" {{ old('category') == $item->id ? 'selected' : '' }}>
                      {{ $item->category_name }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="input_deg">
                <label>Quantity</label>
                <input type="number" name="qty" value="{{ old('qty') }}" placeholder="Enter Quantity" min="1" required>
              </div>

              <div class="input_deg">
                <input class="btn btn-success" type="submit" value="Add Product">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- SweetAlert Success Message -->
    <script>
      @if (session('success'))
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: "{{ session('success') }}",
          timer: 3000,
          showConfirmButton: false
        });
      @endif
    </script>
  </body>
</html>
