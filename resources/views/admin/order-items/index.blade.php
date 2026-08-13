@extends('admin.partials.layout')
@section('title', 'Order Items')
@section('page-title', 'Order Items')
@section('content')
<div class="row"><div class="col-md-12">
	<div class="card"><div class="card-header"><div class="card-title">Order Item List</div></div><div class="card-body"><div class="table-responsive">
		<table class="table table-head-bg-warning table-striped table-hover">
			<thead><tr><th>#</th><th>Order ID</th><th>Product ID</th><th>Qty</th><th>Price</th><th>Total</th><th>Actions</th></tr></thead>
			<tbody>@forelse($items as $item)<tr>
				<td>{{ $item->id }}</td><td>{{ $item->order_id }}</td><td>{{ $item->product_id }}</td><td>{{ $item->quantity }}</td>
				<td>Rs. {{ number_format($item->price, 2) }}</td><td>Rs. {{ number_format($item->total_price, 2) }}</td>
				<td><a href="{{ route('admin.order-items.show', $item) }}" class="btn btn-info btn-sm">View</a> <a href="{{ route('admin.order-items.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a> <a href="{{ route('admin.order-items.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a></td>
			</tr>@empty<tr><td colspan="7" class="text-center text-muted">No order items found.</td></tr>@endforelse</tbody>
		</table>
	</div></div></div>
</div></div>
@endsection
