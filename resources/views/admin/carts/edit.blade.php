@extends('admin.partials.layout')
@section('title', 'Edit Cart Item')
@section('page-title', 'Edit Cart Item')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<div class="card-title">Edit Cart Item</div>
				<a href="{{ route('admin.carts') }}" class="btn btn-secondary btn-sm">Back</a>
			</div>
			<div class="card-body">
				<form action="{{ route('admin.carts.update', $item) }}" method="POST">
					@csrf @method('PUT')
					<div class="form-group"><label>Quantity</label><input type="number" name="quantity" class="form-control" value="{{ old('quantity', $item->quantity) }}" required></div>
					<div class="form-group"><label>Price</label><input type="number" name="price" class="form-control" step="0.01" value="{{ old('price', $item->price) }}" required></div>
					<button type="submit" class="btn btn-warning">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
