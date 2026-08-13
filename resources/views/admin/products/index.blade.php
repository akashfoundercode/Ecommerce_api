@extends('admin.partials.layout')
@section('title', 'Products')
@section('page-title', 'Products')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Product List</div>
				<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">+ Add Product</button>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-head-bg-primary table-striped table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Image</th>
								<th>Name</th>
								<th>SKU</th>
								<th>Price</th>
								<th>Selling Price</th>
								<th>Stock</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($products as $product)
							<tr>
								<td>{{ $product->id }}</td>
								<td>
									@if($product->image_url)
										<img src="{{ $product->image_url }}" style="width:45px;height:45px;object-fit:cover;border-radius:4px;">
									@else
										<span class="text-muted">—</span>
									@endif
								</td>
								<td>{{ $product->product_name }}</td>
								<td>{{ $product->sku ?? '—' }}</td>
								<td>Rs. {{ number_format($product->price, 2) }}</td>
								<td>Rs. {{ number_format($product->selling_price, 2) }}</td>
								<td>{{ $product->stock ?? '—' }}</td>
								<td>
									<span class="badge badge-{{ $product->status ? 'success' : 'danger' }}">{{ $product->status ? 'Active' : 'Inactive' }}</span>
								</td>
								<td>
									<a href="{{ route('admin.products.show', $product) }}" class="btn btn-info btn-sm">View</a>
									<a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
									<a href="{{ route('admin.products.delete', $product) }}" class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="9" class="text-center text-muted">No products found.</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title">Add Product</h5>
					<button type="button" class="close" data-dismiss="modal">
						<span>&times;</span>
					</button>
				</div>
				<div class="modal-body row">
					<div class="form-group col-md-6">
						<label>Product Name</label>
						<input type="text" name="product_name" class="form-control" required>
					</div>
					<div class="form-group col-md-3">
						<label>Price</label>
						<input type="number" name="price" class="form-control" step="0.01" required>
					</div>
					<div class="form-group col-md-3">
						<label>Selling Price</label>
						<input type="number" name="selling_price" class="form-control" step="0.01">
					</div>
					<div class="form-group col-md-3">
						<label>SKU</label>
						<input type="text" name="sku" class="form-control">
					</div>
					<div class="form-group col-md-3">
						<label>Stock</label>
						<input type="number" name="stock" class="form-control">
					</div>
					<div class="form-group col-md-3">
						<label>Category</label>
						<select name="category_id" class="form-control">
							<option value="">-- Select --</option>
							@foreach(\App\Models\Category::all() as $cat)
							<option value="{{ $cat->id }}">{{ $cat->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-md-3">
						<label>Sub-Category</label>
						<select name="sub_category_id" class="form-control">
							<option value="">-- Select --</option>
							@foreach(\App\Models\SubCategory::all() as $cat)
							<option value="{{ $cat->id }}">{{ $cat->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-md-3">
						<label>Brand</label>
						<select name="brand_id" class="form-control">
							<option value="">-- Select --</option>
							@foreach(\App\Models\Brand::all() as $brand)
							<option value="{{ $brand->id }}">{{ $brand->brand_name }}
							</option>@endforeach</select>
					</div>
					<div class="form-group col-md-6">
						<label>Description</label>
						<textarea name="description" class="form-control" rows="2">
						</textarea>
					</div>
					<div class="form-group col-md-3">
						<label>Thumbnail</label>
						<input type="file" name="thumbnail" class="form-control-file"></div>
					<div class="form-group col-md-3">
						<label>Status</label>
						<select name="status" class="form-control">
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
