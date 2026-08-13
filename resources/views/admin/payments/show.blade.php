@extends('admin.partials.layout')
@section('title', 'Payment Detail')
@section('page-title', 'Payment Detail')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Payment Detail</div>
				<a href="{{ route('admin.payments') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tr><th>ID</th><td>{{ $item->id }}</td></tr>
					<tr><th>Order ID</th><td>{{ $item->order_id }}</td></tr>
					<tr><th>User ID</th><td>{{ $item->user_id }}</td></tr>
					<tr><th>Amount</th><td>Rs. {{ number_format($item->amount, 2) }}</td></tr>
					<tr><th>Method</th><td>{{ strtoupper($item->payment_method) }}</td></tr>
					<tr><th>Status</th><td><span class="badge badge-{{ $item->payment_status == 'paid' ? 'success' : ($item->payment_status == 'failed' ? 'danger' : 'warning') }}">{{ $item->payment_status }}</span></td></tr>
					<tr><th>Transaction ID</th><td>{{ $item->transaction_id ?? '—' }}</td></tr>
					<tr><th>Paid At</th><td>{{ $item->paid_at ? \Carbon\Carbon::parse($item->paid_at)->format('d M Y H:i') : '—' }}</td></tr>
					<tr><th>Created</th><td>{{ $item->created_at->format('d M Y H:i') }}</td></tr>
				</table>
				<a href="{{ route('admin.payments.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
			</div>
		</div>
	</div>
</div>
@endsection
