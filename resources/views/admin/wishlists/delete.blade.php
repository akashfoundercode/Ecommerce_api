@extends('admin.partials.layout')
@section('title', 'Delete Wishlist')
@section('page-title', 'Delete Wishlist')
@section('content')
<div class="row"><div class="col-md-6 offset-md-3"><div class="card">
	<div class="card-header d-flex justify-content-between align-items-center"><div class="card-title">Delete Wishlist</div><a href="{{ route('admin.wishlists') }}" class="btn btn-secondary btn-sm">Back</a></div>
	<div class="card-body">
		<p>Wishlist item #{{ $item->id }} delete this item?</p>
		<form action="{{ route('admin.wishlists.destroy', $item) }}" method="POST">@csrf @method('DELETE')
			<button type="submit" class="btn btn-danger">Delete</button>
			<a href="{{ route('admin.wishlists') }}" class="btn btn-secondary">Cancel</a>
		</form>
	</div>
</div></div></div>
@endsection
