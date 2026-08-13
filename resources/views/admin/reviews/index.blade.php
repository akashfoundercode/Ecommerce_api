@extends('admin.partials.layout')
@section('title', 'Reviews')
@section('page-title', 'Reviews')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><div class="card-title">Review List</div></div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-head-bg-warning table-striped table-hover">
						<thead>
							<tr><th>#</th><th>User ID</th><th>Product ID</th><th>Rating</th><th>Comment</th><th>Status</th><th>Created</th><th>Actions</th></tr>
						</thead>
						<tbody>
							@forelse ($items as $item)
							<tr>
								<td>{{ $item->id }}</td>
								<td>{{ $item->user_id }}</td>
								<td>{{ $item->product_id }}</td>
								<td>@for($i=1;$i<=5;$i++)<i class="la la-star{{ $i<=$item->rating?' text-warning':' text-muted' }}"></i>@endfor</td>
								<td>{{ Str::limit($item->comment, 50) }}</td>
								<td><span class="badge badge-{{ $item->status ? 'success' : 'danger' }}">{{ $item->status ? 'Active' : 'Inactive' }}</span></td>
								<td>{{ $item->created_at->format('d M Y') }}</td>
								<td>
									<a href="{{ route('admin.reviews.show', $item) }}" class="btn btn-info btn-sm">View</a>
									<form action="{{ route('admin.reviews.update', $item) }}" method="POST" style="display:inline;">
										@csrf @method('PUT')
										<input type="hidden" name="status" value="{{ $item->status ? 0 : 1 }}">
										<button class="btn btn-{{ $item->status ? 'secondary' : 'success' }} btn-sm">{{ $item->status ? 'Deactivate' : 'Approve' }}</button>
									</form>
									<a href="{{ route('admin.reviews.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
							@empty
							<tr><td colspan="8" class="text-center text-muted">No reviews found.</td></tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
