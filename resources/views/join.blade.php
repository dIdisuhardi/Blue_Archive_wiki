@extends('School.layout')
@section('content')
<h4 class="mt-5">Tabel Lengkap</h4>
<div class = "col-auto">
    <form action="/join" method="GET">
    <input type="search" name="search" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
    </form>
</div>
<table class="table table-hover mt-2">
    <div class = "row g-3 align-items-center mt-2">
    <table class="table table-hover mt-2">
     <thead>
     <tr>
     <th>Name</th>
     <th>Age</th>
     <th>Height</th>
     <th>Hobby</th>
     <th>Birthday</th>
     <th>Name School</th>
     <th>Damage Type</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($joins as $join)
     <tr>
     <td>{{$join-> Name}}</td>
     <td>{{$join-> AGE }}</td>
     <td>{{$join-> Height}}</td>
     <td>{{$join-> Hobby}}</td>
     <td>{{$join-> Birthday}}</td>
     <td>{{$join-> Name_School}}</td>
     <td>{{$join-> damage_type}}</td>
     @endforeach
     </tbody>
    </table>
    @stop