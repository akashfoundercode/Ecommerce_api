@extends('admin.partials.layout')
@section('title', 'Delete Order Item')
@section('page-title', 'Delete Order Item')
@section('content')
<div class="row"><div class="col-md-6 offset-md-3"><div class="card">
	<div class="card-header d-flex justify-content-between align-items-center"><div class="card-title">Delete Order Item</div><a href="{{ route('admin.order-items') }}" class="btn btn-secondary btn-sm">Back</a></div>
	<div class="card-body"><p>Order item #{{ $item->id }} delete this item?</p>
		<form action="{{ route('admin.order-items.destroy', $item) }}" method="POST">@csrf @method('DELETE')
			<button type="submit" class="btn btn-danger">Delete</button><a href="{{ route('admin.order-items') }}" class="btn btn-secondary">Cancel</a>
		</form>
	</div>
</div></div></div>
@endsection
