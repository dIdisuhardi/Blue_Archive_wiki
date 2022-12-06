@extends('Profil.layout')
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
 <h5 class="card-title fw-bolder mb-3">Profil Lengkap</h5>
<form method="post" action="{{ 
route('Profil.store') }}">
@csrf
<div class="mb-3">
    <label for="ID_Profil" class="form-label">ID Profil</label>
    <input type="text" class="form-control" id="ID_Profil" name="ID_Profil">
</div>
 <div class="mb-3">
 <label for="Name" class="form-label">Name</label>
 <input type="text" class="form-control" id="Name" name="Name">
 </div>
 <div class="mb-3">
    <label for="AGE" class="form-label">Age</label>
    <input type="text" class="form-control" id="AGE" name="AGE">
</div>
<div class="mb-3">
    <label for="Height" class="form-label">Height</label>
    <input type="text" class="form-control" id="Height" name="Height">
</div>
 <div class="mb-3">
 <label for="Hobby" class="form-label">Hobby</label>
 <input type="text" class="form-control" id="Hobby" name="Hobby">
 </div>
 <div class="mb-3">
    <label for="Birthday" class="form-label">Birthday</label>
    <input type="text" class="form-control" id="Birthday" name="Birthday">
</div>
<div class="mb-3">
    <label for="ID_Character" class="form-label">ID</label>
    <input type="text" class="form-control" id="ID_Character" name="ID_Character">
    </div>
<div class="text-center">
<input type="submit" class="btn btn-primary" value="Tambah" />
</div>
</form>
</div>
</div>
@stop