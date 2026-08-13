@extends('admin.partials.layout')
@section('title', 'Edit Wishlist')
@section('page-title', 'Edit Wishlist')
@section('content')
<div class="row"><div class="col-md-6 offset-md-3"><div class="card">
	<div class="card-header d-flex justify-content-between align-items-center"><div class="card-title">Edit Wishlist</div><a href="{{ route('admin.wishlists') }}" class="btn btn-secondary btn-sm">Back</a></div>
	<div class="card-body">
		<form action="{{ route('admin.wishlists.update', $item) }}" method="POST">
			@csrf @method('PUT')
			<div class="form-group"><label>Status</label><input type="text" name="status" class="form-control" value="{{ old('status', $item->status) }}" required></div>
			<button type="submit" class="btn btn-warning">Update</button>
		</form>
	</div>
</div></div></div>
@endsection
