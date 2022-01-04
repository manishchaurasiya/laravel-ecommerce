@include('vendor.venheader')

<div class="container mt-5">

    <!-- row -->

    @if(session()->has('success'))
    <div class="alert alert-success alert-block d-flex justify-content-between">
        <div> <strong>{{ session()->get('success') }}
            </strong> </div>
        <div><button type="button" class="close" data-dismiss="alert">×</button></div>
    </div>
    @endif
    <div class="row tm-content-row">
        <div class="tm-block-col tm-col-avatar">
            <div class="tm-bg-primary-dark tm-block tm-block-avatar">
                <h2 class="tm-block-title">Change Avatar</h2>
                <div class="tm-avatar-container">
                    @if($data->profile_pic == 'NULL')
                    <img src="https://cdn.icon-icons.com/icons2/1904/PNG/512/profile_121261.png" alt="Avatar" class="tm-avatar img-fluid mb-4" />
                    @else
                    <img src="{{asset('storage/profile/'.$data->profile_pic)}}" alt="Avadfhckdjfdlfjtar" class="tm-avatar img-fluid mb-4" />
                    @endif
                    <a href="{{ route('vendor.deleteProfilePic') }}" class="tm-avatar-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                </div>
                <form action="{{ route('vendor.updateProfilePic') }}" method="post" enctype="multipart/form-data" id="ProfileForm">
                    @csrf
                    <input type="file" name="file" id="file" class="mb-5">
                    @error('file')
                    <div class="error-message"> {{$message}} </div>
                    @enderror
                    <input type="submit" class="btn btn-primary btn-block text-uppercase" id='updateProfile' value="Upload New Photo">
                </form>
                <!-- <script>
                $(document).ready(function(){
                    $('#updateProfile').click(function(e){
                        // e.preventDefault();
                        $('#file').click();

                            $('#ProfileForm').submit();
                        
                    });
                });
                </script> -->
            </div>
        </div>
        <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
                <h2 class="tm-block-title">Account Settings</h2>
                <form action="{{ route('vendor.updateProfile') }}" class="tm-signup-form row">
                    <div class="form-group col-lg-6">
                        <label for="name"> Name</label>
                        <input id="name" name="name" type="text" value="{{$data->name}}" class="form-control validate" />
                        @error('name')
                        <div class="form-group error-message"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" value="{{$data->email}} " class="form-control validate" />
                        @error('email')
                        <div class="form-group error-message"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="phone">Phone</label>
                        <input id="phone" name="phone" value="{{$data->phone_no}}" type="tel" class="form-control validate" />
                        @error('phone')
                        <div class="form-group error-message"> {{$message}} </div>
                        @enderror
                    </div>

                    <div class="form-group col-lg-6">
                        <label class="tm-hide-sm">&nbsp;</label>
                        <button type="submit" class="btn btn-primary btn-block text-uppercase">
                            Update Your Profile
                        </button>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block text-uppercase">
                            Delete Your Account
                        </button>
                    </div>
                </form>
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

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<!-- https://jquery.com/download/ -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- https://getbootstrap.com/ -->
</body>

</html>