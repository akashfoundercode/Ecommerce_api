@extends('admin.partials.layout')
@section('title', 'Edit Variant')
@section('page-title', 'Edit Variant')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center">
		<div class="card-title">Edit Variant</div>
		<a href="{{ route('admin.product-variants') }}" class="btn btn-secondary btn-sm">Back</a>
	</div>
	<div class="card-body">
		<form action="{{ route('admin.product-variants.update', $item) }}" method="POST">@csrf @method('PUT')
		<div class="form-group">
			<label>Product</label>
			<select name="product_id" class="form-control" required><option value="">-- Select --</option>@foreach($products as $p)<option value="{{ $p->id }}" {{ old('product_id', $item->product_id) == $p->id ? 'selected' : '' }}>{{ $p->product_name }}</option>@endforeach</select></div>
		<div class="form-group">
			<label>Color</label>
			<input type="text" name="color" class="form-control" value="{{ old('color', $item->color) }}"></div>
		<div class="form-group">
			<label>Size</label>
			<input type="text" name="size" class="form-control" value="{{ old('size', $item->size) }}">
		</div>
		<div class="form-group">
			<label>Stock</label>
			<input type="number" name="stock" class="form-control" value="{{ old('stock', $item->stock) }}">
		</div>
		<div class="form-group">
			<label>Price</label>
			<input type="number" name="price" class="form-control" step="0.01" value="{{ old('price', $item->price) }}" required>
		</div>
		<div class="form-group">
			<label>Status</label>
			<select name="status" class="form-control">
				<option value="1" {{ old('status', $item->status) == 1 ? 'selected' : '' }}>Active</option>
				<option value="0" {{ old('status', $item->status) == 0 ? 'selected' : '' }}>Inactive</option>
			</select>
		</div>
		<button type="submit" class="btn btn-warning">Update</button>
	</form></div>
</div></div></div>
@endsection
