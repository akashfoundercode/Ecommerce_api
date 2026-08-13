@extends('admin.partials.layout')
@section('title', 'Delete Brand')
@section('page-title', 'Delete Brand')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Delete Brand</div>
				<a href="{{ route('admin.brands') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body text-center">
				<p class="mb-3">Are you sure you want to delete <strong></strong>?</p>
				@if($item->logo_url)
				<img src="{{ $item->logo_url }}" style="width:80px;height:80px;object-fit:cover;border-radius:4px;margin-bottom:16px;display:block;margin-left:auto;margin-right:auto;">
				@endif
				<form action="{{ route('admin.brands.destroy', $item) }}" method="POST">
					@csrf @method('DELETE')
					<button type="submit" class="btn btn-danger">Yes, Delete</button>
					<a href="{{ route('admin.brands') }}" class="btn btn-secondary">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
