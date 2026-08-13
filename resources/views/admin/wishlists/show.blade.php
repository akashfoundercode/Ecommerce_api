@extends('admin.partials.layout')
@section('title', 'Wishlist Detail')
@section('page-title', 'Wishlist Detail')
@section('content')
<div class="row"><div class="col-md-8 offset-md-2"><div class="card">
	<div class="card-header d-flex justify-content-between align-items-center"><div class="card-title">Wishlist #{{ $item->id }}</div><a href="{{ route('admin.wishlists') }}" class="btn btn-secondary btn-sm">Back</a></div>
	<div class="card-body">
		<table class="table table-bordered">
			<tr><th>User ID</th><td>{{ $item->user_id }}</td></tr>
			<tr><th>Product ID</th><td>{{ $item->product_id }}</td></tr>
			<tr><th>Product</th><td>{{ $item->product_name }}</td></tr>
			<tr><th>Price</th><td>Rs. {{ number_format($item->price, 2) }}</td></tr>
			<tr><th>Status</th><td>{{ $item->status }}</td></tr>
		</table>
		<a href="{{ route('admin.wishlists.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
		<a href="{{ route('admin.wishlists.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
	</div>
</div></div></div>
@endsection
