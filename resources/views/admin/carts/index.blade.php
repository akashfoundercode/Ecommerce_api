@extends('admin.partials.layout')
@section('title', 'Carts')
@section('page-title', 'Carts')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><div class="card-title">Cart List</div></div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-head-bg-primary table-striped table-hover">
						<thead>
							<tr><th>#</th><th>User ID</th><th>Product ID</th><th>Quantity</th><th>Price</th><th>Total Price</th><th>Created</th><th>Actions</th></tr>
						</thead>
						<tbody>
							@forelse ($items as $item)
							<tr>
								<td>{{ $item->id }}</td>
								<td>{{ $item->user_id }}</td>
								<td>{{ $item->product_id }}</td>
								<td>{{ $item->quantity }}</td>
								<td>Rs. {{ number_format($item->price, 2) }}</td>
								<td>Rs. {{ number_format($item->total_price, 2) }}</td>
								<td>{{ $item->created_at->format('d M Y') }}</td>
								<td>
									<a href="{{ route('admin.carts.show', $item) }}" class="btn btn-info btn-sm">View</a>
									<a href="{{ route('admin.carts.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
							@empty
							<tr><td colspan="8" class="text-center text-muted">No cart items found.</td></tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
