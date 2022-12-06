@extends('Profil.layout')
@section('content')
<h4 class="mt-5">Data Karakter Blue Archive</h4>
<a href="{{ route('Profil.create') }}" type="button"
class="btn btn-success rounded-3">Tambah Data</a>
@if($message = Session::get('success'))
 <div class="alert alert-success mt-3" role="alert">
 {{ $message }}
 </div>
@endif

<table class="table table-hover mt-2">
<a href="{{ route('Profil.indexDelete') }}" type="button"
class="btn btn-warning rounded-3">Dump File</a>
<div class = "row g-3 align-items-center mt-2">
<div class = "col-auto">
    <form action="/Profil" method="GET">
    <input type="search" name="search" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
    </form>
</div>
<table class="table table-hover mt-2">
 <thead>
 <tr>
 <th>ID Profil</th>
 <th>Name</th>
 <th>Age</th>
 <th>Height</th>
 <th>Hobby</th>
 <th>Birthday</th>
 <th>Action</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($datas as $data)
 <tr>
 <td>{{$data-> ID_Profil}}</td>
 <td>{{$data-> Name }}</td>
 <td>{{$data-> AGE }}</td>
 <td>{{$data-> Height }}</td>
 <td>{{$data-> Hobby }}</td>
 <td>{{$data-> Birthday }}</td>
 <td>
 <a href="{{ route('Profil.edit', $data->ID_Profil) }}" type="button" class="btn btn-warning rounded-3">Ubah Data</a>
 <!-- TAMBAHKAN KODE DELETE DIBAWAH 
BARIS INI -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->ID_Profil }}">
 Hapus
 </button>
 <!-- Modal -->
 <div class="modal fade" 
id="hapusModal{{ $data->ID_Profil }}" tabindex="-1" 
aria-labelledby="hapusModalLabel" aria-hidden="true">
 <div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
 <button 
type="button" class="btn-close" data-bs-dismiss="modal" 
aria-label="Close"></button>
 </div>
<form method="POST" 
action="{{ route('Profil.delete', $data->ID_Profil) }}">
 @csrf
<div class="modal-body">
 Apakah anda 
yakin ingin menghapus data ini?
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
 <button type="submit" class="btn btn-primary">Ya</button>
 </div>
 </form>
 </div>
 </div>
 </div>
 </form>
 </div>
 </div>
 </div>

 </td>
 @endforeach
 </tbody>
</table>
@stop