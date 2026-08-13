@extends('admin.partials.layout')
@section('title', 'Wishlists')
@section('page-title', 'Wishlists')
@section('content')
<div class="row"><div class="col-md-12">
	<div class="card"><div class="card-header"><div class="card-title">Wishlist List</div></div>
		<div class="card-body"><div class="table-responsive">
			<table class="table table-head-bg-danger table-striped table-hover">
				<thead><tr><th>#</th><th>User ID</th><th>Product</th><th>Price</th><th>Status</th><th>Created</th><th>Actions</th></tr></thead>
				<tbody>
				@forelse($items as $item)
					<tr>
						<td>{{ $item->id }}</td><td>{{ $item->user_id }}</td><td>{{ $item->product_name }}</td>
						<td>Rs. {{ number_format($item->price, 2) }}</td><td>{{ $item->status }}</td><td>{{ $item->created_at->format('d M Y') }}</td>
						<td>
							<a href="{{ route('admin.wishlists.show', $item) }}" class="btn btn-info btn-sm">View</a>
							<a href="{{ route('admin.wishlists.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
							<a href="{{ route('admin.wishlists.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
						</td>
					</tr>
				@empty
					<tr><td colspan="7" class="text-center text-muted">No wishlist items found.</td></tr>
				@endforelse
				</tbody>
			</table>
		</div></div>
	</div>
</div></div>
@endsection
