@include('header')
<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Register</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="register-form form-item ">
                            <form class="" action="{{ route('register') }}" name="frm-login" method="post">
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Create an account</h3>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <input type="hidden" id="frm-reg-hiden" name="roleid" value="2">
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">Name*</label>
                                    <input type="text" id="frm-reg-lname" name="name" placeholder="name*">
                                    @error('name')
                                    <span style="color:red; font-weight:900; margin-top:10px;">{{$message}}</span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-email">Email Address*</label>
                                    <input type="email" id="frm-reg-email" name="email" placeholder="Email address">
                                    @error('email')
                                    <span style="color:red; font-weight:900; margin-top:10px;">{{$message}}</span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input ">
                                    <label class="remember-field">Password * </label>
                                    <input name="password" id="frm-reg-pass" value="forever" type="password">
                                    @error('password')
                                    <span style="color:red; font-weight:900; margin-top:10px;">{{$message}}</span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input ">
                                    <label for="frm-reg-cfpass">Confirm Password *</label>
                                    <input type="text" id="frm-reg-cfpass" name="password_confirmation" placeholder="Confirm Password">
                                </fieldset>
                                <fieldset class="wrap-input ">
                                    <div class="flex items-center justify-end mt-4">
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                            {{ __('Already registered?') }}
                                        </a>
                                        <input type="submit" class="btn btn-sign" value="{{ __('Register') }}" name="register" id="submit">
                                    </div>
                                </fieldset>

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

<script>
    $(document).ready(function() {
        $('#submit').click(function(e) {
            e.preventDefault();
            var name = $('#frm-reg-lname').val();
            var email = $('#frm-reg-email').val();
            var password = $('#frm-reg-pass').val();
            var confirm_password = $('#frm-reg-cfpass').val();
            // console.log(name,email,password,confirm_password);
            var email_pattern = new RegExp(/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i);
            var password_pattern = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30}$/);
            $('.error').hide();
            if (name.length < 1) {
                $('#frm-reg-lname').after('<span class="error" style="color:red;font-weight:900; margin-top:10px;">This field is required</span>');
            } else if (email.length < 1) {
                $('#frm-reg-email').after('<span class="error" style="color:red;font-weight:900; margin-top:10px;">This field is required</span>');
            } else if (!email_pattern.test(email)) {
                $('#frm-reg-email').after('<span class="error" style="color:red;font-weight:900; margin-top:10px;">Enter a valid email address</span>');
            } else if (!password_pattern.test(password)) {
                $('#frm-reg-pass').after('<span class="error" style="color:red;font-weight:900; margin-top:10px;">Minimum eight characters, at least one upper and lower case letter, one number and one special character</span>');
            } else {
                $('#submit').submit();
            }


        });
    });
</script>