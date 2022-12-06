@extends('School.layout')
@section('content')
@if($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif
<div class="card mt-4">
<div class="card-body">
 <h5 class="card-title fw-bolder mb-3">Data Sekolah</h5>
<form method="post" action="{{ 
route('School.store') }}">
@csrf
<div class="mb-3">
    <label for="ID_School" class="form-label">ID School</label>
    <input type="text" class="form-control" id="ID_School" name="ID_School">
</div>
 <div class="mb-3">
 <label for="Name_School" class="form-label">School</label>
 <input type="text" class="form-control" id="Name_School" name="Name_School">
 </div>
 <div class="mb-3">
    <label for="School_type" class="form-label">Type</label>
    <input type="text" class="form-control" id="School_type" name="School_type">
</div>

<div class="text-center">
<input type="submit" class="btn btn-primary" value="Tambah" />
</div>
</form>
</div>
</div>
@stop