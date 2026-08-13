@extends('admin.partials.layout')
@section('title', 'Setting Detail')
@section('page-title', 'Setting Detail')
@section('content')
<div class="row"><div class="col-md-8 offset-md-2"><div class="card">
	<div class="card-header d-flex justify-content-between align-items-center"><div class="card-title">{{ $item->key }}</div><a href="{{ route('admin.settings') }}" class="btn btn-secondary btn-sm">Back</a></div>
	<div class="card-body"><table class="table table-bordered"><tr><th>Key</th><td>{{ $item->key }}</td></tr><tr><th>Value</th><td>{{ $item->value }}</td></tr></table><a href="{{ route('admin.settings.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a> <a href="{{ route('admin.settings.delete', $item) }}" class="btn btn-danger btn-sm">Delete</a></div>
</div></div></div>
@endsection
