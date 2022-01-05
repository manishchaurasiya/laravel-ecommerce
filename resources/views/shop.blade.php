<title>Shop</title>
<!-- mobile menu -->
<div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>
@include('layouts.header')


<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Shop</span></li>
				</ul>
			</div>
			<div class="row">

				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

					<div class="banner-shop">
						<a href="#" class="banner-link">
							<figure><img src="assets/images/shop-banner.jpg" alt=""></figure>
						</a>
					</div>

					<div class="wrap-shop-control">
						<!-- <h3 style="margin-left: 10px; font-weight:900;">Category</h3> -->
						<h1 class="shop-title">
							@if($categoryName)
							{{'Category'." " .$categoryName}}
							@elseif($brandName)
							{{'Brand'." " .$brandName}}
							@elseif($colorName)
							{{'Color'." " .$colorName}}
							@else
							{{'All product'}}

							@endif   
						</h1>

						<!-- <div class="wrap-right">

							<div class="sort-item orderby ">
								<select name="orderby" class="use-chosen" >
									<option value="menu_order" selected="selected">Default sorting</option>
									<option value="popularity">Sort by popularity</option>
									<option value="rating">Sort by average rating</option>
									<option value="date">Sort by newness</option>
									<option value="price">Sort by price: low to high</option>
									<option value="price-desc">Sort by price: high to low</option>
								</select>
							</div>

							<div class="sort-item product-per-page">
								<select name="post-per-page" class="use-chosen" >
									<option value="12" selected="selected">12 per page</option>
									<option value="16">16 per page</option>
									<option value="18">18 per page</option>
									<option value="21">21 per page</option>
									<option value="24">24 per page</option>
									<option value="30">30 per page</option>
									<option value="32">32 per page</option>
								</select>
							</div>

							<div class="change-display-mode">
								<a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
								<a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
							</div>

						</div> -->

					</div>
					<!-- end wrap shop control -->

					<div class="row">
						
						<ul class="product-list grid-products equal-container">
							<!-- {{$categoryName}} -->
							@foreach($products as $product)
							<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
								<div class="product product-style-3 equal-elem ">
									<div class="product-thumnail">
										<a href="{{route ('detail',$product->id) }}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
											<figure><img src="{{asset ('storage/'.$product->Thumbnail->file) }}" ></figure>
										</a>
									</div>
									<div class="product-info">
										<a href="{{route ('detail',$product->id) }}" class="product-name"><span>{{$product->name}}</span></a>
										<div class="wrap-price"><span class="product-price">{{$product->price}}</span></div>
										<a href="{{route ('checkout',$product->id) }}" class="btn add-to-cart">Buy now</a>
									</div>
								</div>
							</li>
							@endforeach
							
						</ul>
						
					</div>
					{{$products->withQueryString()->links()}}

				
				</div><!--end main products area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget mercado-widget categories-widget">
						<h2 class="widget-title">All Categories</h2>
						<div class="widget-content">
							<ul class="list-category">
								@foreach($categories as $category)
								<li class="category-item">
									<a href="{{route ('shop') }}?category={{ $category->id }}" class="cate-link">{{$category->name}}</a>
								</li>
								@endforeach
							</ul>
						</div>
					</div><!-- Categories widget-->

					<div class="widget mercado-widget filter-widgett">
						<h2 class="widget-title">Brand</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list has-count-index">
								@foreach($brands as $brand)
								<li class="list-item"><a class="filter-link " href="{{route ('shop') }}?brand={{ $brand->id }}">{{$brand->brand}}</a></li>
								@endforeach
							</ul>
						</div>
					</div><!-- brand widget-->
					<div class="widget mercado-widget filter-widget">
						<h2 class="widget-title">Color</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list has-count-index">
								@foreach($colors as $color)
									<li class="list-item"><a class="filter-link " href="{{route ('shop') }}?color={{ $color->id }}">{{$color->color}}</a></li>
								@endforeach
							</ul>
						</div>
					</div><!-- Color -->


				</div><!--end sitebar-->

			</div><!--end row-->

		</div><!--end container-->

	</main>

    @include('layouts.footer')