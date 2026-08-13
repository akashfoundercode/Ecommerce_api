@extends('admin.partials.layout')
@section('title', 'Order Item Detail')
@section('page-title', 'Order Item Detail')
@section('content')
<div class="row"><div class="col-md-8 offset-md-2"><div class="card">
	<div class="card-header d-flex justify-content-between align-items-center"><div class="card-title">Order Item #{{ $item->id }}</div><a href="{{ route('admin.order-items') }}" class="btn btn-secondary btn-sm">Back</a></div>
	<div class="card-body">
		<table class="table table-bordered">
			<tr><th>Order ID</th><td>{{ $item->order_id }}</td></tr><tr><th>Product ID</th><td>{{ $item->product_id }}</td></tr>
			<tr><th>Quantity</th><td>{{ $item->quantity }}</td></tr><tr><th>Price</th><td>Rs. {{ number_format($item->price, 2) }}</td></tr><tr><th>Total</th><td>Rs. {{ number_format($item->total_price, 2) }}</td></tr>
		</table>
		<a href="{{ route('admin.order-items.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
		<a href="{{ route('admin.order-items.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
	</div>
</div></div></div>
@endsection
