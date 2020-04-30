create.blade.php/categories
@extends('layouts.app')<!-- this is used for include the file from the app.blade -->

@section('content')
<div class="card card-default">
<div class="card-header">
{{ isset($cat) ? 'Edit Category' : 'Create category' }}
</div>
<div class="card body">

@include('partials.errors') <!--show the error-->

<form action="{{ isset($cat) ? route('categories.update',$cat->id):route('categories.store') }}" method="POST">
@csrf
@if(isset($cat))
@method('PUT')
@endif
<div class="form-group">
<label for="name">Name</label>
<input type="text" id="name" class="form-control" name="name" value="{{ isset($cat) ? $cat->name : ''}}">     
</div>

<div class="form-group">
<button class="btn btn-success">
{{isset($cat) ? 'Update category' : 'Add category'}}
</button>
</div>

</form>

</div>
</div>
@endsection