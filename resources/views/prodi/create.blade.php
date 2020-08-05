@extends('layouts.app')

@section('title', 'Halaman prodi')

@section('content')
  <h3>Form prodi</h3>
  <hr>
  <form action="{{ route('prodi.store')}}" method="post">
  @csrf
    <label for="kode_prodi">Kode Prodi</label>
    <input style="width: 300px" type="text" name="kode_prodi" id="kode_prodi" class="form-control @error('kode_prodi') is-invalid @enderror" value="{{ old('kode_prodi') }}">
    @error('kode_prodi')
      <small class="form-text text-danger invalid-feedback">{{$message}}</small>
    @enderror

    <label for="nama_prodi">Nama Prodi</label>
    <input style="width: 300px" type="text" name="nama_prodi" id="nama_prodi" class="form-control @error('nama_prodi') is-invalid @enderror" value="{{ old('nama_prodi') }}">
    @error('nama_prodi')
      <small class="form-text text-danger invalid-feedback">{{$message}}</small>
    @enderror

    <label for="kaprodi">Kaprodi</label>
    <input style="width: 300px" type="text" name="kaprodi" id="kaprodi" class="form-control @error('kaprodi') is-invalid @enderror" value="{{ old('kaprodi') }}">
    @error('kaprodi')
      <small class="form-text text-danger invalid-feedback">{{$message}}</small>
    @enderror


    <button type="submit" class="btn btn-primary py-1 px-2 mt-3">Simpan</button>
  </form>
@endsection