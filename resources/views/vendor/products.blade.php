@include('vendor.venheader')
<div class="container mt-5">
  <div class="row tm-content-row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">

        <table class="table table-hover tm-table-small tm-product-table">
          <thead>
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">PRODUCT NAME</th>
              <th scope="col">Price</th> 
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @php
                $serial_number=1;
            @endphp
            @foreach($products as $product)
            <tr>
              <td>{{$serial_number++}}</td>
              <td class="tm-product-name">{{$product->name}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->status}}</td>
              <td>
                <a href="{{route('vendor.deleteProduct',$product->id)}}" class="tm-product-delete-link">
                  <i class="far fa-trash-alt tm-product-delete-icon"></i>
                </a>

                <a href="{{route('vendor.editProduct',$product->id)}}" class="tm-product-delete-link">
                  <i class="far fa-edit tm-product-delete-icon"></i>
                </a>

              </td>
            </tr>
            @endforeach          

          </tbody>
        </table>
      <!-- table container -->
      <a href="{{route ('vendor.addProducts') }}" class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
    </div>
  </div>
</div>
<footer class="tm-footer row tm-mt-small">
  <div class="col-12 font-weight-light">
    <p class="text-center text-white mb-0 px-4 small">
      Copyright &copy; <b>2018</b> All rights reserved.
    </p>
  </div>
</footer>

<script src="{{('/vendor/js/jquery-3.3.1.min.js')}}"></script>
<!-- https://jquery.com/download/ -->
<script src="{{('/vendor/js/bootstrap.min.js')}}"></script>
<!-- https://getbootstrap.com/ -->
<!-- <script>
  $(function() {
    $(".tm-product-name").on("click", function() {
      window.location.href = "edit-product.html";
    });
  });
</script> -->
</body>

</html>