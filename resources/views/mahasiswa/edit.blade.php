@extends('layouts.app')

@section('title', 'Halaman mahasiswa')

@section('content')
  <h3>Form mahasiswa</h3>
  <hr>
  <form action="{{ route('mhs.update', $mhs->id)}}" method="post">
  @csrf
  @method('put')
  <label for="nim">Nim</label>
  <input style="width: 300px" type="text" name="nim" id="nim" class="form-control @error('nim') is-invalid @enderror" value="{{ $mhs->nim }}">
  @error('nim')
    <small class="form-text text-danger invalid-feedback">{{$message}}</small>
  @enderror

  <label for="nama_lengkap">Nama Lengkap</label>
  <input style="width: 300px" type="text" name="nama_lengkap" id="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ $mhs->nama_lengkap }}">
  @error('nama_lengkap')
    <small class="form-text text-danger invalid-feedback">{{$message}}</small>
  @enderror

  <label for="prodi_id">Program Studi</label>
  <select style="width: 300px" name="prodi_id" id="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror">
    <option value="" selected disabled>Pilih Prodi</option>
    @foreach ($prodi as $item)
    <option value="{{ $item }}" {{ $mhs->prodi->kode_prodi == $item->kode_prodi ? 'selected' : null }}> {{$item->nama_prodi}} </option>
    @endforeach
  </select>
  @error('prodi_id')
    <small class="form-text text-danger invalid-feedback">{{$message}}</small>
  @enderror

  <label for="alamat">Alamat</label>
  <textarea style="width: 500px" name="alamat" id="alamat" cols="50" rows="2" class="form-control @error('alamat') is-invalid @enderror">
    {{ $mhs->alamat }}
  </textarea>
  @error('alamat')
    <small class="form-text text-danger invalid-feedback">{{$message}}</small>
  @enderror


    <button type="submit" class="btn btn-primary py-1 px-2 mt-3">Edit</button>
  </form>
@endsection