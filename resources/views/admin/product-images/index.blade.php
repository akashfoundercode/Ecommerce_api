@extends('admin.partials.layout')
@section('title', 'Product Images')
@section('page-title', 'Product Images')
@section('content')
<div class="row">
	<div class="col-md-12">
	<div class="card">
		<div class="card-header d-flex justify-content-between align-items-center"><div class="card-title">Product Images</div><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">+ Add Image</button></div><div class="card-body"><div class="table-responsive">
		<table class="table table-head-bg-success table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Product</th>
					<th>Image</th>
					<th>Created</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>@forelse($items as $item)
				<tr>
				<td>{{ $item->id }}</td>
				<td>{{ $item->product->product_name ?? $item->product_id }}</td>
				<td>@if($item->image)<img src="{{ asset('storage/'.$item->image) }}" style="width:60px;height:60px;object-fit:cover;border-radius:4px;">@else<span class="text-muted">No Image</span>@endif</td>
				<td>{{ $item->created_at->format('d M Y') }}</td>
				<td><a href="{{ route('admin.product-images.show', $item) }}" class="btn btn-info btn-sm">View</a> <a href="{{ route('admin.product-images.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a> <a href="{{ route('admin.product-images.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a></td>
			</tr>
			@empty
			<tr>
				<td colspan="5" class="text-center text-muted">No product images found.</td></tr>@endforelse</tbody>
		</table>
	</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="{{ route('admin.product-images.store') }}" method="POST" enctype="multipart/form-data">@csrf
	<div class="modal-header">
		<h5 class="modal-title">Add Image</h5>
		<button type="button" class="close" data-dismiss="modal">
			<span>&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<label>Product</label>
			<select name="product_id" class="form-control" required>
				<option value="">-- Select --</option>@foreach($products as $product)<option value="{{ $product->id }}">{{ $product->product_name }}</option>@endforeach</select>
			</div>
		<div class="form-group">
			<label>Image</label>
			<input type="file" name="image" class="form-control-file" required>
		</div>
	</div>
	<div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button><button type="submit" class="btn btn-primary">Save</button></div>
</form>
</div>
</div>
</div>
@endsection
