@extends('admin.partials.layout')
@section('title', 'Review Detail')
@section('page-title', 'Review Detail')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Review Detail</div>
				<a href="{{ route('admin.reviews') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tr>
						<th>ID</th>
						<td>{{ $item->id }}</td>
					</tr>
					<tr>
						<th>User ID</th>
						<td>{{ $item->user_id }}</td>
					</tr>
					<tr>
						<th>Product ID</th>
						<td>{{ $item->product_id }}</td>
					</tr>
					<tr>
						<th>Rating</th>
						<td>@for($i=1;$i<=5;$i++)<i class="la la-star{{ $i<=$item->rating?' text-warning':' text-muted' }}"></i>@endfor</td>
					</tr>
					<tr>
						<th>Comment</th>
						<td>{{ $item->comment ?? '—' }}</td>
					</tr>
					<tr>
						<th>Status</th>
						<td>
							<span class="badge badge-{{ $item->status ? 'success' : 'danger' }}">{{ $item->status ? 'Active' : 'Inactive' }}</span>
						</td>
					</tr>
					<tr>
						<th>Created</th>
						<td>{{ $item->created_at->format('d M Y H:i') }}</td>
					</tr>
				</table>
				<form action="{{ route('admin.reviews.update', $item) }}" method="POST" style="display:inline;">
					@csrf @method('PUT')
					<input type="hidden" name="status" value="{{ $item->status ? 0 : 1 }}">
					<button class="btn btn-{{ $item->status ? 'secondary' : 'success' }} btn-sm">{{ $item->status ? 'Deactivate' : 'Approve' }}</button>
				</form>
				<a href="{{ route('admin.reviews.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
			</div>
		</div>
	</div>
</div>
@endsection
