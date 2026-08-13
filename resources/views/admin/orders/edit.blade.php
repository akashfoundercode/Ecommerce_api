@extends('admin.partials.layout')
@section('title', 'Edit Order')
@section('page-title', 'Edit Order')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Update Order #{{ $item->order_number }}</div>
				<a href="{{ route('admin.orders') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body">
				<form action="{{ route('admin.orders.update', $item) }}" method="POST">
					@csrf @method('PUT')
					<div class="form-group"><label>Order Status</label>
						<select name="order_status" class="form-control">
							@foreach(['pending','processing','shipped','delivered','cancelled'] as $status)
								<option value="{{ $status }}" {{ old('order_status', $item->order_status) == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group"><label>Payment Status</label>
						<select name="payment_status" class="form-control">
							@foreach(['pending','paid','failed','refunded'] as $status)
								<option value="{{ $status }}" {{ old('payment_status', $item->payment_status) == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-warning">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
