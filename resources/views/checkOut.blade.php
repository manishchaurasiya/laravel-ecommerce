@include('layouts.header')

<main id="main" class="main-site">

	<div class="container">
		<div class=" main-content-area">
			<div class="wrap-address-billing">
				<h3 class="box-title">Billing Address</h3>
				<form role="form" action="{{route ('order',$products->id) }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{'pk_test_51Jvy5USGXOKFwj9ebBhibTUW6GCgqFdM3hl2kkuNAxgvrTOegBf93yOidAhTLqfG4Mi0JRmLcYhw9E11t2Q5nYSZ00YxCRZ5zo'}}" id="payment-form">
					@csrf
					<p class="row-in-form">
						<label for="fname">first name<span>*</span></label>
						<input id="fname" type="text" name="name" value="{{$userDetail->name}}" placeholder="Your name">
						@error('name')
					<div class="error-message"> {{$message}} </div>
					@enderror
					</p>
					<p class="row-in-form">
						<label for="email">Email Addreess:</label>
						<input id="email" type="email" name="email" value="{{$userDetail->email}}" placeholder="Type your email">
						@error('email')
        <div class="error-message">  {{$message}} </div>
       @enderror
					</p>
					<p class="row-in-form">
						<label for="phone">Phone number<span>*</span></label>
						<input id="phone" type="text" name="phone" value="{{$userDetail->phone_no}}" placeholder="10 digits format">
						@error('phone')
					<div class="error-message"> {{$message}} </div>
					@enderror
					</p>
					<p class="row-in-form">
						<label for="add">Address:</label>
						<input id="add" type="text" name="address" value="{{$userDetail->address_1}}" placeholder="Street and apartment number">
						@error('address')
					<div class="error-message"> {{$message}} </div>
					@enderror
					</p>
					<p class="row-in-form">
						<label for="zip-code">Postcode / ZIP:</label>
						<input id="zip-code" type="number" name="zip_code" value="{{$userDetail->zip_code}}" placeholder="Your postal code">
						@error('zip_code')
					<div class="error-message"> {{$message}} </div>
					@enderror
					</p>
					<p class="row-in-form">
						<label for="city">Town / City<span>*</span></label>
						<input id="city" type="text" name="city" value="{{$userDetail->city_id}}" placeholder="City name">
						@error('city')
					<div class="error-message"> {{$message}} </div>
					@enderror
					</p>

					<p class="row-in-form">
						<label for="city">State<span>*</span></label>
						<input id="city" type="text" name="state" value="{{$userDetail->state_id}}" placeholder="State name">
						@error('state')
					<div class="error-message"> {{$message}} </div>
					@enderror
					</p>
					<p class="row-in-form">
						<label for="country">Country<span>*</span></label>
						<input id="country" type="text" name="country" value="{{$userDetail->country_id}}" placeholder="United States">
						@error('country')
					<div class="error-message"> {{$message}} </div>
					@enderror
					</p>


			</div>
			<div class="summary summary-checkout">
				<div class="container-fluid">
					<div class="summary-item payment-method">
						<h4 class="title-box">Payment</h4>
						<div class="row">
							<div class="col-md-12 col-md-offset-6">
								<div class="panel panel-default credit-card-box">
									<div class="panel-heading display-table">
										<div class="row display-tr">
											<h3 class="panel-title display-td">Payment Details</h3>
											<div class="display-td">
												<img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
											</div>
										</div>
									</div>
									<div class="panel-body">

										@if (Session::has('success'))
										<div class="alert alert-success text-center">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<p>{{ Session::get('success') }}</p>
										</div>
										@endif


										<div class='form-row row'>
											<div class='col-xs-12 form-group required'>
												<label class='control-label'>Name on Card</label> <input class='form-control' size='4' type='text'>
											</div>
										</div>

										<div class='form-row row'>
											<div class='col-xs-12 form-group card required'>
												<label class='control-label'>Card Number</label> <input autocomplete='off' class='form-control card-number' size='20' type='text'>
											</div>
										</div>

										<div class='form-row row'>
											<div class='col-xs-12 col-md-4 form-group cvc required'>
												<label class='control-label'>CVC</label> <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
											</div>
											<div class='col-xs-12 col-md-4 form-group expiration required'>
												<label class='control-label'>Expiration Month</label> <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
											</div>
											<div class='col-xs-12 col-md-4 form-group expiration required'>
												<label class='control-label'>Expiration Year</label> <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
											</div>
										</div>

										<div class='form-row row'>
											<div class='col-md-12 error form-group hide'>
												<div class='alert-danger alert'>Please correct the errors and try
													again.</div>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-12">
												<input type="hidden" name="total_price" value="{{$totalPrice}}">
								
												<button class="btn btn-primary btn-lg btn-block" name="total_price" type="submit">Pay Now {{$totalPrice}}</button>
												@error('total_price')
					<div class="error-message"> {{$message}} </div>
					@enderror
											</div>
										</div>

										</form>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
		<!--end main content area-->
	</div>
	<!--end container-->

</main>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
	$(function() {
		var $form = $(".require-validation");
		$('form.require-validation').bind('submit', function(e) {
			var $form = $(".require-validation"),
				inputSelector = ['input[type=email]', 'input[type=password]',
					'input[type=text]', 'input[type=file]',
					'textarea'
				].join(', '),
				$inputs = $form.find('.required').find(inputSelector),
				$errorMessage = $form.find('div.error'),
				valid = true;
			$errorMessage.addClass('hide');

			$('.has-error').removeClass('has-error');
			$inputs.each(function(i, el) {
				var $input = $(el);
				if ($input.val() === '') {
					$input.parent().addClass('has-error');
					$errorMessage.removeClass('hide');
					e.preventDefault();
				}
			});

			if (!$form.data('cc-on-file')) {
				e.preventDefault();
				Stripe.setPublishableKey($form.data('stripe-publishable-key'));
				Stripe.createToken({
					number: $('.card-number').val(),
					cvc: $('.card-cvc').val(),
					exp_month: $('.card-expiry-month').val(),
					exp_year: $('.card-expiry-year').val()
				}, stripeResponseHandler);
			}

		});

		function stripeResponseHandler(status, response) {
			if (response.error) {
				$('.error')
					.removeClass('hide')
					.find('.alert')
					.text(response.error.message);
			} else {
				/* token contains id, last4, and card type */
				var token = response['id'];

				$form.find('input[type=text]').empty();
				$form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
				$form.get(0).submit();
			}
		}

	});
</script>

@include('layouts.footer')