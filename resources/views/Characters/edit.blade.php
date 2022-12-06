@extends('Characters.layout')
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
 <h5 class="card-title fw-bolder mb-3">Ubah Data Karakter</h5>
<form method="post" action="{{ 
route('Characters.update', $data-> ID_Character) }}">
@csrf
 <div class="mb-3">
    <label for="ID_Character" class="form-label">ID</label>
    <input type="text" class="form-control" id="ID_Character" name="ID_Character" value="{{ $data->ID_Character}}">
    </div>
   <div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" class="form-control" id="Name" name="Name" value="{{ $data->Name}}">
    </div>
    <div class="mb-3">
    <label for="damage_type" class="form-label">Damage Type</label>
    <input type="text" class="form-control" id="damage_type" name="damage_type" value="{{ $data->damage_type}}">
    </div>
    <div class="mb-3">
    <label for="Name_School" class="form-label">School</label>
    <input type="text" class="form-control" id="Name_School" name="Name_School" value="{{ $data->Name_School}}">
    </div>
    <div class="mb-3">
        <label for="ID_School" class="form-label">ID School</label>
        <input type="text" class="form-control" id="ID_School" name="ID_School" value="{{ $data->ID_School}}">
    </div>
<div class="text-center">
<input type="submit" class="btn btn-primary" value="Ubah" />
</div>
</form>
</div>
</div>
@stop