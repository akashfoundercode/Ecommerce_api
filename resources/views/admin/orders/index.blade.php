@extends('admin.partials.layout')
@section('title', 'Orders')
@section('page-title', 'Orders')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><div class="card-title">Order List</div></div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-head-bg-success table-striped table-hover">
						<thead>
							<tr><th>#</th><th>Order No.</th><th>User ID</th><th>Total</th><th>Payment</th><th>Payment Status</th><th>Order Status</th><th>Phone</th><th>Created</th><th>Actions</th></tr>
						</thead>
						<tbody>
							@forelse ($items as $item)
							<tr>
								<td>{{ $item->id }}</td>
								<td>{{ $item->order_number }}</td>
								<td>{{ $item->user_id }}</td>
								<td>Rs. {{ number_format($item->total_amount, 2) }}</td>
								<td>{{ $item->payment_method }}</td>
								<td><span class="badge badge-{{ $item->payment_status == 'paid' ? 'success' : 'warning' }}">{{ $item->payment_status }}</span></td>
								<td><span class="badge badge-info">{{ $item->order_status }}</span></td>
								<td>{{ $item->phone }}</td>
								<td>{{ $item->created_at->format('d M Y') }}</td>
								<td>
									<a href="{{ route('admin.orders.show', $item) }}" class="btn btn-info btn-sm">View</a>
									<a href="{{ route('admin.orders.edit', $item) }}" class="btn btn-warning btn-sm">Update</a>
									<a href="{{ route('admin.orders.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
							@empty
							<tr><td colspan="10" class="text-center text-muted">No orders found.</td></tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
