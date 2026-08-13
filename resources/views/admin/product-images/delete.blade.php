@extends('admin.partials.layout')
@section('title', 'Delete Product Image')
@section('page-title', 'Delete Product Image')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
	<div class="card-header d-flex justify-content-between align-items-center"><div class="card-title">Delete Product Image</div><a href="{{ route('admin.product-images') }}" class="btn btn-secondary btn-sm">Back</a></div>
	<div class="card-body">
		<p>Product image #{{ $item->id }} delete this item?</p>
		<form action="{{ route('admin.product-images.destroy', $item) }}" method="POST">@csrf @method('DELETE')
			<button type="submit" class="btn btn-danger">Delete</button>
			 <a href="{{ route('admin.product-images') }}" class="btn btn-secondary">Cancel</a>
			</form>
		</div>
</div>
</div>
</div>
@endsection
