@extends('admin.partials.layout')
@section('title', 'Address Detail')
@section('page-title', 'Address Detail')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Address Detail</div>
				<a href="{{ route('admin.addresses') }}" class="btn btn-secondary btn-sm">Back</a>
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
						<th>Full Name</th>
						<td>{{ $item->full_name }}</td>
					</tr>
					<tr>
						<th>Mobile</th>
						<td>{{ $item->mobile }}</td>
					</tr>
					<tr>
						<th>Address</th>
						<td>{{ $item->address }}</td>
					</tr>
					<tr>
						<th>Landmark</th>
						<td>{{ $item->landmark ?? '—' }}</td>
					</tr>
					<tr>
						<th>City</th>
						<td>{{ $item->city }}</td>
					</tr>
					<tr>
						<th>State</th>
						<td>{{ $item->state }}</td>
					</tr>
					<tr>
						<th>Pincode</th>
						<td>{{ $item->pincode }}</td>
				</tr>
					<tr>
						<th>Type</th>
						<td>
							<span class="badge badge-secondary">{{ $item->address_type }}</span>
						</td>
					</tr>
					<tr>
						<th>Created</th>
						<td>{{ $item->created_at->format('d M Y H:i') }}</td>
					</tr>
				</table>
				<a href="{{ route('admin.addresses.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
			</div>
		</div>
	</div>
</div>
@endsection
