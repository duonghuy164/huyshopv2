

@extends('frontend.master')
	<!-- main -->

	@section('main')
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
							<li class="menu-item">Danh Mục Sản Phẩm</li>
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
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
						</div>					
					</div>

					<div id="wrap-inner">
						<div id="list-cart">
							<h3>Giỏ hàng</h3>
							<form>
								<table class="table table-bordered .table-responsive text-center">
									<tr class="active">
										<td width="11.111%">Ảnh mô tả</td>
										<td width="22.222%">Tên sản phẩm</td>
										<td width="22.222%">Số lượng</td>
										<td width="16.6665%">Đơn giá</td>
										<td width="16.6665%">Thành tiền</td>
										<td width="11.112%">Xóa</td>

								    @foreach($items as $it)
									</tr>
									<tr>
										<td><img class="img-responsive" width="80px" height="80px" src="{{ asset('upload/'.$it->attributes->img) }}"></td>
										<td>{{ $it->name }}</td>
										<td>
											<div class="form-group">
												<input class="form-control" type="number" value="{{ $it->quantity }}" onchange="updateCart(this.value,'{{ $it->id }}')">
											</div>
										</td>
										<td><span class="price">{{ number_format( $it->price,0,',','.')}}</span></td>
										<td><span class="price">{{ number_format( $it->price*$it->quantity,0,',','.')}}</span></td>
										<td><a href="{{ asset('cart/delete/'.$it->id) }}">Xóa</a></td>
									</tr>
									@endforeach
								</table>
								
							</form>             	                	
						</div>
                        @if(Cart::getTotal()>=1)
						<div id="xac-nhan">
							<div class="row" id="total-price">
									<div class="col-md-6 col-sm-12 col-xs-12">										
											Tổng thanh toán: <span class="total-price">{{ number_format( $total,0,',','.')}} đ</span>
																													
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<a href="" class="my-btn btn">Mua tiếp</a>
										<a href="#" class="my-btn btn">Cập nhật</a>
										<a href="{{ asset('cart/delete/all') }}" class="my-btn btn">Xóa giỏ hàng</a>
									</div>
								</div>
							<h3>Xác nhận mua hàng</h3>
							<form>
								<div class="form-group">
									<label for="email">Email address:</label>
									<input required type="email" class="form-control" id="email" name="email">
								</div>
								<div class="form-group">
									<label for="name">Họ và tên:</label>
									<input required type="text" class="form-control" id="name" name="name">
								</div>
								<div class="form-group">
									<label for="phone">Số điện thoại:</label>
									<input required type="number" class="form-control" id="phone" name="phone">
								</div>
								<div class="form-group">
									<label for="add">Địa chỉ:</label>
									<input required type="text" class="form-control" id="add" name="add">
								</div>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
								</div>
							</form>
						</div>
						@else
						 <div>
						 	<h1>Bạn Chưa Chọn Mặt Hàng Nào</h1>
						 	<a href="" class="my-btn btn">Mua Hàng</a>
						 </div>
						@endif

					</div>

					
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->

	<!-- footer -->
	 {{-- ajax update Gio Hang --}}
	<script type="text/javascript">
		
		function updateCart(qty ,id){
			// console.log(qty);
			// console.log(id);
			$.get(
				// url,
				// doi tuong,
				// phuong thuc
				'{{ asset('cart/update') }}',
				{
					qty:qty,
					id:id,

				},
				function(){
					location.reload();
				}




				);

		}
	</script>
	@endsection


	@section('title')
	   Giỏ Hàng

	@endsection