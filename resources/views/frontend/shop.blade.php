@extends('frontend.master.master')

@section('content')
<h2 class="title text-center">Features Items</h2>
						
						@foreach($last as $laster)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="/{{$laster['imgpath']}}" alt="" height="267" width="189" />
											<h2>&#8364;{{$laster['price']}}</h2>
											<p>{{$laster['name']}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>&#8364;{{$laster['price']}}</h2>
												<p>{{$laster['name']}}</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
@stop