@extends('admin.partials.layout')
@section('title', 'Product Variants')
@section('page-title', 'Product Variants')
@section('content')
<div class="row">
	<div class="col-md-12">
	<div class="card">
		<div class="card-header d-flex justify-content-between align-items-center"><div class="card-title">Variant List</div><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">+ Add Variant</button></div><div class="card-body"><div class="table-responsive">
		<table class="table table-head-bg-danger table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Product</th>
					<th>Color</th>
					<th>Size</th>
					<th>Stock</th>
					<th>Price</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@forelse($items as $item)
				<tr>
				<td>
					{{ $item->id }}</td>
					<td>{{ $products->firstWhere('id', $item->product_id)?->product_name ?? $item->product_id }}</td>
					<td>{{ $item->color }}</td>
					<td>{{ $item->size }}</td>
					<td>{{ $item->stock }}</td>
					<td>Rs. {{ number_format($item->price, 2) }}</td>
				<td>
					<span class="badge badge-{{ $item->status ? 'success' : 'danger' }}">{{ $item->status ? 'Active' : 'Inactive' }}</span></td>
				<td>
					<a href="{{ route('admin.product-variants.show', $item) }}" class="btn btn-info btn-sm">View</a>
					 <a href="{{ route('admin.product-variants.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
					  <a href="{{ route('admin.product-variants.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
					</td>
			</tr>
			@empty
			<tr>
				<td colspan="8" class="text-center text-muted">No variants found.</td>
			</tr>@endforelse</tbody>
		</table>
	</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="{{ route('admin.product-variants.store') }}" method="POST">@csrf
	<div class="modal-header">
		<h5 class="modal-title">Add Variant</h5>
		<button type="button" class="close" data-dismiss="modal">
			<span>&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<label>Product</label>
			<select name="product_id" class="form-control" required>
				<option value="">-- Select --</option>@foreach($products as $p)<option value="{{ $p->id }}">{{ $p->product_name }}</option>@endforeach</select></div>
		<div class="form-group">
			<label>Color</label><input type="text" name="color" class="form-control"></div><div class="form-group"><label>Size</label><input type="text" name="size" class="form-control"></div>
		<div class="form-group">
			<label>Stock</label>
			<input type="number" name="stock" class="form-control">
		</div>
		<div class="form-group">
			<label>Price</label>
			<input type="number" name="price" class="form-control" step="0.01" required></div>
		<div class="form-group">
			<label>Status</label>
			<select name="status" class="form-control">
				<option value="1">Active</option>
				<option value="0">Inactive</option>
			</select>
		
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button><button type="submit" class="btn btn-primary">Save</button></div>
</form>
</div>
</div>
</div>
@endsection
