@include('header')
<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Change Password</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="login-form form-item form-stl">
                            <form method="POST" action="{{ route('updatePassword') }}">
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Change your password</h3>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-uname">Old Password:</label>
                                    <input type="Password" id="frm-login-uname" name="oldPassword" placeholder="Type your old password">
                                    @error('oldPassword')
                                    <div> 
                                        <span style="color: red; margin-top:20px;font-weight:900;">{{$message}}</span>
                                    </div>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-pass">New Password:</label>
                                    <input type="text" id="frm-login-pass" name="password" placeholder="************">
                                    @error('newPassword')
                                    <div> 
                                        <span style="color: red; margin-top:20px;font-weight:900;">{{$message}}</span>
                                    </div>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-pass">Confirm Password:</label>
                                    <input type="text" id="frm-login-pass" name="password_confirmation" placeholder="************">
                                  
                                </fieldset>
                                <input type="submit" class="btn btn-submit" value="Change Password">
                            </form>
                        </div>
                    </div>
                </div>
                <!--end main products area-->
            </div>
        </div>
        <!--end row-->

    </div>
    <!--end container-->

</main>