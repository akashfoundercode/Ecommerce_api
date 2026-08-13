@extends('admin.partials.layout')
@section('title', 'Sub-Categories')
@section('page-title', 'Sub-Categories')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Sub-Category List</div>
				<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">+ Add Sub-Category</button>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-head-bg-info table-striped table-hover">
						<thead>
							<tr><th>#</th><th>Image</th><th>Name</th><th>Slug</th><th>Category</th><th>Description</th><th>Status</th><th>Created</th><th>Actions</th></tr>
						</thead>
						<tbody>
							@forelse ($items as $item)
							<tr>
								<td>{{ $item->id }}</td>
								<td>@if($item->image_url)<img src="{{ $item->image_url }}" style="width:45px;height:45px;object-fit:cover;border-radius:4px;">@else<span class="text-muted">—</span>@endif</td>
								<td>{{ $item->sub_category_name }}</td>
								<td>{{ $item->slug }}</td>
								<td>{{ $categories->firstWhere('id', $item->category_id)?->name ?? '—' }}</td>
								<td>{{ Str::limit($item->description, 40) }}</td>
								<td><span class="badge badge-{{ $item->status ? 'success' : 'danger' }}">{{ $item->status ? 'Active' : 'Inactive' }}</span></td>
								<td>{{ $item->created_at->format('d M Y') }}</td>
								<td>
									<a href="{{ route('admin.subcategories.show', $item) }}" class="btn btn-info btn-sm">View</a>
									<a href="{{ route('admin.subcategories.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
									<a href="{{ route('admin.subcategories.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
							@empty
							<tr><td colspan="9" class="text-center text-muted">No sub-categories found.</td></tr>
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
	<div class="modal-dialog" role="document"><div class="modal-content">
		<form action="{{ route('admin.subcategories.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="modal-header"><h5 class="modal-title">Add Sub-Category</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
			<div class="modal-body">
				<div class="form-group"><label>Name</label><input type="text" name="sub_category_name" class="form-control" required></div>
				<div class="form-group"><label>Slug</label><input type="text" name="slug" class="form-control"></div>
				<div class="form-group"><label>Category</label>
					<select name="category_id" class="form-control" required><option value="">-- Select --</option>@foreach($categories as $cat)<option value="{{ $cat->id }}">{{ $cat->name }}</option>@endforeach</select>
				</div>
				<div class="form-group"><label>Description</label><textarea name="description" class="form-control"></textarea></div>
				<div class="form-group"><label>Image</label><input type="file" name="image" class="form-control-file"></div>
				<div class="form-group"><label>Status</label><select name="status" class="form-control"><option value="1">Active</option><option value="0">Inactive</option></select></div>
			</div>
			<div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button><button type="submit" class="btn btn-primary">Save</button></div>
		</form>
	</div></div>
</div>
@endsection
