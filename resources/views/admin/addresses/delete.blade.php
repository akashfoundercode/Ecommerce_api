@extends('admin.partials.layout')
@section('title', 'Delete Address')
@section('page-title', 'Delete Address')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Delete Address</div>
				<a href="{{ route('admin.addresses') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body text-center">
				<p class="mb-3">Are you sure you want to delete <strong>
					
				</strong>'s address?</p>
				<p class="text-muted">{{ $item->address }}, {{ $item->city }}, {{ $item->state }} - {{ $item->pincode }}</p>
				<form action="{{ route('admin.addresses.destroy', $item) }}" method="POST">
					@csrf @method('DELETE')
					<button type="submit" class="btn btn-danger">Yes, Delete</button>
					<a href="{{ route('admin.addresses') }}" class="btn btn-secondary">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
