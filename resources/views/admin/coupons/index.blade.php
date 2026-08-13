@extends('admin.partials.layout')
@section('title', 'Coupons')
@section('page-title', 'Coupons')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Coupon List</div>
				<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">+ Add Coupon</button>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-head-bg-primary table-striped table-hover">
						<thead>
							<tr><th>#</th><th>Code</th><th>Type</th><th>Discount</th><th>Min Order</th><th>Usage Limit</th><th>Used</th><th>Status</th><th>Created</th><th>Actions</th></tr>
						</thead>
						<tbody>
							@forelse ($items as $item)
							<tr>
								<td>{{ $item->id }}</td>
								<td><strong>{{ $item->code }}</strong></td>
								<td>{{ $item->discount_type }}</td>
								<td>{{ $item->discount_type == 'percent' ? $item->discount.'%' : 'Rs. '.$item->discount }}</td>
								<td>Rs. {{ number_format($item->min_order_amount, 2) }}</td>
								<td>{{ $item->usage_limit ?? 'Unlimited' }}</td>
								<td>{{ $item->used_count }}</td>
								<td><span class="badge badge-{{ $item->status ? 'success' : 'danger' }}">{{ $item->status ? 'Active' : 'Inactive' }}</span></td>
								<td>{{ $item->created_at->format('d M Y') }}</td>
								<td>
									<a href="{{ route('admin.coupons.show', $item) }}" class="btn btn-info btn-sm">View</a>
									<a href="{{ route('admin.coupons.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
									<a href="{{ route('admin.coupons.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
							@empty
							<tr><td colspan="10" class="text-center text-muted">No coupons found.</td></tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document"><div class="modal-content">
		<form action="{{ route('admin.coupons.store') }}" method="POST">
			@csrf
			<div class="modal-header"><h5 class="modal-title">Add Coupon</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
			<div class="modal-body">
				<div class="form-group"><label>Code</label><input type="text" name="code" class="form-control" required></div>
				<div class="form-group"><label>Type</label><select name="discount_type" class="form-control"><option value="percent">Percent</option><option value="fixed">Fixed</option></select></div>
				<div class="form-group"><label>Discount</label><input type="number" name="discount" class="form-control" step="0.01" required></div>
				<div class="form-group"><label>Min Order Amount</label><input type="number" name="min_order_amount" class="form-control" step="0.01"></div>
				<div class="form-group"><label>Usage Limit</label><input type="number" name="usage_limit" class="form-control"></div>
				<div class="form-group"><label>Status</label><select name="status" class="form-control"><option value="1">Active</option><option value="0">Inactive</option></select></div>
			</div>
			<div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button><button type="submit" class="btn btn-primary">Save</button></div>
		</form>
	</div></div>
</div>
@endsection
