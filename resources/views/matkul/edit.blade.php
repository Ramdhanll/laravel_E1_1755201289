@extends('layouts.app')

@section('title', 'Halaman matkul')

@section('content')
  <h3>Form matkul</h3>
  <hr>
  <form action="{{ route('mata-kuliah.update', $matkul->kode_matkul)}}" method="post">
  @csrf
  @method('put')
    <label for="kode_matkul">Kode Matkul</label>
    <input style="width: 300px" type="text" name="kode_matkul" id="kode_matkul" class="form-control @error('kode_matkul') is-invalid @enderror" value="{{ $matkul->kode_matkul }}" disabled>
    @error('kode_matkul')
      <small class="form-text text-danger invalid-feedback">{{$message}}</small>
    @enderror

    <label for="nama_matkul">Nama Matkul</label>
    <input style="width: 300px" type="text" name="nama_matkul" id="nama_matkul" class="form-control @error('nama_matkul') is-invalid @enderror" value="{{ $matkul->nama_matkul }}">
    @error('nama_matkul')
      <small class="form-text text-danger invalid-feedback">{{$message}}</small>
    @enderror

    <label for="sks">sks</label>
    <input style="width: 300px" type="number" name="sks" id="sks" class="form-control @error('sks') is-invalid @enderror" value="{{ $matkul->sks}}">
    @error('sks')
      <small class="form-text text-danger invalid-feedback">{{$message}}</small>
    @enderror

    <label for="semester">semester</label>
    <input style="width: 300px" type="number" name="semester" id="semester" class="form-control @error('semester') is-invalid @enderror" value="{{ $matkul->semester}}">
    @error('semester')
      <small class="form-text text-danger invalid-feedback">{{$message}}</small>
    @enderror


    <button type="submit" class="btn btn-primary py-1 px-2 mt-3">Edit</button>
  </form>
@endsection