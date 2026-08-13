@extends('admin.partials.layout')
@section('title', 'Product Detail')
@section('page-title', 'Product Detail')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Product Detail</div>
				<a href="{{ route('admin.products') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tr>
						<th>ID</th>
						<td>{{ $product->id }}</td>
					</tr>
					<tr>
						<th>Thumbnail</th>
						<td>@if($product->image_url)<img src="{{ $product->image_url }}" style="width:80px;height:80px;object-fit:cover;border-radius:4px;">@else<span class="text-muted">—</span>@endif</td>
					</tr>
					<tr>
						<th>Name</th>
						<td>{{ $product->product_name }}</td>
					</tr>
					<tr>
						<th>SKU</th>
						<td>{{ $product->sku ?? '—' }}</td>
					</tr>
					<tr>
						<th>Price</th>
						<td>Rs. {{ number_format($product->price, 2) }}</td>
					</tr>
					<tr>
						<th>Selling Price</th>
						<td>Rs. {{ number_format($product->selling_price, 2) }}</td>
					</tr>
					<tr>
						<th>Stock</th>
						<td>{{ $product->stock ?? '—' }}</td>
					</tr>
					<tr>
						<th>Category</th>
						<td>{{ $product->category->name ?? '—'}}</td>
					</tr>
					<tr>
						<th>SubCategory</th>
						<td>{{ $product->subcategory->name ?? '—'}}</td>
					</tr>
					<tr>
						<th>Brand</th><td>{{ $product->brand->brand_name ?? '—' }}</td>
					</tr>
					<tr>
						<th>Description</th>
						<td>{{ $product->description ?? '—' }}</td>
					</tr>
					<tr>
						<th>Status</th>
						<td>
							<span class="badge badge-{{ $product->status ? 'success' : 'danger' }}">{{ $product->status ? 'Active' : 'Inactive' }}</span></td></tr>
					<tr>
						<th>Created</th>
						<td>{{ $product->created_at->format('d M Y H:i') }}</td>
					</tr>
				</table>
				<a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
				<a href="{{ route('admin.products.delete', $product) }}" class="btn btn-danger btn-sm">Delete</a>
			</div>
		</div>
	</div>
</div>
@endsection
