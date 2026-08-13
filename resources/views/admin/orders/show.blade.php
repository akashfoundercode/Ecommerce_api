@extends('admin.partials.layout')
@section('title', 'Order Detail')
@section('page-title', 'Order Detail')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Order Detail</div>
				<a href="{{ route('admin.orders') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tr><th>ID</th><td>{{ $item->id }}</td></tr>
					<tr><th>Order Number</th><td>{{ $item->order_number }}</td></tr>
					<tr><th>User ID</th><td>{{ $item->user_id }}</td></tr>
					<tr><th>Total Amount</th><td>Rs. {{ number_format($item->total_amount, 2) }}</td></tr>
					<tr><th>Payment Method</th><td>{{ $item->payment_method }}</td></tr>
					<tr><th>Payment Status</th><td><span class="badge badge-{{ $item->payment_status == 'paid' ? 'success' : 'warning' }}">{{ $item->payment_status }}</span></td></tr>
					<tr><th>Order Status</th><td><span class="badge badge-info">{{ $item->order_status }}</span></td></tr>
					<tr><th>Phone</th><td>{{ $item->phone }}</td></tr>
					<tr><th>Created</th><td>{{ $item->created_at->format('d M Y H:i') }}</td></tr>
				</table>
				<a href="{{ route('admin.orders.edit', $item) }}" class="btn btn-warning btn-sm">Update</a>
				<a href="{{ route('admin.orders.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
			</div>
		</div>
	</div>
</div>
@endsection
