@extends('admin.partials.layout')
@section('title', 'Edit Payment')
@section('page-title', 'Edit Payment')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Edit Payment</div>
				<a href="{{ route('admin.payments') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body">
				<form action="{{ route('admin.payments.update', $item) }}" method="POST">
					@csrf @method('PUT')
					<div class="form-group"><label>Payment Status</label>
						<select name="payment_status" class="form-control">
							@foreach(['pending','paid','failed','refunded'] as $status)
								<option value="{{ $status }}" {{ old('payment_status', $item->payment_status) == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group"><label>Transaction ID</label><input type="text" name="transaction_id" class="form-control" value="{{ old('transaction_id', $item->transaction_id) }}"></div>
					<button type="submit" class="btn btn-warning">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
