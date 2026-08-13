@extends('admin.partials.layout')
@section('title', 'Variant Detail')
@section('page-title', 'Variant Detail')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center"><div class="card-title">Variant #{{ $item->id }}</div><a href="{{ route('admin.product-variants') }}" class="btn btn-secondary btn-sm">Back</a></div>
	<div class="card-body">
		<table class="table table-bordered">
		<tr>
			<th>Product</th>
		<td>{{ $products->firstWhere('id', $item->product_id)?->product_name ?? $item->product_id }}</td>
	</tr>
	<tr>
		<th>Color</th>
		
		<td>{{ $item->color }}</td>
	</tr>
	<tr>
		<th>Size</th>
	<td>{{ $item->size }}</td>
</tr>
<tr>
	<th>Stock</th>
<td>{{ $item->stock }}</td>
</tr>
<tr>
	<th>Price</th>
<td>Rs. {{ number_format($item->price, 2) }}</td>
</tr>
<tr>
	<th>Status</th>
<td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
</tr>
	</table>
	<a href="{{ route('admin.product-variants.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a> 
	<a href="{{ route('admin.product-variants.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
</div>
</div>
</div>
</div>
@endsection
