@extends('admin.partials.layout')
@section('title', 'Edit Review')
@section('page-title', 'Edit Review')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center">
		<div class="card-title">Edit Review</div>
		<a href="{{ route('admin.reviews') }}" class="btn btn-secondary btn-sm">Back</a>
	</div>
	<div class="card-body">
		<form action="{{ route('admin.reviews.update', $item) }}" method="POST">@csrf @method('PUT')
		<div class="form-group">
			<label>Status</label>
			<select name="status" class="form-control">
				<option value="1" {{ old('status', $item->status) == 1 ? 'selected' : '' }}>Approved</option>
				<option value="0" {{ old('status', $item->status) == 0 ? 'selected' : '' }}>Pending</option>
			</select>
		</div>
		<button type="submit" class="btn btn-warning">Update</button>
	</form>
</div>
</div>
</div>
</div>
@endsection
