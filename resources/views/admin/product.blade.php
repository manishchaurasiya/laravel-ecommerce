@include('admin.header')
<div class="container">
    <!-- row -->
    <div class="row tm-content-row">
        <div class="col-12 tm-block-col">
            <div>
                <h2 class="tm-block-title text-center" style="margin-top: 20px;">All Products</h2>
                @if(session()->has('success'))
                        <div class="alert alert-success alert-block d-flex justify-content-between">
                            <div> <strong>{{ session()->get('success') }}
                                </strong> </div>
                            <div><button type="button" class="close" data-dismiss="alert">×</button></div>
                        </div>
                        @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">VENDOR</th>
                            <th scope="col">NAME</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">COLOR</th>
                            <th scope="col">BRAND</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $serial_number=1;
                        @endphp

                        @foreach($products as $product)
                        <tr>
                            <th scope="row"><b>{{$serial_number++}}</b></th>
                            <td><b>{{$product->userName->name}}</b></td>
                            <td><b>{{$product->name}}</b></td>
                            <td><b>{{$product->description}}</b></td>
                            <td><b>{{$product->price}}</b></td>
                            <td><b>{{$product->color->color}}</b></td>
                            <td><b>{{$product->brand->brand}}</b></td>
                            @if($product->status == 'Active')
                            <td>
                                <div class="tm-status-circle moving">
                                </div>{{$product->status}}
                            </td>
                            @else
                            <td>
                                <div class="tm-status-circle cancelled">
                                </div>{{$product->status}}
                            </td>
                            @endif

                            @if($product->status =='Active')
                            <td><a href="{{route ('admin.ChangeProductStatus',$product->id) }}" class="btn btn-primary text-uppercase">Inactive</a></td>
                            @else
                            <td><a href="{{route ('admin.ChangeProductStatus',$product->id) }}" class="btn btn-primary text-uppercase">Active</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
</div>
</body>

@include('admin.footer')