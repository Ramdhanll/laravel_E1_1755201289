@extends('layouts.app')

@section('title', 'Halaman mahasiswa')

@section('content')
@include('layouts.alert')

    <h3>Data Mahasiswa</h3>
    <a href="/mhs/create" class="btn btn-success px-2 py-1 mb-2">Tambah Data</a>
    <table class="table table-striped" id="tbl-mhs">
      <thead class="thead-inverse">
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>prodi</th>
          <th>Alamat</th>
          <th>Pilihan</th>
        </tr>
        </thead>
      
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
    $(function() {
      $('#tbl-mhs').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('datatablesmhs')}}",
        columns: [
            {data: 'DT_RowIndex', name: 'No'},
            {data: 'nim', name: 'nim'},
            {data: 'nama_lengkap', name: 'nama_lengkap'},
            {data: 'prodi.nama_prodi', name: 'prodi.nama_prodi'},
            {data: 'alamat', name: 'alamat'},
            {data: 'action', name:'action'}
        ]
    });
});
    </script>
@endpush