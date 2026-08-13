@extends('admin.partials.layout')
@section('title', 'Cart Detail')
@section('page-title', 'Cart Detail')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Cart Detail</div>
				<a href="{{ route('admin.carts') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tr><th>ID</th><td>{{ $item->id }}</td></tr>
					<tr><th>User ID</th><td>{{ $item->user_id }}</td></tr>
					<tr><th>Product ID</th><td>{{ $item->product_id }}</td></tr>
					<tr><th>Quantity</th><td>{{ $item->quantity }}</td></tr>
					<tr><th>Price</th><td>Rs. {{ number_format($item->price, 2) }}</td></tr>
					<tr><th>Total Price</th><td>Rs. {{ number_format($item->total_price, 2) }}</td></tr>
					<tr><th>Created</th><td>{{ $item->created_at->format('d M Y H:i') }}</td></tr>
				</table>
				<a href="{{ route('admin.carts.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
			</div>
		</div>
	</div>
</div>
@endsection
