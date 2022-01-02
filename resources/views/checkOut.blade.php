@include('layouts.header')

<main id="main" class="main-site">

	<div class="container">
		<div class=" main-content-area">
			<div class="wrap-address-billing">
				<h3 class="box-title">Billing Address</h3>
				<form action="#" method="get" name="frm-billing">
					<p class="row-in-form">
						<label for="fname">first name<span>*</span></label>
						<input id="fname" type="text" name="fname" value="{{$userDetail->name}}" placeholder="Your name">
					</p>
					<p class="row-in-form">
						<label for="lname">last name<span>*</span></label>
						<input id="lname" type="text" name="lname" value="" placeholder="Your last name">
					</p>
					<p class="row-in-form">
						<label for="email">Email Addreess:</label>
						<input id="email" type="email" name="email" value="{{$userDetail->email}}" placeholder="Type your email">
					</p>
					<p class="row-in-form">
						<label for="phone">Phone number<span>*</span></label>
						<input id="phone" type="text" name="phone" value="{{$userDetail->phone_no}}" placeholder="10 digits format">
					</p>
					<p class="row-in-form">
						<label for="add">Address:</label>
						<input id="add" type="text" name="add" value="{{$userDetail->address_1}}" placeholder="Street at apartment number">
					</p>
					<p class="row-in-form">
						<label for="country">Country<span>*</span></label>
						<input id="country" type="text" name="country" value="{{$userDetail->country_id}}" placeholder="United States">
					</p>
					<p class="row-in-form">
						<label for="zip-code">Postcode / ZIP:</label>
						<input id="zip-code" type="number" name="zip-code" value="{{$userDetail->zip_code}}" placeholder="Your postal code">
					</p>
					<p class="row-in-form">
						<label for="city">Town / City<span>*</span></label>
						<input id="city" type="text" name="city" value="{{$userDetail->city_id}}" placeholder="City name">
					</p>

				</form>
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

										<form role="form" action="{{route ('order',$products->id) }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{'pk_test_51Jvy5USGXOKFwj9ebBhibTUW6GCgqFdM3hl2kkuNAxgvrTOegBf93yOidAhTLqfG4Mi0JRmLcYhw9E11t2Q5nYSZ00YxCRZ5zo'}}" id="payment-form">
											@csrf
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

			<!-- <div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Most Viewed Products</h3>
					<div class="wrap-products">
						<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_17.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_15.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_01.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_21.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_03.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="assets/images/products/digital_05.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>
						</div>
					</div><!--End wrap-products-->
		</div> -->

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