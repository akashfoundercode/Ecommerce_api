@extends('admin.partials.layout')
@section('title', 'Coupon Detail')
@section('page-title', 'Coupon Detail')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Coupon Detail</div>
				<a href="{{ route('admin.coupons') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tr><th>ID</th><td>{{ $item->id }}</td></tr>
					<tr><th>Code</th><td><strong>{{ $item->code }}</strong></td></tr>
					<tr><th>Type</th><td>{{ $item->discount_type }}</td></tr>
					<tr><th>Discount</th><td>{{ $item->discount_type == 'percent' ? $item->discount.'%' : 'Rs. '.$item->discount }}</td></tr>
					<tr><th>Min Order Amount</th><td>Rs. {{ number_format($item->min_order_amount, 2) }}</td></tr>
					<tr><th>Usage Limit</th><td>{{ $item->usage_limit ?? 'Unlimited' }}</td></tr>
					<tr><th>Used Count</th><td>{{ $item->used_count }}</td></tr>
					<tr><th>Status</th><td><span class="badge badge-{{ $item->status ? 'success' : 'danger' }}">{{ $item->status ? 'Active' : 'Inactive' }}</span></td></tr>
					<tr><th>Created</th><td>{{ $item->created_at->format('d M Y H:i') }}</td></tr>
				</table>
				<a href="{{ route('admin.coupons.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
				<a href="{{ route('admin.coupons.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
			</div>
		</div>
	</div>
</div>
@endsection
