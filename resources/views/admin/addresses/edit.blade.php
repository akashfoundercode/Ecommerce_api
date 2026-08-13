@extends('admin.partials.layout')
@section('title', 'Edit Address')
@section('page-title', 'Edit Address')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Edit Address</div>
				<a href="{{ route('admin.addresses') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body">
				<form action="{{ route('admin.addresses.update', $item) }}" method="POST">
					@csrf @method('PUT')
					<div class="form-group">
						<label>Full Name</label>
						<input type="text" name="full_name" class="form-control" value="{{ old('full_name', $item->full_name) }}" required>
					</div>
					<div class="form-group">
						<label>Mobile</label>
						<input type="text" name="mobile" class="form-control" value="{{ old('mobile', $item->mobile) }}" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea name="address" class="form-control">{{ old('address', $item->address) }}</textarea>
					</div>
					<div class="form-group">
						<label>Landmark</label>
						<input type="text" name="landmark" class="form-control" value="{{ old('landmark', $item->landmark) }}">
					</div>
					<div class="form-group">
						<label>City</label>
						<input type="text" name="city" class="form-control" value="{{ old('city', $item->city) }}">
					</div>
					<div class="form-group">
						<label>State</label>
						<input type="text" name="state" class="form-control" value="{{ old('state', $item->state) }}">
					</div>
					<div class="form-group">
						<label>Pincode</label>
						<input type="text" name="pincode" class="form-control" value="{{ old('pincode', $item->pincode) }}">
					</div>
					<div class="form-group">
						<label>Type</label>
						<select name="address_type" class="form-control">
							<option value="home" {{ old('address_type', $item->address_type) == 'home' ? 'selected' : '' }}>Home</option>
							<option value="work" {{ old('address_type', $item->address_type) == 'work' ? 'selected' : '' }}>Work</option>
							<option value="other" {{ old('address_type', $item->address_type) == 'other' ? 'selected' : '' }}>Other</option>
						</select>
					</div>
					<button type="submit" class="btn btn-warning">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
