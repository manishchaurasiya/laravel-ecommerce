@include('vendor.venheader')
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Edit Product</h2>
          </div>
        </div>
        <div class="row tm-edit-product-row">
          <div class="col-xl-6 col-lg-6 col-md-12">
            <form action="{{route ('vendor.updateProduct', $productDetails->id) }}" method="post" class="tm-edit-product-form">
              @csrf
              <div class="form-group mb-3">
                <label for="name">Product Name
                </label>
                <input id="name" name="name" type="text" value="{{$productDetails->name}}" class="form-control validate" />
              </div>
              <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control validate tm-small" rows="5" name="description" required>{{$productDetails->description}}</textarea>
              </div>
              <div class="form-group mb-3">
                <label for="category">Category</label>
                <!-- {{$productDetails->category->name}} -->
                <select class="custom-select tm-select-accounts" name="category" id="category">
                  <option>Select category</option>
                  @foreach($categories as $key => $category)
                  @if($category == $productDetails->category)
                  <option value="{{$category->id}}" selected>{{$category->name}}</option>
                  @else
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="form-group mb-3">
                <label for="category">Color</label>
                <select class="custom-select tm-select-accounts" name="color" id="category">
                  <option>Select color</option>
                  @foreach($colors as $key => $color)
                  @if($color == $productDetails->color)
                  <option value="{{$color->id}}" selected>{{$color->color}}</option>
                  @else
                  <option value="{{$color->id}}">{{$color->color}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="form-group mb-3">
                <label for="category">Brand</label>
                <select class="custom-select tm-select-accounts" name="brand" id="category">
                  <option>Select brand</option>
                  @foreach($brands as $brand)
                  @if($brand== $productDetails->brand)
                  <option value="{{$brand->id}}" selected>{{$brand->brand}}</option>
                  @else
                  <option value="{{$brand->id}}">{{$brand->brand}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="row">
                <div class="form-group mb-3 col-xs-12 col-sm-6">
                  <label for="price">Price</label>
                  <input id="price" name="price" type="number" value="{{$productDetails->price}}" min="1" class="form-control validate" />
                </div>
              </div>

             </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-edit mx-auto">
                  <img src="{{asset ('storage/'.$productDetails->Thumbnail->file)}}" width="100px" height="100px" alt="Product image" class="img-fluid d-block mx-auto">
                  @foreach($productDetails->gallary as $photo)
                  <img src="{{asset ('storage/'.$photo->file)}}" width="100px" height="100px" alt="Product image" class=" mt-5 mx-auto">
                  @endforeach
                  <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"></i>
                </div>
                <div class="custom-file mt-3 mb-3">
                  <input id="fileInput" type="file" style="display:none;" />
                  <input type="button" class="btn btn-primary btn-block mx-auto" value="CHANGE IMAGE NOW" onclick="document.getElementById('fileInput').click();" />
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Update Now</button>
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

<script src="{{('vendor/js/jquery-3.3.1.min.js')}}"></script>
<!-- https://jquery.com/download/ -->
<script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
<!-- https://jqueryui.com/download/ -->
<script src="{{('vendor/js/bootstrap.min.js')}}"></script>
<!-- https://getbootstrap.com/ -->
<script>
  $(function() {
    $("#expire_date").datepicker({
      defaultDate: "10/22/2020"
    });
  });
</script>
</body>

</html>