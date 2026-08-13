@extends('admin.partials.layout')
@section('title', 'Edit Product')
@section('page-title', 'Edit Product')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Edit Product</div>
				<a href="{{ route('admin.products') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body">
				<form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
					@csrf @method('PUT')
					<div class="row">
						<div class="form-group col-md-6"><label>Product Name</label><input type="text" name="product_name" class="form-control" value="{{ old('product_name', $product->product_name) }}" required></div>
						<div class="form-group col-md-3"><label>Price</label><input type="number" name="price" class="form-control" step="0.01" value="{{ old('price', $product->price) }}" required></div>
						<div class="form-group col-md-3"><label>Selling Price</label><input type="number" name="selling_price" class="form-control" step="0.01" value="{{ old('selling_price', $product->selling_price) }}"></div>
						<div class="form-group col-md-3"><label>SKU</label><input type="text" name="sku" class="form-control" value="{{ old('sku', $product->sku) }}"></div>
						<div class="form-group col-md-3"><label>Stock</label><input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}"></div>
						<div class="form-group col-md-3"><label>Category</label>
							<select name="category_id" class="form-control"><option value="">-- Select --</option>@foreach($categories as $cat)<option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>@endforeach</select>
						</div>
						<div class="form-group col-md-3"><label>SubCategory</label>
							<select name="sub_category_id" class="form-control"><option value="">-- Select --</option>@foreach($subcategories as $cat)<option value="{{ $cat->id }}" {{ old('sub_category_id', $product->sub_category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>@endforeach</select>
						</div>
						<div class="form-group col-md-3"><label>Brand</label>
							<select name="brand_id" class="form-control"><option value="">-- Select --</option>@foreach($brands as $brand)<option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->brand_name }}</option>@endforeach</select>
						</div>
						<div class="form-group col-md-6"><label>Description</label><textarea name="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea></div>
						<div class="form-group col-md-6"><label>Thumbnail</label><br>
							@if($product->image_url)<img src="{{ $product->image_url }}" style="width:80px;height:80px;object-fit:cover;border-radius:4px;margin-bottom:8px;display:block;">@endif
							<input type="file" name="thumbnail" class="form-control-file">
						</div>
						<div class="form-group col-md-3"><label>Status</label>
							<select name="status" class="form-control">
								<option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active</option>
								<option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Inactive</option>
							</select>
						</div>
					</div>
					<button type="submit" class="btn btn-warning">Update Product</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
