@extends('admin.partials.layout')
@section('title', 'Edit Brand')
@section('page-title', 'Edit Brand')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Edit Brand</div>
				<a href="{{ route('admin.brands') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body">
				<form action="{{ route('admin.brands.update', $item) }}" method="POST" enctype="multipart/form-data">
					@csrf @method('PUT')
					<div class="form-group">
						<label>Brand Name</label>
						<input type="text" name="brand_name" class="form-control" value="{{ old('brand_name', $item->brand_name) }}" required>
					</div>
					<div class="form-group">
						<label>Slug</label>
						<input type="text" name="slug" class="form-control" value="{{ old('slug', $item->slug) }}">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="description" class="form-control">{{ old('description', $item->description) }}</textarea>
					</div>
					<div class="form-group">
						<label>Logo</label>
						<br>
						@if($item->logo_url)<img src="{{ $item->logo_url }}" style="width:80px;height:80px;object-fit:cover;border-radius:4px;margin-bottom:8px;display:block;">
						@endif
						<input type="file" name="logo" class="form-control-file">
					</div>
					<div class="form-group">
						<label>Status</label>
						<select name="status" class="form-control">
							<option value="1" {{ old('status', $item->status) == 1 ? 'selected' : '' }}>Active</option>
							<option value="0" {{ old('status', $item->status) == 0 ? 'selected' : '' }}>Inactive</option>
						</select>
					</div>
					<button type="submit" class="btn btn-warning">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
