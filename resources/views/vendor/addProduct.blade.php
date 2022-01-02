@include('vendor.venheader')
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Add Product</h2>
          </div>
        </div>
        <div class="row tm-edit-product-row">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form action="{{route ('vendor.insertProduct') }}" class="tm-edit-product-form" method="post" enctype="multipart/form-data" id="add_froduct">
              @csrf
              <div class="form-group mb-3">
                <label for="name">Product Name
                </label>
                <input id="name" name="name" type="text" class="form-control validate" required />
              </div>
              <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control validate" rows="3" required name="description" id="description"></textarea>
              </div>
              <div class="form-group mb-3">
                <label for="category">Category</label>
                <select class="custom-select tm-select-accounts" id="category" name="category_id">
                  <option selected value="0">Select category</option>
                  @foreach($Categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="row">
                <div class="form-group mb-6 col-xs-12 col-sm-6">
                  <label for="price">Price </label>
                  <input id="price" name="price" type="text" class="form-control validate" required />
                </div>
              </div>

          </div>
          <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
            <div class="form-group mb-3">
              <label for="color"> Select Color</label>
              <select class="custom-select tm-select-accounts" id="color" name="color_id">
                <option selected value="0">Select Color</option>
                @foreach($Colors as $Color)
                <option value="{{$Color->id}}">{{$Color->color}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group mb-3">
              <label for="brand"> Select Brand</label>
              <select class="custom-select tm-select-accounts" id="brand" name="brand_id">
                <option selected value="0">Select Brand</option>
                @foreach($Brands as $Brand)
                <option value="{{$Brand->id}}">{{$Brand->brand}}</option>
                @endforeach
              </select>
            </div>
            <label for="images" class="text-white">Upload Images</label>
            <input type="file" id="images" name="thumbnail[]" class="form-control validate" multiple>
          </div>
          <div class="col-12">
            <button type="submit" id="addProduct" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="tm-footer row tm-mt-small">
  <div class="col-12 font-weight-light">
    <p class="text-center text-white mb-0 px-4 small">
      Copyright &copy; <b>2018</b> All rights reserved.

      Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
    </p>
  </div>
</footer>

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<!-- https://jquery.com/download/ -->
<script src="{{asset('jquery-ui-datepicker/jquery-ui.min.js')}}"></script>
<!-- https://jqueryui.com/download/ -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- https://getbootstrap.com/ -->
<script>
  $(function() {
    $("#expire_date").datepicker();
  });
</script>


<script>
  $(document).ready(function() {
    $('#addProduct').click(function(e) {
      e.preventDefault();

      var name = $('#name').val();
      var description = $('#description').val();
      var category = $('#category').val();
      var price = $('#price').val();
      var color = $('#color').val();
      var brand = $('#brand').val();
      var images = $('#images').val();
      // console.log(name,description,category,price, color,brand,images);
      $('.error').hide();
      if (name.length < 1) {
        $('#name').after('<span class="error">This field is required</span>');
      } else if (description.length < 1) {
        $('#description').after('<span class="error">This field is required</span>');
      } else if (category < 1) {
        $('#category').after('<span class="error">Please select category!</span>');
      } else if (price.length < 1) {
        $('#price').after('<span class="error">Please enter price!</span>');
      } else if (brand < 1) {
        $('#brand').after('<span class="error">Please select brand!</span>');
      } else if (color < 1) {
        $('#color').after('<span class="error">Please select color!</span>');
      } else if (images.length < 1) {
        $('#images').after('<span class="error">Please select four images!</span>');
      } else {
        $('#add_froduct').submit();
      }
    });
  });
</script>
</body>

</html>