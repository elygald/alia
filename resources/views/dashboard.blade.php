@extends('layouts.default')

@section('content')
	<div class="container-fluid m-t-25">
		<div class="row">
			<div class="col-md-12">
				<div class="overview-wrap">
					<h2 class="title-1">dashboard</h2>
				</div>
			</div>
		</div>
		<div class="row m-t-25">
			<div class="col-sm-6 col-lg-4">
				<div class="overview-item overview-item--c1">
					<div class="overview__inner">
						<div class="overview-box clearfix">
							<div class="icon">
								<i class="zmdi zmdi-account-o"></i>
							</div>
							<div class="text">
								<h2>{{ $leadCount }}</h2>
								<span>potenciais clientes</span>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-4">
			<div class="overview-item overview-item--c2">
				<div class="overview__inner">
					<div class="overview-box clearfix">
						<div class="icon">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
						<div class="text">
							<h2>{{ $orderCount }}</h2>
							<span>pedidos</span>
						</div>
					</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-4">
		<div class="overview-item overview-item--c4">
			<div class="overview__inner">
				<div class="overview-box clearfix">
					<div class="icon">
						<i class="zmdi zmdi-money"></i>
					</div>
					<div class="text">
						<h2>{{ $amountSum }}</h2>
						<span>faturamento</span>
					</div>
				</div>
		</div>
	</div>
	</div>
	</div>

	</div>
@endsection