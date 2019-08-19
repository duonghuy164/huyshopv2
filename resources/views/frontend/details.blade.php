
	
	@extends('frontend.master')



@section('title')
    Chi tiết sản phẩm

@endsection
	<!-- main -->

	@section('main')
	<link rel="stylesheet" href="frontend/css/details.css">
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
							<li class="menu-item"><a href="#" title="">Danh Mục Sản Phẩm</a></li>
							@foreach($categories as $cate)
							<li class="menu-item"><a href="{{ 'category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html' }}" title="">{{ $cate->cate_name }}</a></li>
							@endforeach							
						</ul>
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>

					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<a href="#"><img src="frontend/img/home/banner-l-1.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="frontend/img/home/banner-l-2.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="frontend/img/home/banner-l-3.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="frontend/img/home/banner-l-4.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="frontend/img/home/banner-l-5.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="frontend/img/home/banner-l-6.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="frontend/img/home/banner-l-7.png" alt="" class="img-thumbnail"></a>
						</div>
					</div>
				</div>

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					


					<div id="wrap-inner">
						<div id="product-info">
							<div class="clearfix"></div>
							<h3>{{ $item->prod_name }}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img src="{{ asset('upload/'.$item->prod_img )}}"class="img-thumbnail">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
									<p>Giá: <span class="price">{{ number_format( $item->prod_price,0,',','.') }}VND</span></p>
									<p>Bảo hành: {{ $item->prod_warranty }}</p> 
									<p>Phụ kiện: {{ $item->prod_accessories }}</p>
									<p>Tình trạng: {{ $item->prod_condition }}</p>
									<p>Khuyến mại: {{ $item->prod_promotion }}</p>
									<p>Còn hàng:
									 @if($item->prod_status==1)
									   Còn Hàng
									 @else
									     Hết Hàng
									 @endif

									</p>
									<p class="add-cart text-center"><a href="{{ asset('cart/add/'.$item->prod_id) }}">Đặt hàng online</a></p>
								</div>
							</div>							
						</div>
						<div id="product-detail">
							<h3>Chi tiết sản phẩm</h3>
							<p class="text-justify">
								{!!$item->prod_description !!}
							</p>
						</div>
						<div id="comment">
							<h3>Bình luận</h3>
							<div class="col-md-9 comment">
								<form method="post">
									<div class="form-group">
										<label for="email">Email:</label>
										<input required type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
										<label for="name">Tên:</label>
										<input required type="text" class="form-control" id="name" name="name">
									</div>
									<div class="form-group">
										<label for="cm">Bình luận:</label>
										<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-default">Gửi</button>
									</div>
									{{ csrf_field() }}
								</form>
							</div>
						</div>
						<div id="comment-list">
							@foreach($comments as $cm)
							<ul>
								<li class="com-title">
									{{ $cm->com_name }}
									<br>
									<span>{{ date('d/m/Y H:i',strtotime($cm->created_at)) }}</span>	
								</li>
								<li class="com-details">
									{{ $cm->com_content }}
								</li>
							</ul>
							@endforeach
						</div>
					</div>					
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->

	@endsection