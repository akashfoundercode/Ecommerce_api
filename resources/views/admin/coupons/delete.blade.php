@extends('admin.partials.layout')
@section('title', 'Delete Coupon')
@section('page-title', 'Delete Coupon')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Delete Coupon</div>
				<a href="{{ route('admin.coupons') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body text-center">
				<p class="mb-3">Are you sure you want to delete coupon <strong></strong>?</p>
				<form action="{{ route('admin.coupons.destroy', $item) }}" method="POST">
					@csrf @method('DELETE')
					<button type="submit" class="btn btn-danger">Yes, Delete</button>
					<a href="{{ route('admin.coupons') }}" class="btn btn-secondary">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
