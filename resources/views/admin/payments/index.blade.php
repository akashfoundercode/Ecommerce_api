@extends('admin.partials.layout')
@section('title', 'Payments')
@section('page-title', 'Payments')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><div class="card-title">Payment List</div></div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-head-bg-success table-striped table-hover">
						<thead>
							<tr><th>#</th><th>Order ID</th><th>User ID</th><th>Amount</th><th>Method</th><th>Status</th><th>Transaction ID</th><th>Paid At</th><th>Created</th><th>Actions</th></tr>
						</thead>
						<tbody>
							@forelse ($items as $item)
							<tr>
								<td>{{ $item->id }}</td>
								<td>{{ $item->order_id }}</td>
								<td>{{ $item->user_id }}</td>
								<td>Rs. {{ number_format($item->amount, 2) }}</td>
								<td>{{ strtoupper($item->payment_method) }}</td>
								<td><span class="badge badge-{{ $item->payment_status == 'paid' ? 'success' : ($item->payment_status == 'failed' ? 'danger' : 'warning') }}">{{ $item->payment_status }}</span></td>
								<td>{{ $item->transaction_id ?? '—' }}</td>
								<td>{{ $item->paid_at ? \Carbon\Carbon::parse($item->paid_at)->format('d M Y H:i') : '—' }}</td>
								<td>{{ $item->created_at->format('d M Y') }}</td>
								<td>
									<a href="{{ route('admin.payments.show', $item) }}" class="btn btn-info btn-sm">View</a>
									<a href="{{ route('admin.payments.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
							@empty
							<tr><td colspan="10" class="text-center text-muted">No payments found.</td></tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
