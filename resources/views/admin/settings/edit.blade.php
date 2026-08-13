@extends('admin.partials.layout')
@section('title', 'Edit Setting')
@section('page-title', 'Edit Setting')
@section('content')
<div class="row"><div class="col-md-6 offset-md-3"><div class="card">
	<div class="card-header d-flex justify-content-between align-items-center"><div class="card-title">Edit Setting</div><a href="{{ route('admin.settings') }}" class="btn btn-secondary btn-sm">Back</a></div>
	<div class="card-body"><form action="{{ route('admin.settings.update', $item) }}" method="POST">@csrf @method('PUT')
		<div class="form-group"><label>Key</label><input type="text" name="key" class="form-control" value="{{ old('key', $item->key) }}" required></div>
		<div class="form-group"><label>Value</label><textarea name="value" class="form-control">{{ old('value', $item->value) }}</textarea></div>
		<button type="submit" class="btn btn-warning">Update</button>
	</form></div>
</div></div></div>
@endsection
