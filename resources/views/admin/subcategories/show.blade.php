@extends('admin.partials.layout')
@section('title', 'Sub-Category Detail')
@section('page-title', 'Sub-Category Detail')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Sub-Category Detail</div>
				<a href="{{ route('admin.subcategories') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tr><th>ID</th><td>{{ $item->id }}</td></tr>
					<tr><th>Image</th><td>@if($item->image_url)<img src="{{ $item->image_url }}" style="width:80px;height:80px;object-fit:cover;border-radius:4px;">@else<span class="text-muted">—</span>@endif</td></tr>
					<tr><th>Name</th><td>{{ $item->sub_category_name }}</td></tr>
					<tr><th>Slug</th><td>{{ $item->slug }}</td></tr>
					<tr><th>Category</th><td>{{ $item->category->name ?? '—' }}</td></tr>
					<tr><th>Description</th><td>{{ $item->description ?? '—' }}</td></tr>
					<tr><th>Status</th><td><span class="badge badge-{{ $item->status ? 'success' : 'danger' }}">{{ $item->status ? 'Active' : 'Inactive' }}</span></td></tr>
					<tr><th>Created</th><td>{{ $item->created_at->format('d M Y H:i') }}</td></tr>
				</table>
				<a href="{{ route('admin.subcategories.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
				<a href="{{ route('admin.subcategories.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
			</div>
		</div>
	</div>
</div>
@endsection
