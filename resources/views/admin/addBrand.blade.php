@include('admin.header')
<div>
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Add Brand</h2>
                        @if(session()->has('success'))
                        <div class="alert alert-success alert-block d-flex justify-content-between">
                            <div> <strong>{{ session()->get('success') }}
                                </strong> </div>
                            <div><button type="button" class="close" data-dismiss="alert">×</button></div>
                        </div>
                        @endif

                        @if(session()->has('exist'))
                        <div class="alert alert-success alert-block d-flex justify-content-between">
                            <div> <strong>{{ session()->get('exist') }}
                                </strong> </div>
                            <div><button type="button" class="close" data-dismiss="alert">×</button></div>
                        </div>
                        @endif
                        @if(session()->has('delete'))
                        <div class="alert alert-success alert-block d-flex justify-content-between">
                            <div> <strong>{{ session()->get('delete') }}
                                </strong> </div>
                            <div><button type="button" class="close" data-dismiss="alert">×</button></div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row tm-edit-product-row" style="justify-content: center;">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form action="{{route('admin.addBrand')}}" method="post" class="tm-edit-product-form">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Category Name
                                </label>
                                <input id="name" name="name" type="text" class="form-control validate" autocomplete="off" />
                                @error('name')
                                <div class="error-message">
                                    {{$message}}
                                </div>
                                @enderror

                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Now</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
                        <div class="">
                            <h2 class="tm-block-title text-center" style="margin-top:30px;">All Brands</h2>

                            <table class="table tm-table-small tm-product-table">
                                <tbody>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @php
                                        $serial_number=1;
                                    @endphp
                                    @foreach($brands as $brand)
                                    <tr>
                                        <td>{{$serial_number++}}</td>
                                        <td class="tm-product-name">{{ $brand->brand }}</td>
                                        <td>{{ $brand->status }}</td>
                                        <td class="text-center">
                                            @if($brand->status == 'Active')
                                            <a href="{{route('admin.changeBrandStatus',$brand->id)}}" class="btn btn-primary text-uppercase">Inactive</a>
                                            @else
                                            <a href="{{route('admin.changeBrandStatus',$brand->id)}}" class="btn btn-primary text-uppercase">Active</a>
                                            @endif
                                            <a href="{{route('admin.deleteBrand',$brand->id)}}" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- table container -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')