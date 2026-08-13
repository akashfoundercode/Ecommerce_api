@extends('admin.partials.layout')
@section('title', 'Edit Coupon')
@section('page-title', 'Edit Coupon')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Edit Coupon</div>
				<a href="{{ route('admin.coupons') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body">
				<form action="{{ route('admin.coupons.update', $item) }}" method="POST">
					@csrf @method('PUT')
					<div class="form-group"><label>Code</label><input type="text" name="code" class="form-control" value="{{ old('code', $item->code) }}" required></div>
					<div class="form-group"><label>Type</label>
						<select name="discount_type" class="form-control">
							<option value="percent" {{ old('discount_type', $item->discount_type) == 'percent' ? 'selected' : '' }}>Percent</option>
							<option value="fixed" {{ old('discount_type', $item->discount_type) == 'fixed' ? 'selected' : '' }}>Fixed</option>
						</select>
					</div>
					<div class="form-group"><label>Discount</label><input type="number" name="discount" class="form-control" step="0.01" value="{{ old('discount', $item->discount) }}" required></div>
					<div class="form-group"><label>Min Order Amount</label><input type="number" name="min_order_amount" class="form-control" step="0.01" value="{{ old('min_order_amount', $item->min_order_amount) }}"></div>
					<div class="form-group"><label>Usage Limit</label><input type="number" name="usage_limit" class="form-control" value="{{ old('usage_limit', $item->usage_limit) }}"></div>
					<div class="form-group"><label>Status</label>
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
