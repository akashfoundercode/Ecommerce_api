@extends('admin.partials.layout')
@section('title', 'Settings')
@section('page-title', 'Settings')
@section('content')
<div class="row">
	<div class="col-md-12">
	<div class="card">
		<div class="card-header d-flex justify-content-between align-items-center"><div class="card-title">Settings</div><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">+ Add Setting</button></div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-head-bg-info table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Key</th>
						<th>Value</th>
						<th>Created</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>@forelse($items as $item)<tr>
					<td>{{ $item->id }}</td>
					<td>{{ $item->key }}</td>
					<td>{{ Str::limit($item->value, 60) }}</td>
					<td>{{ $item->created_at->format('d M Y') }}</td>
					<td>
						<a href="{{ route('admin.settings.show', $item) }}" class="btn btn-info btn-sm">View</a>
						 <a href="{{ route('admin.settings.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a> 
						 <a href="{{ route('admin.settings.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
						</td>
				</tr>
				@empty
				<tr>
					<td colspan="5" class="text-center text-muted">No settings found.</td>
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
			<form action="{{ route('admin.settings.store') }}" method="POST">@csrf
	<div class="modal-header">
		<h5 class="modal-title">Add Setting</h5>
		<button type="button" class="close" data-dismiss="modal">
			<span>&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<label>Key</label>
			<input type="text" name="key" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Value</label>
			<textarea name="value" class="form-control">
          </textarea>
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
