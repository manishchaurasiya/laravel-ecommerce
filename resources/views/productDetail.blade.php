@include('layouts.header')

<!--main area-->
<main id="main" class="main-site">

	<div class="container">

		<div class="wrap-breadcrumb">
			<ul>
				<li class="item-link"><a href="#" class="link">home</a></li>
				<li class="item-link"><span>detail</span></li>
			</ul>
		</div>
		<div class="row">

			<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
				<div class="wrap-product-detail">
					<div class="detail-media">
						<div class="product-gallery">
							<ul class="slides">

								<li data-thumb="{{asset ('storage/'.$products->thumbnail->file) }}">
									<img src="{{asset ('storage/'.$products->thumbnail->file) }}" alt="product thumbnail" />
								</li>
								@foreach($products->gallary as $product)

								<li data-thumb="{{asset ('storage/'.$product->file) }}">
									<img src="{{asset ('storage/'.$product->file) }}" alt="product thumbnail" />
								</li>

								@endforeach
							</ul>
						</div>
					</div>
					<div class="detail-info">
						<div class="product-rating">
							@php $rating = $products->average_rating;
							@endphp

							@foreach(range(1,5) as $i)
							@if($rating >0.5)
							<i class="fa fa-star" aria-hidden="true"></i>
							@elseif($rating >0 && $rating < 0.6) <i class="fa fa-star-half" aria-hidden="true"></i>
								@else
								<i class="fa fa-star-o" aria-hidden="true"></i>
								@endif
								@php $rating--; @endphp

								@endforeach
								<a href="#" class="count-review">({{$products->count_rating}} Reviews)</a>
						</div>
						<h2 class="product-name">{{ $products->name }}</h2>
						<div class="short-desc">
							<ul>
								<li>{{ $products->description }}</li>

							</ul>
						</div>
						<div class="wrap-social">
							<a class="link-socail" href="#"><img src="assets/images/social-list.png" alt=""></a>
						</div>
						<div class="wrap-price"><span class="product-price">{{ $products->price }}</span></div>
						<div class="stock-info in-stock">
							<p class="availability">Availability: <b>In Stock</b></p>
						</div>
						<form action="{{route ('checkout',$products->id) }}" method="POST">
							@csrf
							<div class="quantity">
								<span>Quantity:</span>
								<div class="quantity-input">
									<input type="text" name="product_quatity" value="1" data-max="120" pattern="[0-9]*">
									<a class="btn btn-reduce" href="#"></a>
									<a class="btn btn-increase" href="#"></a>
								</div>
							</div>
							<div class="wrap-butons">
								<button class="btn add-to-cart">Buy now</button>
								<!-- <a href="{{route ('checkout',$products->id) }}" class="btn add-to-cart">Buy now</a> -->
								<div class="wrap-btn">
									<!-- <a href="#" class="btn btn-compare">Add Compare</a>
									<a href="#" class="btn btn-wishlist">Add Wishlist</a> -->
								</div>
							</div>
						</form>
					</div>
					<div class="advance-info">
						<div class="tab-control normal">
							<a href="#description" class="tab-control-item active">description</a>
							<a href="#review" class="tab-control-item">Reviews</a>

						</div>
						<div class="tab-contents">
							<div class="tab-content-item active" id="description">
								{{$products->description}}
							</div>

							<div class="tab-content-item " id="review">

								<div class="wrap-review-form">

									<div id="comments">
										<h2 class="woocommerce-Reviews-title">{{$products->count_rating}} Reviews for <span>{{ $products->name }}</span></h2>
										<ol class="commentlist">

											@foreach($products->review as $Review)
											<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
												<div id="comment-20" class="comment_container">
													<!-- <img alt="" src="assets/images/author-avata.jpg" height="80" width="80"> -->
													<div class="comment-text">
														<div class="product-rating" style="color: #efce4a;">
															@php
															$rating =$Review->rating;
															@endphp

															@foreach(range(1,5) as $i)
															@if($rating >0.5)
															<i class="fa fa-star" aria-hidden="true"></i>
															@elseif($rating >0 && $rating < 0.6) <i class="fa fa-star-half" aria-hidden="true"></i>
																@else
																<i class="fa fa-star-o" aria-hidden="true"></i>
																@endif
																@php $rating--; @endphp

																@endforeach
														</div>
														<p class="meta">
															@php
															$name=\App\Models\User::where(['id' => $Review->user_id])->select('name')->first() ;
															@endphp
															<strong class="woocommerce-review__author">{{$name['name']}}</strong>
															<span class="woocommerce-review__dash">–</span>
															<time class="woocommerce-review__published-date" datetime="2008-02-14 20:00">{{$Review->created_at}}</time>
														</p>
														<div class="description">
															<p>{{$Review->review}}</p>
														</div>
													</div>
												</div>
											</li>
											@endforeach
										</ol>
									</div><!-- #comments -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end main products area-->

			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
				<div class="widget widget-our-services ">
					<div class="widget-content">
						<ul class="our-services">

							<li class="service">
								<a class="link-to-service" href="#">
									<i class="fa fa-truck" aria-hidden="true"></i>
									<div class="right-content">
										<b class="title">Free Shipping</b>
										<span class="subtitle">On Oder Over $99</span>
										<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
									</div>
								</a>
							</li>

							<li class="service">
								<a class="link-to-service" href="#">
									<i class="fa fa-gift" aria-hidden="true"></i>
									<div class="right-content">
										<b class="title">Special Offer</b>
										<span class="subtitle">Get a gift!</span>
										<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
									</div>
								</a>
							</li>

							<li class="service">
								<a class="link-to-service" href="#">
									<i class="fa fa-reply" aria-hidden="true"></i>
									<div class="right-content">
										<b class="title">Order Return</b>
										<span class="subtitle">Return within 7 days</span>
										<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div><!-- Categories widget-->
			</div>
			<!--end sitebar-->

			<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Related Products</h3>
					<div class="wrap-products">
						<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
							@foreach($relatedProducts as $relatedProduct)
							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="{{route ('detail',$relatedProduct->id) }}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{asset ('storage/'.$relatedProduct->thumbnail->file) }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="{{route ('detail',$relatedProduct->id) }}" class="product-name"><span>{{$relatedProduct->name }}</span></a>
									<div class="wrap-price"><span class="product-price">{{$relatedProduct->price }}</span></div>
								</div>
							</div>
							@endforeach

						</div>
					</div>
					<!--End wrap-products-->
				</div>
			</div>

		</div>
		<!--end row-->

	</div>
	<!--end container-->

</main>
<!--main area-->
@include('layouts.footer')