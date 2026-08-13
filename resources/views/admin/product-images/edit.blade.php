@extends('admin.partials.layout')
@section('title', 'Edit Product Image')
@section('page-title', 'Edit Product Image')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center"><div class="card-title">Edit Product Image</div><a href="{{ route('admin.product-images') }}" class="btn btn-secondary btn-sm">Back</a></div>
	<div class="card-body">
		<form action="{{ route('admin.product-images.update', $item) }}" method="POST" enctype="multipart/form-data">@csrf @method('PUT')
		<div class="form-group">
			<label>Product</label>
			<select name="product_id" class="form-control" required>
				<option value="">-- Select --</option>@foreach($products as $product)<option value="{{ $product->id }}" {{ old('product_id', $item->product_id) == $product->id ? 'selected' : '' }}>{{ $product->product_name }}</option>@endforeach</select>
			</div>
		@if($item->image)
		<div class="form-group">
			<img src="{{ asset('storage/'.$item->image) }}" style="width:80px;height:80px;object-fit:cover;border-radius:4px;">
		</div>
		@endif
		<div class="form-group">
			<label>Image</label>
			<input type="file" name="image" class="form-control-file">
		</div>
		<button type="submit" class="btn btn-warning">Update</button>
	</form>
</div>
</div>
</div>
</div>
@endsection
