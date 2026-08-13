@extends('admin.partials.layout')
@section('title', 'Product Image Detail')
@section('page-title', 'Product Image Detail')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center"><div class="card-title">Image #{{ $item->id }}</div><a href="{{ route('admin.product-images') }}" class="btn btn-secondary btn-sm">Back</a></div>
	<div class="card-body">
		<p>
			<strong>Product:</strong>
			 {{ $item->product->product_name ?? $item->product_id }}
			</p>
		@if($item->image)
		<p>
			<img src="{{ asset('storage/'.$item->image) }}" style="max-width:240px;border-radius:4px;">
		</p>
		@endif
		<a href="{{ route('admin.product-images.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
		<a href="{{ route('admin.product-images.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
	</div>
</div></div></div>
@endsection
