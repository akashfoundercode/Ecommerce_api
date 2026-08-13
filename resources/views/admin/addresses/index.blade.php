@extends('admin.partials.layout')
@section('title', 'Addresses')
@section('page-title', 'Addresses')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Address List</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-head-bg-info table-striped table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>User ID</th>
								<th>Full Name</th>
								<th>Mobile</th>
								<th>Address</th>
								<th>City</th>
								<th>State</th>
								<th>Pincode</th>
								<th>Type</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($items as $item)
							<tr>
								<td>{{ $item->id }}</td>
								<td>{{ $item->user_id }}</td>
								<td>{{ $item->full_name }}</td>
								<td>{{ $item->mobile }}</td>
								<td>{{ Str::limit($item->address.', '.$item->landmark, 40) }}</td>
								<td>{{ $item->city }}</td>
								<td>{{ $item->state }}</td>
								<td>{{ $item->pincode }}</td>
								<td><span class="badge badge-secondary">{{ $item->address_type }}</span>
							</td>
								<td>
									<a href="{{ route('admin.addresses.show', $item) }}" class="btn btn-info btn-sm">View</a>
									<a href="{{ route('admin.addresses.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="10" class="text-center text-muted">No addresses found.</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
